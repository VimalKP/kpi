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
        $this->load->model('kpi_master_model');
        $assignkpiarr = $this->kpi_user_model->get_record(array('user_id_fk' => $user_id_fk));
        $assignkpi = $assignkpiarr[0]['kpi_id_fk'];
        $kpiarr = explode(',', $assignkpi);

        $all_kpi = $this->kpi_master_model->get_record();
        $assigned_kpi = $this->kpi_user_model->get_assign_kpi($kpiarr);

        $all_kpi_arr = array();
        if (count($all_kpi) > 0)
            foreach ($all_kpi as $value) {
                $all_kpi_arr[$value['kpi_id']] = $value['kpi_name'];
            }
        $assigned_kpi_arr = array();
        if (count($assigned_kpi) > 0)
            foreach ($assigned_kpi as $value) {
                $assigned_kpi_arr[$value['kpi_id']] = $value['kpi_name'];
            }
        $result['assigned_kpi'] = $assigned_kpi_arr;
        $unassgned = array_diff($all_kpi_arr, $assigned_kpi_arr);
        $result['unassigned_kpi'] = $unassgned;

        echo json_encode($result);
    }

    function addtarget() {
        $kpi_id_fk = $this->input->post('kpi_id_fk');
        $value = $this->input->post('value_of_target');
        $user_id_fk = $this->input->post('user_id_fk');
        $postArr = array('kpi_id_fk' => $kpi_id_fk, 'value_of_target' => $value, 'target_date_added' => date("Y-m-d H:i:s"), 'user_id_fk' => $user_id_fk);
        $this->load->model('target_model');
        $this->target_model->insert_record($postArr);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */