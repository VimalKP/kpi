<?php

/**
 * Description of approve_kpi_model
 *
 * @author Vimal Patel
 */
class social_media_model extends CI_Model {

    var $tableName;
    var $tablebrandDetail;

    function __construct() {
        parent::__construct();
        $this->tableName = "posts";
        $this->tablebrandDetail = "brand_detail";
    }

    function get_record($comany_id,$channel_name, $limit = NULL) {
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->join('brand_detail', 'brand_detail.brand_id = posts.brand_id_fk');
        $this->db->where('brand_detail.company_id_fk', $comany_id);
        $this->db->where('brand_detail.channel_name', $channel_name);
        $this->db->order_by('posts.posted', 'DESC');
        $this->db->limit($limit);
        $sql = $this->db->get();

        if ($sql->num_rows() > 0)
            return $sql->result_array();
        else
            return array();
    }

    function get_record_table($where = array(), $limit = NULL, $offset = NULL) {
        if (!empty($where)) {
            foreach ($where as $key => $val) {
                $this->db->where($key, $val);
            }
        }
        if ($limit != NULL && $offset != NULL)
            $this->db->limit($limit, $offset);
        $this->db->order_by('posted', 'DESC');
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
    function insert_record_brand($data) {
        $this->db->insert($this->tablebrandDetail, $data);
        return $this->db->insert_id();
    }

    public function update_record_brand($where, $data) {
        $this->db->update($this->tablebrandDetail, $data, $where);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function delete_record($id) {
        $this->db->where_in('approve_kpi_id', $id);
        $this->db->delete($this->tableName);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

}
