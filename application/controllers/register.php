<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends CI_Controller {

    public function index() {
//        echo "<pre>";
//        print_r($this->session->userdata('user_type_id_fk'));
//        echo "</pre>";
//        exit();
        $company_id = $this->session->userdata('company_id');
        if ($this->session->userdata('user_type_id_fk') != 1 && $this->session->userdata('user_type_id_fk') != 2) {
            // if session running then redirect to home page.
            // if session expired then go to login
            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('users_view');
            $this->load->view('common/footer_view');
        } else {
            $this->load->model('user_type_model');
            $data['usertypeArr'] = $this->user_type_model->get_usertype();
//        print_r($data['usertypeArr']);
//        exit();

            $this->load->model('registration_model');
            $data['userArr'] = $this->registration_model->get_user($company_id);
//        print_r($data['userArr']);
//        exit();

            $this->load->model('registration_model');
            $data['usergetArr'] = $this->registration_model->get_user($company_id);
//        print_r($data['usergetArr']);
//        exit();

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('register_view', $data);
            $this->load->view('common/footer_view');
        }
    }

    public function reg() {
//        $postArr = $this->input->post();
        $company_id = $this->session->userdata('company_id');
        $userid = $this->input->post('userid');
        $register_firstname = $this->input->post('firstname');
        $register_lastname = $this->input->post('lastname');
        $register_username = $this->input->post('username');
        $register_password = $this->input->post('password');
        $register_firstname = $this->input->post('firstname');
        $register_parent_id = $this->input->post('parent_id');
        $register_email_id = $this->input->post('email_id');
        $register_phone_number = $this->input->post('phone_number');
        $register_address = $this->input->post('address');
        $register_user_type_id_fk = $this->input->post('user_type_id_fk');
        $register_birthdate = $this->input->post('birthdate');
        $register_gender = $this->input->post('gender');
        $register_profile_image = $_FILES['profile_image']['name'];
//        $register_profile_image = $this->input->post('profile_image');

        $postArr = array(
            'user_type_id_fk' => $register_user_type_id_fk,
            'firstname' => $register_firstname,
            'lastname' => $register_lastname,
            'username' => $register_username,
            'password' => $register_password,
            'parent_id' => $register_parent_id,
            'email_id' => $register_email_id,
            'phone_number' => $register_phone_number,
            'address' => $register_address,
            'birthdate' => $register_birthdate,
            'gender' => $register_gender,
            'profile_image' => $register_profile_image,
            'registration_date_added' => date("Y-m-d H:i:s"),
            'company_id' => $company_id
        );

//        echo '<pre>';
//        print_r($postArr);
//        echo '</pre>';
//        exit();

        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        if ($userid == '') {
            $this->form_validation->set_rules('user_type_id_fk', 'User Type', 'required|callback_register_check');
            $this->form_validation->set_message('register_check', 'The %s field must be selected');
            $this->form_validation->set_rules('parent_id', 'Parent user', 'required|callback_parentid_check');
            $this->form_validation->set_message('parentid_check', 'The %s field must be selected');
            $this->form_validation->set_rules('firstname', 'Firstname', 'required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[20]|is_unique[registration.username]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[20]|matches[cpassword]');
            $this->form_validation->set_rules('cpassword', 'Re-Password', 'required');
            $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email|is_unique[registration.email_id]');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|min_length[10]|numeric|is_unique[registration.phone_number]');
        } else {
            $this->form_validation->set_rules('user_type_id_fk', 'User Type', 'required|callback_register_check');
            $this->form_validation->set_rules('parent_id', 'Parent user', 'required|callback_parentid_check');
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[20]|[registration.username]');
            $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email[registration.email_id]');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|min_length[10]|numeric[registration.phone_number]');
        }




//        $this->form_validation->set_rules('birthdate', 'Birthdate', 'required');
//        var_dump($this->form_validation->run());
//        exit();

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
            $this->load->view('users_view', $data);
            $this->load->view('common/footer_view');
        }
    }

    function get_register() {
        $company_id = $this->session->userdata('company_id');
        $this->load->model('registration_model');
        $data['registerArr'] = $this->registration_model->get_user_detail($company_id);

        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
//       $this->load->view('alluser_view');
        $this->load->view('users_view', $data);
        $this->load->view('common/footer_view');
//        print_r($data['registerArr'][0]);
//        exit();
    }

    function delete_user() {
        $user_id = $this->input->post('userid');
        $regstatus = $this->input->post('regstatus');
//        $user_id = $this->input->post['id'];
//        $company_id = $this->session->userdata('company_id');
//        $this->db->where('user_id', $id);
//        $this->db->delete('registration');
        $this->load->model('registration_model');
        $this->registration_model->del_particular_user($user_id,$regstatus);
//        $data['registerArr'] = $this->registration_model->get_user_detail($company_id);
//        $this->load->view('common/header_view');
//        $this->load->view('common/sidebar_view');
////       $this->load->view('alluser_view');
//        $this->load->view('users_view', $data);
//        $this->load->view('common/footer_view');

// Produces:
    }

    function edit_user() {
        $id = $_GET['id'];
        $this->load->model('user_type_model');
        $data['usertypeArr'] = $this->user_type_model->get_usertype();
//        print_r($data['usertypeArr']);
//        exit();

        $this->load->model('registration_model');
        $data['userArr'] = $this->registration_model->get_user();
//        print_r($data['userArr']);
//        exit();

        $this->load->model('registration_model');
        $data['usergetArr'] = $this->registration_model->get_user();

        $data['data'] = $this->registration_model->getuseralldetail($id);
//        echo '<pre>';
//        print_r($data);
//        echo '<pre>';
//        exit ();
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
//             $this->load->view('common/menu_panel_view');
        $this->load->view('register_view', $data);
        $this->load->view('common/footer_view');
    }

    function register_check($arr) {

        if ($arr == '0') {

            return FALSE;
        }

        return TRUE;
    }

    function parentid_check($array) {

        if ($array == '$$') {

            return FALSE;
        }

        return TRUE;
    }

}