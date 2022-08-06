<?php
class  Shop_model extends CI_Model
{

	function save($data)
	{
          $this->db->insert('shops', $data);
          return $this->db->insert_id();
	}

	function update($id, $data){
        $this->db->where('id', $id);
        $update = $this->db->update('shops', $data);
        return $update;
    }

	function updateByShop($shop, $data){
        $this->db->where('shop', $shop);
        $update = $this->db->update('shops', $data);
        return $update;
    }

	function getsingledata($shop) { 
		$data = $this->db->get_where('shops', array('shop' => $shop))->row();
		return $data;
	}

	function activeShop($shop) {
		$data = $this->db->get_where('shops', array('shop' => $shop, 'status'=>0))->row();
		return $data;
	}

	function shopInfo($id, $slug = ''){
        return $this->db->select('shops.*')
            ->from('shops')
            ->join('events', 'events.shop_id = shops.id', 'right')
            ->where('events.id', $id)
            //->where('events.event_live_page_link', $slug)
            ->get()->row();

    }

    function getAllShop()
    {
        $query = $this->db->select('*')
            ->order_by('id', 'desc')
            ->get('shops');
        return $query->result();
    }

    function deleteShop($table, $where = array()){
        $this->db->where($where);
        $this->db->delete($table);
    }
	
}

