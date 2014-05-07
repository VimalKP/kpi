<?php

/**
 * Description of Entry_kpi_model
 *
 * @author Vimal Patel
 */
class Entry_kpi_model extends CI_Model {

    var $tableName;

    function __construct() {
        parent::__construct();
        $this->tableName = "entry_kpi";
    }

    function get_record($where = array(), $limit = NULL, $offset = NULL) {
        if (!empty($where)) {
            foreach ($where as $key => $val) {
                $this->db->where($key, $val);
            }
        }
        if ($limit != NULL && $offset != NULL)
            $this->db->limit($limit, $offset);
        $this->db->order_by('entry_kpi_date_added', 'asc');
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

    public function delete_record($where) {
        if (!empty($where)) {
            foreach ($where as $key => $val) {
                $this->db->where($key, $val);
            }
        }
        $this->db->delete($this->tableName);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function getentrydetail($entry) {
        $query = $this->db->get_where('registration', array('user_id' => $entry));
//        echo"<pre>";
//        print_r($entry);
//        echo"</pre>";
//        exit();
        return $query->result();
    }

    function get_assign_target($user_id_fk,$kpiarr) {
//         $names = array('Frank', 'Todd', 'James');
//SELECT *
//FROM `kpi_master` AS k
//JOIN target AS t ON t.kpi_id_fk = k.kpi_id
//WHERE k.kpi_id
//IN ( 3, 1 )
//AND t.user_id_fk =4
//         $this->db->select('*');
//        $this->db->from($this->tableName);
//        $this->db->join('brand_detail', 'brand_detail.brand_id = posts.brand_id_fk');
//        $this->db->where('brand_detail.company_id_fk', $comany_id);
//        $this->db->where('brand_detail.channel_name', $channel_name);
        $this->db->select('*');
        $this->db->from('kpi_master as k');
        $this->db->join('target as t', 't.kpi_id_fk = k.kpi_id');
        $this->db->where('t.user_id_fk', $user_id_fk);
        $this->db->where_in('k.kpi_id', $kpiarr);
//        $query = $this->db->get('kpi_master');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return array();
    }

    function get_child_entry($childArr) {
        /*
          SELECT * FROM `entry_kpi` as ke
          join target as t ON t.user_id_fk=ke.user_id_fk
          join kpi_master as k ON ke.kpi_id_fk=k.kpi_id
          join registration r on ke.user_id_fk=r.user_id where ke.user_id_fk IN (4) AND date(ke.entry_kpi_date_added)=CURDATE() AND t.kpi_id_fk=ke.kpi_id_fk
         * 
         */
//        $where = "name='Joe' AND status='boss' OR status='active'";
//        $this->db->where($where);
//        $query="SELECT * FROM `entry_kpi` as ke
//          join target as t ON t.user_id_fk=ke.user_id_fk
//          join kpi_master as k ON ke.kpi_id_fk=k.kpi_id
//          join registration r on ke.user_id_fk=r.user_id where ke.user_id_fk IN (4) AND date(ke.entry_kpi_date_added)=CURDATE() AND t.kpi_id_fk=ke.kpi_id_fk";
        $this->db->select('*');
        $this->db->from('entry_kpi as ke');
        $this->db->join('target as t', 't.user_id_fk=ke.user_id_fk');
        $this->db->join('kpi_master as k', 'ke.kpi_id_fk=k.kpi_id');
        $this->db->join('registration as r', 'ke.user_id_fk=r.user_id');
        $this->db->where('t.kpi_id_fk =ke.kpi_id_fk');
        $this->db->where_in('ke.user_id_fk', $childArr);
        $this->db->where_in('date(ke.entry_kpi_date_added)', date('Y-m-d'));
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return array();
    }

    function notification($userid) {
        $query = $this->db->query("SELECT * FROM target AS t JOIN entry_kpi AS ke ON t.user_id_fk = ke.user_id_fk JOIN kpi_master AS k ON t.kpi_id_fk = k.kpi_id WHERE ke.user_id_fk =$userid AND ke.approved_status =1 AND date( ke.entry_kpi_date_added ) = CURDATE( ) AND ke.kpi_id_fk = t.kpi_id_fk");
//        $this->db->query("SELECT * FROM target AS t JOIN entry_kpi AS ke ON t.user_id_fk = ke.user_id_fk JOIN kpi_master AS k ON t.kpi_id_fk = k.kpi_id WHERE ke.user_id_fk =$userid AND ke.approved_status =1 AND date( ke.entry_kpi_date_added ) = CURDATE( ) AND ke.kpi_id_fk = t.kpi_id_fk");
//        $this->db->select('t.value_of_target,t.kpi_id_fk,k.kpi_name');
//        $this->db->from('entry_kpi as ke');
//        $this->db->join('target as t', 't.user_id_fk=ke.user_id_fk');
//        $this->db->join('kpi_master as k', 't.kpi_id_fk=k.kpi_id');
//        $this->db->where('ke.kpi_id_fk ', ' t.kpi_id_fk');
//        $this->db->where(array('ke.user_id_fk' => $userid, 'ke.approved_status' => 1, 'date(ke.entry_kpi_date_added)' => date('Y-m-d')));
//        $query = $this->db->get();
//         echo"<pre>";
//         print_r($query->result_array());
//         echo"</pre>";
//         exit();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return array();
//        $query=$this->db->get_where('entry_kpi',array('user_id_fk'=>$userid,'approved_status'=>0));
//         return $query->result();
    }

}

?>
