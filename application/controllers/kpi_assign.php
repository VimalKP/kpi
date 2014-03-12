<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kpi_assign extends CI_Controller {

    public function index() {


        $userid = $this->session->userdata('user_id');


        $this->load->model('registration_model');
        $data['usergetArr'] = $this->registration_model->get_child_user($userid);
        $this->load->model('kpi_master_model');
        $data['kpiArr'] = $this->kpi_master_model->getAllKpi();

        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('kpi_assign_view', $data);
        $this->load->view('common/footer_view');
    }

//    public function assign_kpi() {
//
//
//        $user_id = $this->input->post('user_id');
//
//        $postArr = array(
//            'user_id' => $user_id,
//
//        );
//
//        $kpiarr = $this->input->post();
//        $this->load->helper(array('form'));
//        $this->load->library('form_validation');
//
//        $this->form_validation->set_rules('user_type_id_fk', 'User Type', 'required|callback_user_type_check');
//        $this->form_validation->set_message('user_type_check', 'The %s field must be selected');
//
//        if ($this->form_validation->run() == FALSE) {
//
//            $this->load->view('common/header_view');
//            $this->load->view('common/sidebar_view');
//            $this->load->view('kpi_assign_view');
//            $this->load->view('common/footer_view');
//        }
//    }

    public function assign() {

        $kpi_assign_user_id_fk = $this->input->post('user_id_fk');
        $kpi_assign_kpi_id_fk = $this->input->post('assign_kpi_id');

        $postArray = array(
            'user_id_fk' => $kpi_assign_user_id_fk,
            'kpi_id_fk' => $kpi_assign_kpi_id_fk,
            'kpi_user_date_added' => date("Y-m-d H:i:s")
        );

        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_id_fk', 'Username', 'required|callback_user_name_check');
        $this->form_validation->set_message('user_name_check', 'The %s field must be selected');

        if ($this->form_validation->run() == FALSE) {

            $this->index();
        } else {

            $this->load->helper(array('form'));
            $this->load->model('kpi_user_model');

             $this->kpi_user_model->insert_record($postArray);

//            echo"<pre>";
//            print_r($postArray);
//            echo"</pre>";
//            exit();

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('target_assign_view');
            $this->load->view('common/footer_view');
        }
    }

    public function user_name_check($arr) {


        if ($arr == '0') {

            return FALSE;
        }

        return TRUE;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */