<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function index() {
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('contact_us_view');
        $this->load->view('common/footer_view');
    }

    public function contactus() {
        $contact_name = $this->input->post('name');
        $contact_email_id = $this->input->post('email_id');
        $contact_message = $this->input->post('message');

        $contactArr = array(
            'name' => $contact_name,
            'email_id' => $contact_email_id,
            'message' => $contact_message,
            'contact_date_added' => date("Y-m-d H:i:s")
        );

        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = "";

//            redirect('contact/contactus');
            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('contact_us_view',$data);
            $this->load->view('common/footer_view');
        } else {
            $this->load->model('contact_model');
            $this->contact_model->insert_record($contactArr);

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('home_view');
            $this->load->view('common/footer_view');
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */