<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Target_assign extends CI_Controller {

    public function index() {

        $userid = $this->session->userdata('user_id');

        $this->load->model('registration_model');
        $data['usergetArr'] = $this->registration_model->get_child_user($userid);

//        echo"<pre>";
//        print_r($data['kpigetArr']);
//        echo"</pre>";
//        exit();

        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('target_assign_view', $data);
        $this->load->view('common/footer_view');
    }

    public function user_kpi() {

        $user_id_fk = $this->input->post('userid');

        $this->load->model('kpi_user_model');
        $assignkpiarr = $this->kpi_user_model->get_record(array('user_id_fk' => $user_id_fk));
        $assignkpi = $assignkpiarr[0]['kpi_id_fk'];
        $kpiarr = explode(',', $assignkpi);
//        echo '<pre>';
//        print_r($kpiarr);
//        echo '</pre>';
//        exit();
        $this->load->model('target_model');
        $result['get_assign_kpi'] = $this->kpi_user_model->get_assign_kpi($kpiarr, $user_id_fk);
        $result['assign_kpi_value'] = $this->target_model->get_record(array('user_id_fk' => $user_id_fk));
//          $result['get_assign_kpi'] = $all_kpi_arr;
//          $result['assign_kpi_value'] = $all_kpi_arr;
//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';
//        exit();
        echo json_encode($result);
    }

    function addtarget() {
        $kpi_id_fk = $this->input->post('kpi_id_fk');
        $value = $this->input->post('value_of_target');
        $user_id_fk = $this->input->post('user_id_fk');
        $select = array('kpi_id_fk' => $kpi_id_fk, 'user_id_fk' => $user_id_fk);
        $update = array('value_of_target' => $value, 'target_date_added' => date("Y-m-d H:i:s"), 'update_status' => 1);
        $postArr = array('kpi_id_fk' => $kpi_id_fk, 'value_of_target' => $value, 'target_date_added' => date("Y-m-d H:i:s"), 'user_id_fk' => $user_id_fk);
        $this->load->model('target_model');
        $data = $this->target_model->get_record($select);
        if (count($data) > 0) {
            $this->target_model->update_record($select, $update);
        } else {
            $this->target_model->insert_record($postArr);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */