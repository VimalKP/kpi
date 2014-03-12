<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company extends CI_Controller {

    public function index() {
        
        if ($this->session->userdata('user_type_id_fk')!=1) {
            // if session running then redirect to home page.
            // if session expired then go to login
            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
           
            $this->load->view('login_view');
            $this->load->view('common/footer_view');
        } else {
            $this->load->model('Company_detail_model');
            $data['data'] = $this->Company_detail_model->getcompanydetail($this->session->userdata('company_id'));
//        $arrar1 = $this->db->get('company_detail');
//        $this->db->limit(1);
//        print_r($arrar1);
//        exit();
//        print_r($data);
//        exit ();
            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
//             $this->load->view('common/menu_panel_view');
            $this->load->view('company_detail_view', $data);
            $this->load->view('common/footer_view');
        }
    }

    public function companydetail() {
//        $companyarr = $this->input->post();
        $company_name = $this->input->post('company_name');
        $company_address = $this->input->post('company_address');
        $company_type = $this->input->post('company_type');
        $company_email = $this->input->post('company_email');
        $company_phone = $this->input->post('company_phone');
        $company_website = $this->input->post('company_website');
        $facebook_page = $this->input->post('facebook_page');
        $twitter_page = $this->input->post('twitter_page');
        $postArr = array(
            'company_name' => $company_name,
            'company_address' => $company_address,
            'company_type' => $company_type,
            'company_email' => $company_email,
            'company_phone' => $company_phone,
            'company_website' => $company_website,
//            'company_status' => $register_phone_number,
            'facebook_page' => $facebook_page,
            'twitter_page' => $twitter_page,
            'company_detail_date_added' => date("Y-m-d H:i:s")
        );
        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('company_name', 'Company Name', 'required|is_unique[company_detail.company_name]');
        $this->form_validation->set_rules('company_email', 'Email', 'required|valid_email|is_unique[company_detail.company_email]');
        $this->form_validation->set_rules('company_phone', 'Phone Number', 'required|min_length[10]|numeric|is_unique[company_detail.company_phone]');
        $this->form_validation->set_rules('company_type', 'Company Type', 'required|callback_company_check');
        $this->form_validation->set_message('company_check', 'The %s field must be selected');
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('company_detail_view');
            $this->load->view('common/footer_view');
        } else {
            $this->load->model('Company_detail_model');
            $this->Company_detail_model->insertdata($postArr);

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('create_kpi_view');
            $this->load->view('common/footer_view');
        }
    }

    function company_check($arr) {


        if ($arr == '0') {

            return FALSE;
        }

        return TRUE;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */