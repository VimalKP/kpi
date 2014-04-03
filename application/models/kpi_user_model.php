<?php

/**
 * Description of kpi_user
 *
 * @author Vimal Patel
 */
class kpi_user_model extends CI_Model {

    var $tableName;

    function __construct() {
        parent::__construct();
        $this->tableName = "kpi_user";
    }

    function get_assign_kpi($kpiarr, $user_id_fk) {
//         $names = array('Frank', 'Todd', 'James');
//SELECT *
//FROM `kpi_master` AS k
//JOIN target AS t ON t.kpi_id_fk = k.kpi_id
//WHERE k.kpi_id
//IN ( 3, 1 )
//AND t.user_id_fk =4
        $this->db->select('*');
//        $this->db->from($this->tableName);
//        $this->db->join('brand_detail', 'brand_detail.brand_id = posts.brand_id_fk');
//        $this->db->where('brand_detail.company_id_fk', $comany_id);
//        $this->db->where('brand_detail.channel_name', $channel_name);
//        $this->db->get('kpi_master');
        $this->db->from('kpi_master as k');
//        $this->db->join('target as t', 't.kpi_id_fk = k.kpi_id','right');
//        $this->db->where('t.user_id_fk', $user_id_fk);
        $this->db->where_in('k.kpi_id', $kpiarr);
//        $query = $this->db->get('kpi_master');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return array();
    }

    function get_assign_kpi_new($kpiarr, $user_id_fk) {
//         $names = array('Frank', 'Todd', 'James');
//SELECT *
//FROM `kpi_master` AS k
//JOIN target AS t ON t.kpi_id_fk = k.kpi_id
//WHERE k.kpi_id
//IN ( 3, 1 )
//AND t.user_id_fk =4
        $this->db->select('*');
//        $this->db->from($this->tableName);
//        $this->db->join('brand_detail', 'brand_detail.brand_id = posts.brand_id_fk');
//        $this->db->where('brand_detail.company_id_fk', $comany_id);
//        $this->db->where('brand_detail.channel_name', $channel_name);
//        $this->db->get('kpi_master');
        $this->db->from('kpi_master as k');
//        $this->db->join('kpi_use as ku', 't.kpi_id_fk = k.kpi_id');
//        $this->db->where('t.user_id_fk', $user_id_fk);
        $this->db->where_in('k.kpi_id', $kpiarr);
//        $query = $this->db->get('kpi_master');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return array();
    }

    function get_record($where = array(), $limit = NULL, $offset = NULL) {
        if (!empty($where)) {
            foreach ($where as $key => $val) {
                $this->db->where($key, $val);
            }
        }
        if ($limit != NULL && $offset != NULL)
            $this->db->limit($limit, $offset);
        $this->db->order_by('kpi_user_id', 'asc');
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
        $this->db->where_in('kpi_user_id', $id);
        $this->db->delete($this->tableName);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function upsert_record($userid, $kpi_id) {
        $query = "REPLACE INTO `kpi_user` (`user_id_fk`, `kpi_id_fk`) VALUES( $userid, '$kpi_id')";
        $this->db->query($query);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

}
