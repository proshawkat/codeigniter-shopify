<?php

class Webhook extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Shop_model', 'sm');
    }

    public function unInstallApp()
    {
        $hmac_header = $_SERVER['HTTP_X_SHOPIFY_HMAC_SHA256'];
        $data = file_get_contents('php://input');
        $shop_domain = str_replace("shop=", '', $_SERVER['QUERY_STRING']);
        if($shop_domain){
            $this->sm->updateByShop($shop_domain, array('status'=>1));
            //write_file( './public/uploads/uninstall_res_'.uniqid().'.txt', $data, 'w+');
        }
    }

    private function verify_webhook($data, $hmac_header)
    {
        $calculated_hmac = base64_encode(hash_hmac('sha256', $data, $this->config->item('shopify_secret'), true));
        return hash_equals($hmac_header, $calculated_hmac);
    }

    public function cusRequestEnd(){
        $webhook_payload = file_get_contents('php://input');
        $webhook_payload = json_decode($webhook_payload, true);
        $shop_id = $webhook_payload['shop_id'];
        $shop_domain = $webhook_payload['shop_domain'];
        $customer_id = $webhook_payload['customer']['id'];
    }

    public function cusErasureEnd(){
        $webhook_payload = file_get_contents('php://input');
        $webhook_payload = json_decode($webhook_payload, true);
        $shop_id = $webhook_payload['shop_id'];
        $shop_domain = $webhook_payload['shop_domain'];
        $customer_id = $webhook_payload['customer']['id'];
    }

    public function shopErasureEnd(){
        $webhook_payload = file_get_contents('php://input');
        $webhook_payload = json_decode($webhook_payload, true);
        $shop_id = $webhook_payload['shop_id'];
        $shop_domain = $webhook_payload['shop_domain'];

        $domain_data = $this->sm->getsingledata($shop_domain);
        $this->sm->deleteShop('shops_meta', array('shop_id' => $domain_data->id));
        $delete_shop = $this->sm->deleteShop('shops', array('shop' => $shop_domain));
        if($delete_shop){
            echo 'Delete your all data!';
        }
    }
}