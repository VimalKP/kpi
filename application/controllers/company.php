<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company extends CI_Controller {

    public function index() {

        if ($this->session->userdata('user_type_id_fk') != 1) {
            // if session running then redirect to home page.
            // if session expired then go to login
            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('login_view');
            $this->load->view('common/footer_view');
        } else {
            $company_id = $this->session->userdata('company_id');
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


            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
//             $this->load->view('common/menu_panel_view');
            $this->load->view('company_detail_view', $data);
            $this->load->view('common/footer_view');
        }
    }

    public function companydetail() {
//        $companyarr = $this->input->post();

        $company_id = $this->session->userdata('company_id');
        $company_name = $this->input->post('company_name');
        if($company_name==''){
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