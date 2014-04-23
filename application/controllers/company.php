<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company extends CI_Controller {

    public function index() {

        if ($this->session->userdata('user_id') == '') {
            // if session running then redirect to home page.
            // if session expired then go to login
            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('login_view');
            $this->load->view('common/footer_view');
        } else {
            $company_id = $this->session->userdata('company_id');
            
//            if($company_id==0){
//               $company_id= $cid;
////               echo 'if';
//            }
//            echo $company_id;
//            exit();
            $this->load->model('Company_detail_model');

            $data['data'] = $this->Company_detail_model->getcompanydetail($company_id);
            $preuserArr = array();
//            if (count($user_ids) > 0) {
            $this->load->model('user_type_model');
            $preuserArr = $this->user_type_model->get_record(array('company_id_fk' => $company_id));
//            }
            $j = 0;
            $preuser = array();
            if (count($preuserArr) > 0) {
                foreach ($preuserArr as $k => $v) {
//                    $preuser[$j]['id'] = $v['user_type_id'];
                    $preuser[$j]['name'] = $v['user_type'];
                    $j++;
                }
            }
            $data['preusers'] = json_encode($preuser);
//            echo '<pre>';
//            print_r($data);
//            echo '</pre>';
//            exit();

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
//             $this->load->view('common/menu_panel_view');
            $this->load->view('company_detail_view', $data);
            $this->load->view('common/footer_view');
        }
    }

    public function companydetail() {
//        $companyarr = $this->input->post();
        $company_id = $this->input->post('company_id');
        if ($company_id == '') {
            $company_id = $this->session->userdata('company_id');
        }

//        echo   $_GET['id'];
//        exit();
        $company_name = $this->input->post('company_name');


        if ($company_name == '') {
            $this->index();
        }
        $company_address = $this->input->post('company_address');
        $company_type = $this->input->post('company_type');
        $company_email = $this->input->post('company_email');
        $company_phone = $this->input->post('company_phone');
        $company_website = $this->input->post('company_website');
        $facebook_page = $this->input->post('facebook_page');
        $twitter_page = $this->input->post('twitter_page');
        $usertype = $this->input->post('usertype');
//        echo '<pre>';
//        print_r($usertype);
//        echo '</pre>';
//        exit();
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

        if ($company_id == '') {
            $this->form_validation->set_rules('company_name', 'Company Name', 'required|is_unique[company_detail.company_name]');
            $this->form_validation->set_rules('company_email', 'Email', 'required|valid_email|is_unique[company_detail.company_email]');
            $this->form_validation->set_rules('company_phone', 'Phone Number', 'required|min_length[10]|numeric|is_unique[company_detail.company_phone]');
            $this->form_validation->set_rules('company_type', 'Company Type', 'required|callback_company_check');
            $this->form_validation->set_message('company_check', 'The %s field must be selected');
        } else {
            $this->form_validation->set_rules('company_name', 'Company Name', 'required|[company_detail.company_name]');
            $this->form_validation->set_rules('company_email', 'Email', 'required|valid_email|[company_detail.company_email]');
            $this->form_validation->set_rules('company_phone', 'Phone Number', 'required|min_length[10]|numeric|[company_detail.company_phone]');
            $this->form_validation->set_rules('company_type', 'Company Type', 'required|callback_company_check');
            $this->form_validation->set_message('company_check', 'The %s field must be selected');
        }
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('company_detail_view');
            $this->load->view('common/footer_view');
        } else {
            $this->load->model('Company_detail_model');
            $this->load->model('social_media_model');
            if ($company_id == '') {
                $company_id = $this->Company_detail_model->insertdata($postArr);

                $brandData_fb = array(
                    'company_id_fk' => $company_id,
                    'channel_name' => 'facebook',
                    'brand' => $postArr['facebook_page']
                );
                $brandData_tw = array(
                    'company_id_fk' => $company_id,
                    'channel_name' => 'twitter',
                    'brand' => $postArr['twitter_page']
                );

                $this->social_media_model->insert_record_brand($brandData_fb);
                $this->social_media_model->insert_record_brand($brandData_tw);
            } else {
                $this->load->model('user_type_model');
                $preuserArr = $this->user_type_model->get_record(array('company_id_fk' => $company_id));
                $preuser = array();
                if (count($preuserArr) > 0) {
                    foreach ($preuserArr as $k => $v) {
                        $preuser[] = strtolower($v['user_type']);
                    }
                }
                $user_ids = explode(",", $usertype);
                foreach ($user_ids as $uid) {
                    $type = trim($uid, "'");
                    $browser['user_type'] = $type;
                    $browser['company_id_fk'] = $company_id;
                    if (@!in_array(strtolower($type), $preuser)) {
                        if($type!='')
                        $this->user_type_model->insert_record($browser);
                    }
                }
                $this->Company_detail_model->update_record(array('company_id' => $company_id), $postArr);

                $brandData_fb = array(
                    'brand' => $postArr['facebook_page']
                );
                $brandData_tw = array(
                    'brand' => $postArr['twitter_page']
                );

                $this->social_media_model->update_record_brand(array('company_id_fk' => $company_id, 'channel_name' => 'facebook'), $brandData_fb);
                $this->social_media_model->update_record_brand(array('company_id_fk' => $company_id, 'channel_name' => 'twitter'), $brandData_tw);
            }


//            $this->load->view('common/header_view');
//            $this->load->view('common/sidebar_view');
//            $this->load->view('home_view');
//            $this->load->view('common/footer_view');
           $username=  $this->session->userdata('username');
           if($username=='master_admin'){
               redirect('company/get_company');
           }else{
              $this->index($company_id);  
           }
           
        }
    }

    function get_company() {
        $user_id = $this->session->userdata('user_id');
        $this->load->model('company_detail_model');
        $data['companyArr'] = $this->company_detail_model->get_company_detail($user_id);

        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
//       $this->load->view('alluser_view');
        $this->load->view('all_company_view', $data);
        $this->load->view('common/footer_view');
//        print_r($data['registerArr'][0]);
//        exit();
    }

    function edit_company() {
        $id = $_GET['id'];

        $this->load->model('company_detail_model');
        $data['usergetArr'] = $this->company_detail_model->get_company($id);
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        exit();
        $data['data'] = $this->company_detail_model->getcompanyalldetail($id);
//        echo '<pre>';
//        print_r($data);
//        echo '<pre>';
//        exit ();
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
//             $this->load->view('common/menu_panel_view');
        $this->load->view('company_detail_view', $data);
        $this->load->view('common/footer_view');
    }

    function delete_company() {
        $company_id = $this->input->post('companyid');
        $companystatus = $this->input->post('companystatus');

        $this->load->model('company_detail_model');
        $this->company_detail_model->del_particular_company($company_id, $companystatus);
    }

    function addnewcompany() {
//        $companyarr = $this->input->post();

        $company_name = $this->input->post('company_name');

        $company_address = $this->input->post('company_address');
        $company_type = $this->input->post('company_type');
        $company_email = $this->input->post('company_email');
        $company_phone = $this->input->post('company_phone');
        $company_website = $this->input->post('company_website');
        $facebook_page = $this->input->post('facebook_page');
        $twitter_page = $this->input->post('twitter_page');
//        $usertype = $this->input->post('usertype');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
//        echo '<pre>';
//        print_r($usertype);
//        echo '</pre>';
//        exit();
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
//        $this->form_validation->set_rules('company_type', 'Company Type', 'required|callback_company_check');
//        $this->form_validation->set_message('company_check', 'The %s field must be selected');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[20]|is_unique[registration.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[20]');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('home_view');
            $this->load->view('common/footer_view');
        } else {
            $this->load->model('Company_detail_model');
            $this->load->model('social_media_model');
            $this->load->model('registration_model');

            $company_id = $this->Company_detail_model->insertdata($postArr);

            $brandData_fb = array(
                'company_id_fk' => $company_id,
                'channel_name' => 'facebook',
                'brand' => $postArr['facebook_page']
            );
            $brandData_tw = array(
                'company_id_fk' => $company_id,
                'channel_name' => 'twitter',
                'brand' => $postArr['twitter_page']
            );
            $companyUser = array(
                'company_id' => $company_id,
                'firstname' => $username,
                'username' => $username,
                'password' => $password,
            );

            $this->social_media_model->insert_record_brand($brandData_fb);
            $this->social_media_model->insert_record_brand($brandData_tw);

            $this->registration_model->insert_record($companyUser);

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('login_view');
            $this->load->view('common/footer_view');
//            $this->index();
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