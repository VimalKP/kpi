<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Create_kpi_model extends CI_Model {

    public function insertdata($kpiarr) {
               $this->db->insert('kpi_master', $kpiarr);
    }
    public function createkpi($kid) {
        $query = $this->db->get_where('create_kpi', array('kpi_id' => $kip));
        return $query->result();
//        print_r($query);
//        exit ();
    }
}

?>
