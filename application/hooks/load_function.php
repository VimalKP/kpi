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
        } else {
            $this->CI->session->set_userdata(array('is_holiday' => ""));
        }
    }

    public function msgcustom() {
        $this->CI = &get_instance();

        $where = array('message_status' => 1, 'date(message_date_added)' => date("Y-m-d"));

        $this->CI->load->model('message_model');
        $value = $this->CI->message_model->get_record($where);

        if (count($value) > 0) {
            $success = 'yes';
            $msg = $value[0]['message_text'];
            $data['custmsg'] = $msg;
            $this->CI->session->set_userdata(array('custmsg' => "$msg"));

//            $this->CI->load->view('common/header_view', $data);
//            $this->CI->load->view('common/sidebar_view');
//            $this->CI->load->view('login_view');
//            $this->CI->load->view('common/footer_view');
        } else {
            $this->CI->session->set_userdata(array('custmsg' => ""));
        }
    }

    public function worknotify() {
        $this->CI = &get_instance();

        $user_id = $this->CI->session->userdata('user_id');
//        $user_id =5;
        if ($user_id != '') {
            $this->CI->load->model('entry_kpi_model');
            $notify = $this->CI->entry_kpi_model->notification($user_id);

            if (count($notify) > 0) {
                $notifyArr = array();
                foreach ($notify as $value) {
                    $notifyArr[$value['kpi_name']] = $value['approved_value'];
                }
                $notifyVal = json_encode($notifyArr);
                $success = 'yes';
                $msg = $notify[0]['approved_value'];
                $msg1 = $notify[0]['kpi_name'];
                $data['notifytarget'] = $msg;
                $data['notifykpi'] = $msg1;
                $this->CI->session->set_userdata(array('notifytarget' => "$notifyVal"));

//            $this->CI->load->view('common/header_view', $data);
//            $this->CI->load->view('common/sidebar_view');
//            $this->CI->load->view('login_view');
//            $this->CI->load->view('common/footer_view');
            } else {
                $this->CI->session->set_userdata(array('notifytarget' => ""));
            }
        } else {
            $this->CI->session->set_userdata(array('notifytarget' => ""));
        }
    }

}

?>