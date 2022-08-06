<?php

class Auth extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Shop_model');
        $this->load->model('Meta_model');
    }


    public function access(){
        $shop = $this->input->get('shop');
        if(isset($shop)){
            $this->session->set_userdata($shop);
        }

        $check_shop = $this->Shop_model->getsingledata($shop);
        
        if($check_shop && $check_shop->status == 0){
            //dd($check_shop);
            $data = array(
                'shop' => $shop,
                'shop_id' => $check_shop->id,
                'access_token' => $check_shop->token
            );
            $this->session->set_userdata($data);

            $data = array(
                'API_KEY' => $this->config->item('shopify_api_key'),
                'API_SECRET' => $this->config->item('shopify_secret'),
                'SHOP_DOMAIN' => $shop,
                'ACCESS_TOKEN' => $this->session->userdata('access_token')
            );

            $this->load->library('Shopify' , $data);
            $shop_data = $this->shopify->call(['METHOD' => 'GET', 'URL' => 'https://' . $shop . '/admin/shop.json'], false);

            $data_webhooks = $this->shopify->call(['METHOD' => 'GET', 'URL' => $shop . '/admin/api/'.SHOPIFY_API_DATE.'/webhooks.json'], true);

            if(count($data_webhooks->webhooks) == 0){
                $hook_data["webhook"] = array(
                    "topic"=> "app/uninstalled",
                    "address"=> base_url()."app/uninstall/webhook?shop=".$shop,
                    "format"=> "json"
                );
                $this->shopify->call(['METHOD' => 'POST', 'URL' => $shop . '/admin/api/'.SHOPIFY_API_DATE.'/webhooks.json', 'DATA' => $hook_data], true);
            }

            //dd($shop_data);
            $this->Meta_model->add_shop_meta($check_shop->id, 'shop_plan_name', $shop_data->shop->plan_name );
            $this->Meta_model->add_shop_meta($check_shop->id, 'shop_currency', $shop_data->shop->currency );
            $this->Meta_model->add_shop_meta($check_shop->id, 'shop_timezone', $shop_data->shop->iana_timezone );
            $this->Meta_model->add_shop_meta($check_shop->id, 'shop_money_format', $shop_data->shop->money_format );
            $this->Meta_model->add_shop_meta($check_shop->id, 'shop_owner', $shop_data->shop->shop_owner );

            if(($this->session->userdata('access_token'))){
                $data = array(
                    'api_key' => $this->config->item('shopify_api_key'),
                    'shop' => $shop
                );
                redirect(base_url('app/home'), 'refresh');
            }

        }else{
            if($shop != "") {
                $this->auth($shop);
            }else{
                // Show 404 page here
                echo 'Shop domain not found';
            }
        }
    }

    public function auth($shop){
        $data = array(
            'API_KEY' => $this->config->item('shopify_api_key'),
            'API_SECRET' => $this->config->item('shopify_secret'),
            'SHOP_DOMAIN' => $shop,
            'ACCESS_TOKEN' => ''
        );

        $this->load->library('Shopify' , $data);

        $scopes = array('read_product_listings', 'unauthenticated_write_customers', 'unauthenticated_read_customer_tags','read_orders','write_orders','write_script_tags','read_script_tags','read_content', 'write_content', 'read_themes', 'write_themes', 'read_price_rules', 'write_price_rules', 'write_discounts', 'read_discounts');
        $redirect_url = $this->config->item('redirect_url');

        $paramsforInstallURL = array(
            'scopes' => $scopes,
            'redirect' => $redirect_url
        );

        $this->Shop_model->updateByShop($shop, array('status'=>0));

        $permission_url = $this->shopify->installURL($paramsforInstallURL);

        $this->load->view('auth/escapeIframe', ['installUrl' => $permission_url]);
    }

    public function authCallback(){
        $code = $this->input->get('code');
        $shop = $this->input->get('shop');

        if(isset($code)){
            if($this->session->userdata('api_key') && $this->session->userdata('secret_key')){
                $data = array(
                    'API_KEY' => $this->session->userdata('api_key'),
                    'API_SECRET' => $this->session->userdata('secret_key'),
                    'SHOP_DOMAIN' => $shop,
                    'ACCESS_TOKEN' => ''
                );
            }else{
                $data = array(
                    'API_KEY' => $this->config->item('shopify_api_key'),
                    'API_SECRET' => $this->config->item('shopify_secret'),
                    'SHOP_DOMAIN' => $shop,
                    'ACCESS_TOKEN' => ''
                );
            }

            $this->load->library('Shopify' , $data);
        }

        $accessToken = $this->shopify->getAccessToken($code);

        $data = array(
            'shop' => $shop,
            'access_token' => $accessToken
        );


        $this->session->set_userdata($data);
        $check_shop = $this->Shop_model->getsingledata($shop);
        if($check_shop == null){
            //insert shop token
            $inserData = array();
            $inserData['shop'] = $shop;
            $inserData['token'] = $accessToken;
            $inserData['status'] = 0;
            $this->Shop_model->save($inserData);
        }else{
            $updateData = array();
            $updateData['shop'] = $shop;
            $updateData['token'] = $accessToken;
            $this->Shop_model->update($check_shop->id, $updateData);
        }
        redirect('https://'.$shop.'/admin/apps/'.MY_APP_NAME);
    }


    public function webhook_call($accessToken){
        if($this->session->userdata('api_key') && $this->session->userdata('secret_key')){
            $api_data = array(
                'API_KEY' => $this->session->userdata('api_key'),
                'API_SECRET' => $this->session->userdata('secret_key'),
                'SHOP_DOMAIN' => $_SESSION['shop'],
                'ACCESS_TOKEN' => $accessToken
            );
        }else {
            $api_data = array(
                'API_KEY' => $this->config->item('shopify_api_key'),
                'API_SECRET' => $this->config->item('shopify_secret'),
                'SHOP_DOMAIN' => $_SESSION['shop'],
                'ACCESS_TOKEN' => $accessToken
            );
        }
        //dd($api_data);
        $this->load->library('Shopify' , $api_data);
        $data_webhooks = $this->shopify->call(['METHOD' => 'GET', 'URL' => $_SESSION['shop'] . '/admin/api/'.SHOPIFY_API_DATE.'/webhooks.json'], true);
        if(count($data_webhooks->webhooks) == 0){
            $hook_data["webhook"] = array(
                "topic"=> "app/uninstalled",
                "address"=> base_url()."app/uninstall/webhook?shop=".$_SESSION['shop'],
                "format"=> "json"
            );
            $this->shopify->call(['METHOD' => 'POST', 'URL' => $_SESSION['shop'] . '/admin/api/'.SHOPIFY_API_DATE.'/webhooks.json', 'DATA' => $hook_data], true);
        }
    }
}
