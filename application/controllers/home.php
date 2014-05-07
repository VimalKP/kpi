<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index() {

//        print_r($this->session->all_userdata());
        $comany_id = $this->session->userdata('company_id');
        if ($comany_id == '') {
            $comany_id = 1;
        }
        $this->load->model('social_media_model');
//        $array = array('company_id' => $comany_id);
        $data['twitterdata'] = $this->social_media_model->get_record($comany_id, 'twitter', 3);
        $data['facebookdata'] = $this->social_media_model->get_record($comany_id, 'facebook', 3);
       
        if (count($data['twitterdata']) == 0) {
            $data['twitterdata'] = $this->social_media_model->get_record(1, 'twitter', 3);
        }
        if (count($data['facebookdata']) == 0) {
            $data['facebookdata'] = $this->social_media_model->get_record(1, 'facebook', 3);
        }
//         echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        exit();
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('home_view', $data);
        $this->load->view('common/footer_view');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */