<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kpi_entry extends CI_Controller {

    public function index() {
//        if ($this->session->userdata('user_type_id_fk') != 2) {
//            // if session running then redirect to home page.
//            // if session expired then go to login
//            $this->load->view('common/header_view');
//            $this->load->view('common/sidebar_view');
//
//            $this->load->view('login_view');
//            $this->load->view('common/footer_view');
//        } else {
        $user_id = $this->session->userdata('user_id');
        $this->load->model('entry_kpi_model');
        $data['data'] = $this->entry_kpi_model->getentrydetail($user_id);


        $data['get_target'] = $this->entry_kpi_model->get_assign_target($user_id);
        $whereArr = array(
            'user_id_fk' => $user_id,
            'DATE(entry_kpi_date_added)' => date("Y-m-d"),
        );
        $fetchentry = $this->entry_kpi_model->get_record($whereArr, 1);
        $kpi_entry_arr = array();
        if (count($fetchentry) > 0) {
            foreach ($fetchentry as $value) {
                $kpi_entry_arr[$value['kpi_id_fk']]['kpi_value'] = $value['kpi_value'];
                $kpi_entry_arr[$value['kpi_id_fk']]['comment'] = $value['comment'];
            }
        }
//        echo '<pre>';
//        print_r($kpi_entry_arr);
//        echo '</pre>';
//        exit();
        $data['fetchentry'] = $kpi_entry_arr;
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        exit();
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');

        $this->load->view('kpi_entry_view', $data);
        $this->load->view('common/footer_view');
    }

    public function addkpi_entry() {
        $kpiid = $this->input->post('kpiid');
        $entrykpivalue = $this->input->post('entrykpivalue');
        $comment = $this->input->post('comment');
        $userid = $this->input->post('userid');
        $action = $this->input->post('action');

        $postArr = array(
            'user_id_fk' => $userid,
            'kpi_id_fk' => $kpiid,
            'entry_kpi_status' => 1,
            'kpi_value' => $entrykpivalue,
            'comment' => $comment,
            'entry_kpi_date_added' => date("Y-m-d H:i:s"),
            'approved_status' => 0
        );
        $whereArr = array(
            'user_id_fk' => $userid,
            'kpi_id_fk' => $kpiid,
            'DATE(entry_kpi_date_added)' => date("Y-m-d"),
        );
        $this->load->model('entry_kpi_model');
        $data = array();
        $data = $this->entry_kpi_model->get_record($whereArr, 1);

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        exit();
        $assoc = array();
        $insertedid = 0;
        if ($action == 'add' && count($data) == 0) {
            $insertedid = $this->entry_kpi_model->insert_record($postArr);
        } else {
            $opt = $this->entry_kpi_model->update_record($whereArr, $postArr);
        }

        if ($insertedid > 0) {
            $assoc['insert'] = 'yes';
            $assoc['insertedid'] = $insertedid;
        } else {
            $assoc['insertedid'] = 0;
            $assoc['update'] = 'yes';
            $assoc['$opt'] = $opt;
        }
        echo json_encode($assoc);
    }

}