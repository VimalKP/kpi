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
        $data['twitterdata'] = $this->social_media_model->get_record($comany_id,'twitter', 3);
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('home_view', $data);

        $this->load->view('common/footer_view');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */