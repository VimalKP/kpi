<?php

class Register_model extends CI_Model {

    public function insertdata($postArr) {
        unset($postArr['cpassword']);
        $this->db->insert('registration', $postArr);
    }

    public function select($loginValues) {
        extract($loginValues);
//        print_r($loginValues);
        $query = $this->db->get_where('registration', array('username' => $username, 'password' => $password));

//       / print_r($loginValues);
        return $query->result();
//        return print_r($loginValues);
    }

}

?>
