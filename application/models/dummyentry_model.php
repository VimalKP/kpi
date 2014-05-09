<?php

/**
 * Description of dummyentry_model
 *
 * @author kiran joshi
 */
class dummyentry_model extends CI_Model {

    var $tableName;

    function __construct() {
        parent::__construct();
        $this->tableName = "user_type";
    }

    function get_record($where = array(), $limit = NULL, $offset = NULL) {
        if (!empty($where)) {
            foreach ($where as $key => $val) {
                $this->db->where($key, $val);
            }
        }
        if ($limit != NULL && $offset != NULL)
            $this->db->limit($limit, $offset);
        $this->db->order_by('user_type_id', 'asc');
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
        $this->db->where_in('user_type_id', $id);
        $this->db->delete($this->tableName);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function listofdistincttargetdate() {
        $sql = $this->db->query("SELECT DISTINCT (
date( `target_date_added` )
) as date
FROM `target`");
        if ($sql->num_rows() > 0)
            return $sql->result_array();
        else
            return array();
    }

    public function listofdistinctkpitdate() {
        $sql = $this->db->query("SELECT DISTINCT (
date( `entry_kpi_date_added` )
) as date
FROM `entry_kpi`");
        if ($sql->num_rows() > 0)
            return $sql->result_array();
        else
            return array();
    }

    public function targetvalue($kpiid, $user_id_fk, $date) {
        $sql = $this->db->query("SELECT * from  target WHERE date( `target_date_added` )='$date' AND user_id_fk=$user_id_fk AND kpi_id_fk=$kpiid LIMIT 1 ");
        if ($sql->num_rows() > 0)
            return $sql->result_array();
        else
            return array();
    }

}

?>
