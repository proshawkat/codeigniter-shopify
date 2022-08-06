<?php
class Dashboard extends CI_Controller{

    public function __construct(){
    	parent::__construct();
    	$this->load->model('Meta_model');
    	$this->load->model('Shop_model');
    	$this->load->model('common_model');
    }

    public function index(){
        $this->load->view('admin/page_404');
    }

    public function app_home_page()
    {
        print_r("hello");
    }

    public function disconnect_app()
    {
        $shop = (isset($_GET['shop']) && !empty($_GET['shop'])) ? $_GET['shop'] : "";
        if($shop != "") {
            $this->common_model->update_data(Shop::TABLE, array(Shop::SHOP => $shop), array(Shop::APP_AUTHORIZED => 0));
        }
        redirect(base_url('app/home'), 'refresh');
    }

    public function logout_fogzee_app()
    {
        $shop = "";
        if(isset($_SESSION['shop'])){
            $shop = $_SESSION['shop'];
        }
        $this->session->sess_destroy();
        if($shop != "") {
            redirect('https://' . $shop . '/admin/');
        }else{
            echo "Invalid URL";
        }
    }

}

