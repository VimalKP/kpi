<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Attendance extends CI_Controller {

    public function index() {
        $userid = $this->session->userdata('user_id');

        $this->load->model('registration_model');
        $data['usergetArr'] = $this->registration_model->get_child_user($userid);
//        echo"<pre>";
//        print_r($data['usergetArr']);
//        echo"</pre>";
//        exit();

        $this->load->model('attendance_model');
        $absentArr = $this->attendance_model->get_record(array('attendance_date' => date("Y-m-d")));
        $absentuserids = array();
        if (count($absentArr) > 0) {
            foreach ($absentArr as $value) {
                $absentuserids[] = $value['user_id_fk'];
            }
        }
        $data['absentuserids'] = $absentuserids;

//        echo"<pre>";
//        print_r($absentuserids);
//        echo"</pre>";
//        exit();
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('attendance_view', $data);
        $this->load->view('common/footer_view');
    }

    public function user_attendance() {
        //put your logic here to get if the user already absent.....means fetch its attendance status and then if he is absent then remove its entry...if not then enter new entry for him

        $user_id = $this->input->post('userid');
        $action = $this->input->post('action');

        $this->load->model('attendance_model');
        $where = array('user_id_fk' => $user_id, "attendance_status" => 1, 'attendance_date' => date("Y-m-d"));

        $this->load->model('entry_kpi_model');
        $update = array('user_id_fk' => $user_id, "kpi_value" => 'AB', 'entry_kpi_date_added' => date("Y-m-d"));


        if ($action == 'true') {
            $data['attendanceDetail'] = $this->attendance_model->insert_record($where);
            
            //fetch all assigned kpi to that user
            //insert in entry_kpi table with all kpi
            
            $this->load->model('kpi_user_model');
            $getdetail = array('user_id_fk' => $user_id);
            $data['getkpiArr'] = $this->kpi_user_model->get_record($getdetail);
            echo '<pre>';
            print_r($data['getkpiArr']);
            echo '</pre>';
            exit();
            
            $data['absentkpiArr'] = $this->entry_kpi_model->insert_record($update);
        } else {

            $deleteattendenceArr = $this->attendance_model->get_one_record($where);
        }
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */