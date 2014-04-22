<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function index() {
        $id = $this->session->userdata('user_id');
        $this->load->model('user_type_model');

//        print_r($data['usertypeArr']);
//        exit();
        $company_id = $this->session->userdata('company_id');
        $data['usertypeArr'] = $this->user_type_model->get_usertype($company_id);
        $this->load->model('registration_model');
        $data['userArr'] = $this->registration_model->get_user($company_id);
//        print_r($data['userArr']);
//        exit();

        $this->load->model('registration_model');
        $data['usergetArr'] = $this->registration_model->get_user($company_id);
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        exit();
        $data['data'] = $this->registration_model->getuseralldetail($id);

        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('profile_view', $data);
        $this->load->view('common/footer_view');
    }

    public function profile_edit() {


        $company_id = $this->session->userdata('company_id');
        $userid = $this->input->post('userid');
        $register_firstname = $this->input->post('firstname');
        $register_lastname = $this->input->post('lastname');
        $register_email_id = $this->input->post('email_id');
        $register_phone_number = $this->input->post('phone_number');
        $register_address = $this->input->post('address');
        $register_birthdate = $this->input->post('birthdate');
        $register_gender = $this->input->post('gender');
        $register_profile_image = $_FILES['profile_image']['name'];
//        $register_profile_image = $this->input->post('profile_image');

        $postArr = array(
            'firstname' => $register_firstname,
            'lastname' => $register_lastname,
            'email_id' => $register_email_id,
            'phone_number' => $register_phone_number,
            'address' => $register_address,
            'birthdate' => $register_birthdate,
            'gender' => $register_gender,
            'profile_image' => $register_profile_image,
            'company_id' => $company_id
        );

//        echo '<pre>';
//        print_r($postArr);
//        echo '</pre>';
//        exit();

        $this->load->helper(array('form'));
        $this->load->library('form_validation');

        $this->form_validation->set_message('register_check', 'The %s field must be selected');
        $this->form_validation->set_rules('firstname', 'Firstname', 'required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required');
        $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|min_length[10]|numeric');


        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

//            echo $_FILES['profile_image']['name'];
//            exit();
            $config['upload_path'] = './images/profile_pic/';
            $config['allowed_types'] = 'gif|jpg|png';
//            $config['file_name'] = $register_profile_image;
//            $config['max_size'] = '1000';
//            $config['max_width'] = '1200';
//            $config['max_height'] = '900';
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('profile_image')) {
                $error = array('error' => $this->upload->display_errors());
//                echo '<pre>';
//                print_r($error);
//                echo '</pre>';
//                exit();
//                $this->load->view('register_view', $error);
            } else {
                $data = array('upload_data' => $this->upload->data());
            }


            $this->load->model('registration_model');
            if ($userid == '') {
                $this->registration_model->insertdata($postArr);
            } else {
                $this->registration_model->updatedata($postArr, $userid);
            }

            $this->load->model('registration_model');
            $data['registerArr'] = $this->registration_model->get_user_detail($company_id);

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('home_view');
            $this->load->view('common/footer_view');
        }
    }

}

?>
