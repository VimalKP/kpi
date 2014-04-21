<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Load_function {

    public $CI;

    public function checkholiday() {
        $this->CI = &get_instance();

        $today = date('Y-m-d ');
        $tommorow = date('Y-m-d', strtotime($today . ' + 1 day'));

        $this->CI->load->model('holiday_model');
        $date = $this->CI->holiday_model->checkdate($tommorow);
        if (count($date) > 0) {
            $success = 'yes';
            $msg = "Tomorrow is Holiday ";
            $data['is_holiday'] = $msg;
            $this->CI->session->set_userdata(array('is_holiday' => "yes"));

//            $this->CI->load->view('common/header_view', $data);
//            $this->CI->load->view('common/sidebar_view');
//            $this->CI->load->view('login_view');
//            $this->CI->load->view('common/footer_view');
        }else{
            $this->CI->session->set_userdata(array('is_holiday' => ""));
        }
    }

}
?>