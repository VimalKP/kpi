<?php
/**
 * Description of Company_detail_model
 *
 * @author Vimal Patel
 */
class Company_detail_model extends CI_Model {

    var $tableName;

    function __construct() {
        parent::__construct();
        $this->tableName = "company_detail";
    }

    function get_record($where = array(), $limit = NULL, $offset = NULL) {
        if (!empty($where)) {
            foreach ($where as $key => $val) {
                $this->db->where($key, $val);
            }
        }
        if ($limit != NULL && $offset != NULL)
            $this->db->limit($limit, $offset);
        $this->db->order_by('company_id', 'asc');
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
        $this->db->where_in('company_id', $id);
        $this->db->delete($this->tableName);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function insertdata($companyarr) {
        $this->db->insert('company_detail', $companyarr);
        return $this->db->insert_id();
    }

    public function getcompanydetail($cid) {
        $query = $this->db->get_where('company_detail', array('company_id' => $cid));
        return $query->result();
    }
    
    function get_company_detail($user_id) {
        $this->db->select('*');
        $query = $this->db->get('company_detail');
//        $this->db->select('user_id');
//        $parent_name = array(user_id,username);
//        $this->db->from('blogs');
//        $this->db->join('comments', 'comments.id = blogs.id');
//        $query = $this->db->get('registration');
        return $query->result();
    }
    
    public function get_company($user_id) {
//        $this->db->where('registration_status', 0);
//        $query = $this->db->get('registration');
        $query = $this->db->get_where('company_detail', array('company_status' => 0));
//        return $query->result();
//        print_r($query);
//        exit ();

        return $query->result();
    }

    public function getcompanyalldetail($company_id) {
        $query = $this->db->get_where('company_detail', array('company_id' => $company_id));
        return $query->result();
    }

    public function del_particular_company($company_id, $companystatus) {
        $data = array(
            'company_status' => $companystatus,
        );
//        $this->db->where('id', $id);
        $this->db->where('company_id', $company_id);
        $this->db->update('company_detail', $data);
//        return $query->result();
    }

}

?>
