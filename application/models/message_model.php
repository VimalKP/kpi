<?php

/**
 * Description of login_log_mst
 *
 * @author Vimal Patel
 */
class message_model extends CI_Model {

    var $tableName;

    function __construct() {
        parent::__construct();
        $this->tableName = "message";
    }

    function get_record($where = array(), $limit = NULL, $offset = NULL) {
        if (!empty($where)) {
            foreach ($where as $key => $val) {
                $this->db->where($key, $val);
            }
        }
        if ($limit != NULL && $offset != NULL)
            $this->db->limit($limit, $offset);
        $this->db->order_by('message_id', 'asc');
        $sql = $this->db->get($this->tableName);
        if ($sql->num_rows() > 0)
            return $sql->result_array();
        else
            return array();
    }

    public function record_count() {
        return $this->db->count_all($this->tableName);
    }

    public function get_one_record($where) {
        $query = $this->db->get_where($this->tableName, $where);
        if ($query->num_rows() > 0)
            return $query->row_array();
        else
            return false;
    }

    function insert_record($data) {
        $this->db->insert($this->tableName, $data);
        return $this->db->insert_id();
    }

    public function update_record($where, $data) {
        $this->db->update($this->tableName, $data, $where);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function delete_record($id) {
        $this->db->where_in('login_log_mst_id', $id);
        $this->db->delete($this->tableName);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }
    function get_msg()
    {
       $query = $this->db->get('message');
       return $query->result();


       }

       function updatemsg($id,$data)
       {
           $this->db->where('user_id_fk', $id);
           $this->db->update('message', $data);
       }

}