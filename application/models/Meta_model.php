<?php
class Meta_model extends CI_Model 
{

	function getShopOwner($id)
	{
		$response = $this->db->get_where('shops_meta', array('shop_id' => $id, 'meta_name'=> 'shop_owner'))->row();
		return $response;
	}

	function shopMoneyFormat($id)
	{
		$response = $this->db->get_where('shops_meta', array('shop_id' => $id, 'meta_name'=> 'shop_money_format'))->row();
		return $response;
	}

	function shopCurrency($id)
	{
		$response = $this->db->get_where('shops_meta', array('shop_id' => $id, 'meta_name'=> 'shop_money_format'))->row();
		return $response;
	}

	function getMeta($id)
	{
		$response = $this->db->get_where('shops_meta', array('shop_id' => $id))->result_array();
		return $response;
	}

	function add_shop_meta($shop_id, $meta_name, $value)
	{
		$res = $this->db->get_where('shops_meta', array('meta_name' => $meta_name, 'shop_id'=>$shop_id))->row();
		
		if( $res != NULL ) {
			$this->db->query("UPDATE shops_meta SET meta_value='" . $this->escapeString( $value ) . "' WHERE meta_id='" . $res->meta_id . "'");
		} else {
			$this->db->query("INSERT INTO shops_meta (shop_id, meta_name, meta_value) VALUES ('" . $shop_id . "', '" . $this->escapeString( $meta_name ) . "', '" . $this->escapeString( $value ) . "')");
		}
		return true;
	}

	function escapeString($val) {
	    $db = get_instance()->db->conn_id;
	    $val = mysqli_real_escape_string($db, $val);
	    return $val;
	}
}

