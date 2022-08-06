<?php
function validate_file_types($file_name, $types = array("jpg", "png", "gif", "jpeg"))
{
    $ext = pathinfo($file_name);
    #print_r($ext);exit;
    $ext = strtolower($ext['extension']);
    if(in_array($ext, $types)){
        return true;
    }
    return false;
}

function get_file_extension($file_name)
{
    $ext = pathinfo($file_name);
    $ext = strtolower($ext['extension']);
    return $ext;
}

function upload_file_to_server($file_to_upload, $uploaded_file_name)
{
    $file_destination = "./public/uploads/".$uploaded_file_name;
    if(file_exists($file_to_upload)){
        copy($file_to_upload, $file_destination);
    }
}

function get_audience_url($event_id)
{
    if($event_id > 0){
        return $event_id;
    }
}

function get_store_url_from_shopify_admin($server_http_referer_url)
{
    if($server_http_referer_url) {
        $shop = explode("shop=", $server_http_referer_url);
        $shop = urlencode($shop[1]);
        $shop = explode("%26timestamp%", $shop);
        return $shop[0];
    }
}

function get_logged_email ()
{
    $context =& get_instance();
    $email = $context->session->userdata('logged_email');
    return ($email != "") ? $email : false;
}