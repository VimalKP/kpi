<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kpi_assign extends CI_Controller {

    public function index() {


        $userid = $this->session->userdata('user_id');


        $this->load->model('registration_model');
        $data['usergetArr'] = $this->registration_model->get_child_user($userid);
        $this->load->model('kpi_master_model');
        $data['kpiArr'] = $this->kpi_master_model->get_record();

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

    public function fetch_kpi_of_user() {

        $user_id_fk = $this->input->post('userid');

        $this->load->model('kpi_user_model');
        $this->load->model('kpi_master_model');
        $assignkpiarr = $this->kpi_user_model->get_record(array('user_id_fk' => $user_id_fk));

        $all_kpi = $this->kpi_master_model->get_record();
        $all_kpi_arr = array();
        if (count($all_kpi) > 0)
            foreach ($all_kpi as $value) {
                $all_kpi_arr[$value['kpi_id']] = $value['kpi_name'];
            }

        if (count($assignkpiarr) > 0) {
            $assignkpi = $assignkpiarr[0]['kpi_id_fk'];
            $kpiarr = explode(',', $assignkpi);

            $assigned_kpi = $this->kpi_master_model->get_kpis_record($kpiarr);

            $assigned_kpi_arr = array();
            if (count($assigned_kpi) > 0)
                foreach ($assigned_kpi as $value) {
                    $assigned_kpi_arr[$value['kpi_id']] = $value['kpi_name'];
                }
            $result['assigned_kpi'] = $assigned_kpi_arr;
            $unassgned = array_diff($all_kpi_arr, $assigned_kpi_arr);
            $result['unassigned_kpi'] = $unassgned;
        } else {
            $result['unassigned_kpi'] = $all_kpi_arr;
        }
        
        echo json_encode($result);
    }

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

//             $this->kpi_user_model->insert_record($postArray);
            $this->kpi_user_model->upsert_record($kpi_assign_user_id_fk, $kpi_assign_kpi_id_fk);

//            echo"<pre>";
//            print_r($postArray);
//            echo"</pre>";
//            exit();

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('home_view');
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