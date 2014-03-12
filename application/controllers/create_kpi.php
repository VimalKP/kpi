<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_kpi extends CI_Controller {

    public function index() {

        if ($this->session->userdata('user_type_id_fk') != 1) {
            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('login_view');
            $this->load->view('common/footer_view');
        } else {
            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('create_kpi_view');
            $this->load->view('common/footer_view');
        }
    }

    public function createkpi() {

        $kpi_name = $this->input->post('kpi_name');
        $frequency = $this->input->post('frequency');
        $kpi_type = $this->input->post('kpi_type');

        $postArr = array(
            'kpi_type' => $kpi_name,
            'frequency' => $frequency,
            'kpi_type' => $kpi_type,
            'kpi_master_date_added' => date("Y-m-d H:i:s")
        );
//        $kpiarr = $this->input->post();

        $kpi_master_kpi_name = $this->input->post('kpi_name');
        $kpi_master_kpi_type = $this->input->post('kpi_type');
        $kpi_master_frequency = $this->input->post('frequency');


        $kpiarr = array(
            'kpi_name' => $kpi_master_kpi_name,
            'kpi_type' => $kpi_master_kpi_type,
            'frequency' => $kpi_master_frequency,
            'kpi_master_date_added' => date("Y-m-d H:i:s")
        );


        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('frequency', 'Frequency', 'required|callback_frequency_check');
        $this->form_validation->set_message('frequency_check', 'The %s field must be selected');
        $this->form_validation->set_rules('kpi_type', 'Kpi Type', 'required|callback_kpitype_check');
        $this->form_validation->set_message('kpitype_check', 'The %s field must be selected');
        $this->form_validation->set_rules('kpi_name', 'Kpi Name', 'required|is_unique[kpi_master.kpi_name]');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('create_kpi_view');
            $this->load->view('common/footer_view');
        } else {
            $this->load->model('create_kpi_model');
            $this->create_kpi_model->insertdata($kpiarr);

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('home_view');
            $this->load->view('common/footer_view');
        }
    }

    function frequency_check($arr) {


        if ($arr == '0') {

            return FALSE;
        }

        return TRUE;
    }

    function kpitype_check($array) {


        if ($array == '0') {

            return FALSE;
        }

        return TRUE;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */