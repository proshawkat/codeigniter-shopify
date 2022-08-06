<?php
class Common_model extends CI_Model
{
    public function getData($table, $conditions, $oby = null, $order_type = null, $limit = 0, $offset = 0)
    {
        $this->db->where($conditions);
        if($limit > 0){
            $this->db->limit($limit);
        }
        if($offset > 0){
            $this->db->offset($offset);
        }
        if($oby != null && $order_type != null){
            $this->db->order_by($oby, $order_type);
        }
        $this->db->from($table);
        return $this->db->get()->result();
    }

    public function getAllData($table){
        $query = $this->db->select('*')
            ->get($table);
        return $query->result();
    }

    public function getSingleOrderBy($table, $conditions, $order_by, $order_type)
    {
        $this->db->where($conditions);
        $this->db->order_by($order_by, $order_type);
        $this->db->from($table);
        $sql = $this->db->get();
        if($sql){
            return $sql->row();
        }
        return false;
    }

    public function save($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function getSelectColumn($table, $col, $where)
    {
        $this->db->select($col);
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->row();
    }
    public function getSingleColumn($table, $col, $where, $where_col)
    {
        $this->db->select($col);
        $this->db->from($table);
        $this->db->where($where, $where_col);
        return $this->db->get()->row();
    }

    public function getSingleRow($table, $where){
        return $this->db->get_where($table, $where)->row();
    }

    /*
     * @param $table is database table name
     * @conditions is an array of where clause
     */
    public function checkRows($table, $conditions)
    {
        $this->db->where($conditions);
        $sql = $this->db->get($table);
        if($sql){
            return $sql->num_rows();
        }
        return 0;
    }

    public function update_data($table, $conditions, $dtu)
    {
        $this->db->where($conditions);
        $this->db->update($table, $dtu);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function csv_download($table, $col, $where, $id)
    {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $query = $this->db->query("SELECT ".$col." FROM ".$table. ' WHERE '.$where .'='.$id);
        $delimiter = ",";
        $newline = "\r\n";
        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
        force_download('CSV_Report_'.$id.'.csv', $data);
    }

    public function getDataMail($table, $conditions, $condition_1)
    {
        $this->db->where($conditions);
        $this->db->or_where($condition_1);
        $this->db->from($table);
        return $this->db->get()->result();
    }
}
