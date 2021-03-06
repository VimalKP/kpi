<?php

/**
 * Description of Registration_model
 *
 * @author Vimal Patel
 */
class Registration_model extends CI_Model {

    var $tableName;

    function __construct() {
        parent::__construct();
        $this->tableName = "registration";
    }

    function get_record($where = array(), $limit = NULL, $offset = NULL) {
        if (!empty($where)) {
            foreach ($where as $key => $val) {
                $this->db->where($key, $val);
            }
        }
        if ($limit != NULL && $offset != NULL)
            $this->db->limit($limit, $offset);
        $this->db->order_by('user_id', 'asc');
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
        $this->db->where_in('user_id', $id);
        $this->db->delete($this->tableName);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function insertdata($postArr) {
        unset($postArr['cpassword']);
        $this->db->insert('registration', $postArr);
    }

    public function select($loginValues, $absentuserids, $check) {
        extract($loginValues);
        $where = array('r.username' => $username, 'r.password' => $password, 'r.registration_status' => 0, 'c.company_status' => 0);
//        print_r($loginValues);
        $this->db->select('*');
        if (!empty($where)) {
            foreach ($where as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        if ($check == 'abccheck' && count($absentuserids) > 0) {

            $this->db->where_not_in('r.user_id', $absentuserids);
        }

        $this->db->from('registration AS r'); //company_detail
        $this->db->join('company_detail as c', 'r.company_id=c.company_id');
//        $query = $this->db->get_where('registration', array('username' => $username, 'password' => $password, 'registration_status' => 0));
//       / print_r($loginValues);
        $query = $this->db->get();
        return $query->result();
//        return print_r($loginValues);
    }

    public function get_user($company_id) {
//        $this->db->where('registration_status', 0);
//        $query = $this->db->get('registration');
        $query = $this->db->get_where('registration', array('company_id' => $company_id, 'registration_status' => 0));
//        return $query->result();
//        print_r($query);
//        exit ();

        return $query->result();
    }

    public function del_particular_user($user_id, $regstatus) {
        $data = array(
            'registration_status' => $regstatus,
        );
//        $this->db->where('id', $id);
        $this->db->where('user_id', $user_id);
        $this->db->update('registration', $data);
//        return $query->result();
    }

    function get_child_user($userid) {
        $query = $this->db->get_where('registration', array('parent_id' => $userid, 'registration_status' => 0));
        return $query->result();
    }

    function get_child_and_user($companyid,$userid,$parent_id) {
//        $this->db->or_where('user_id', $userid);
//        $query = $this->db->get_where('registration', array('parent_id' => $userid, 'registration_status' => 0));

//        $query = $this->db->query("select * from registration where company_id=$companyid AND registration_status=0");
      if($parent_id==0){
        $query = $this->db->query("select * from registration where company_id=$companyid AND registration_status=0");  
      }else{
          $query = $this->db->query("select * from registration where company_id=$companyid AND (parent_id = $userid OR user_id = $userid) AND registration_status=0");
      }
        

        return $query->result();
    }

    // select * from registration where parent_id = $userid OR user_id = $userid

    function get_child_user_array($userid) {
        $query = $this->db->get_where('registration', array('parent_id' => $userid, 'registration_status' => 0));
//        return $query->result();
        if ($query->num_rows() > 0)
            return $query->result_array();
        else
            return array();
    }

    function get_user_detail($company_id) {
        $this->db->select('*');
        $this->db->from('registration as r');
        $this->db->join('user_type as u', 'r.user_type_id_fk=u.user_type_id');
        $this->db->where(array('r.company_id'=>$company_id));
        $query = $this->db->get();
        return $query->result();




//        $query = $this->db->get_where('registration', array('company_id' => $company_id));
//        $this->db->select('user_id');
//        $parent_name = array(user_id,username);
//        $this->db->from('blogs');
//        $this->db->join('comments', 'comments.id = blogs.id');
//        $query = $this->db->get('registration');
//        return $query->result();
    }

    public function getuseralldetail($userid) {
        $query = $this->db->get_where('registration', array('user_id' => $userid, 'registration_status' => 0));
        return $query->result();
    }

    public function del_user() {

        $this->db->where('user_id', $user_id);
        $this->db->delete('registration');
//        return $query->result();
    }

    public function getregisterdetail($rid) {
        $query = $this->db->get_where('registration', array('user_id' => $rid));
        return $query->result();
    }

//    public function getimage($image) {
//        $query2 = $this->db->query("SELECT images FROM registration WHERE user_id = $image")->row();
//        return $query2->images;
//    }

    public function updatedata($postArr, $id) {

        $this->db->where('user_id', $id);
        $this->db->update('registration', $postArr);
    }

    public function getAllregister() {
        $query = $this->db->get('registration');
        return $query->result();
//        print_r($query);
//        exit ();
    }

    function updateparentid($userid, $company_id) {
        $query = $this->db->query("UPDATE registration as r ,(SELECT user_id FROM registration WHERE parent_id=0 AND company_id=$company_id AND registration_status=0 LIMIT 1) as e SET r.parent_id=e.user_id WHERE r.user_id=$userid");
//        return $query->result();
    }

    function parentcheck($userid) {
//    $query = $this->db->get_where('registration', array('parent_id' => 'user_id'));
        $query = $this->db->query("select * from registration where parent_id = $userid  AND registration_status=0  ");
        return $query->result();
    }

    function change_pwd_new($pass) {
        $query = $this->db->get_where('registration', array('password' => $pass));
        return $query->result();
    }

    function forgotpass($id) {
        $this->db->select('*');
        $query = $this->db->get_where('registration', array('user_id' => $id));
        return $query->result();
    }

    function usertype($companyid) {
        $this->db->select('*');
        $this->db->from('registration as r');
        $this->db->join('user_type as u', 'r.company_id=u.company_id_fk');
         $this->db->where(array('u.company_id_fk'=>$companyid));
        $query = $this->db->get();
        return $query->result();
    }

//    function getext($id) {
//        $query = $this->db->query("SELECT ext FROM windows_users_image_upload WHERE user_id = $id")->row();
//        return $query->ext;
//    }
}

?>
