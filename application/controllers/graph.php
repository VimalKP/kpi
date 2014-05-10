<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Graph extends CI_Controller {

    public function index() {

        $userid = $this->session->userdata('user_id');
        $companyid = $this->session->userdata('company_id');
        $parent_id = $this->session->userdata('parent_id');

        $this->load->model('kpi_master_model');
        $data['kpiArr'] = $this->kpi_master_model->getAllKpi();

        $this->load->model('registration_model');
        $data['registerArr'] = $this->registration_model->getAllregister();

        $this->load->model('registration_model');
        $data['usergetArr'] = $this->registration_model->get_child_and_user($companyid, $userid, $parent_id);

        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('graph_view', $data);
        $this->load->view('common/footer_view');
    }

    function getkpivalue() {
        $assos = array();
        $userid = $this->input->post('userid');
//        $userid=2;
//        $kpiid=4;
        $kpiid = $this->input->post('kpiid');
        $fromdate = $this->input->post('fromdate');
        $todate = $this->input->post('todate');

        $postArr = array("user_id_fk" => $userid, "kpi_id_fk" => $kpiid, "approved_status" => 1, "date(entry_kpi_date_added) >=" => date("Y-m-d", strtotime($fromdate)), "date(entry_kpi_date_added) <=" => date("Y-m-d", strtotime($todate)));
        $this->load->model('entry_kpi_model');
        $graphArr = $this->entry_kpi_model->get_record($postArr);

        $targetData = array("user_id_fk" => $userid, "kpi_id_fk" => $kpiid, "date(target_date_added) >=" => date("Y-m-d", strtotime($fromdate)), "date(target_date_added) <=" => date("Y-m-d", strtotime($todate)));

        $this->load->model('target_model');
        $targetArr = $this->target_model->get_record($targetData);
        $targetval = array();
//        $cnt = 0;
//        $sum_target = 0;
        if (count($targetArr) > 0) {
            foreach ($targetArr as $val) {
                if ($val['value_of_target'] == 'true') {
                    $target_value = 1;
                } else if ($val['value_of_target'] == 'false') {
                    $target_value = 0;
                } else {
                    $target_value = intval($val['value_of_target']);
//                    $sum_target+=intval($val['value_of_target']);
//                    $cnt++;
                }
                array_push($targetval, $target_value);
            }
        }
//        $avg_target = $sum_target / $cnt;
        $allvalue = array();
        $dateArr = array();
        $approvedvalue = array();

        if (count($graphArr) > 0) {
            foreach ($graphArr as $value) {
                if ($value['approved_value'] == 'true') {
                    $approved_value = 1;
                } else if ($value['approved_value'] == 'false') {
                    $approved_value = 0;
                } else {
                    $approved_value = intval($value['approved_value']);
                }

                $kpi_value = intval($value['kpi_value']);
                $date = date("d-m-Y", strtotime($value['entry_kpi_date_added']));
                array_push($allvalue, $kpi_value);
                array_push($dateArr, $date);
                array_push($approvedvalue, $approved_value);
            }
        }
//        $graph_data['popul']['data'] = $value_of_target;
//        $graph_data['popul']['name'] = 'KPI Value';
//        $graph_data['axis']['categories'] = $dateArr;
        ////////////////////////////////// GRAPH 
//        $this->load->library('highcharts');
//        $this->highcharts->set_type('column'); // drauwing type
//        $this->highcharts->set_title('INTERNET WORLD USERS BY LANGUAGE', 'Top 5 Languages in 2014');
//        $this->highcharts->set_axis_titles('Dates', 'KPI Value'); // axis titles: x axis,  y axis
//
//        $this->highcharts->set_xAxis($graph_data['axis']);
////        $this->highcharts->set_serie($graph_data['users']);
//        $this->highcharts->set_serie($graph_data['popul']);
//        $this->highcharts->render_to('container');
//        $data['charts'] = $this->highcharts->render();
        ////////////////////////////////// GRAPH 
//        $assos['avg_target'] = $avg_target;
        $assos['valuearr'] = $allvalue;
        $assos['datearr'] = $dateArr;
        $assos['approvedarr'] = $approvedvalue;
        $assos['targetarr'] = $targetval;
        echo json_encode($assos);
//        $this->load->view('chart_container_view', $data['charts']);
    }

    public function fetchKpiOfUSer() {
        $userid = $this->input->post('userid');

        $this->load->model("kpi_user_model");
        $this->load->model("kpi_master_model");
        $html = "";

        $result = $this->kpi_user_model->get_record(array('user_id_fk' => $userid));
        if (count($result) > 0) {
            $kpi_id_fk = $result[0]['kpi_id_fk'];
            $kpiArr = explode(",", $kpi_id_fk);

            $kpiDetail = $this->kpi_master_model->get_kpis_record($kpiArr);

            if (count($kpiDetail) > 0) {
                foreach ($kpiDetail as $value) {
                    $html.="<option value='" . $value['kpi_id'] . "'>" . $value['kpi_name'] . "</option>";
                }
            }
        }
        echo $html;
    }

    function graph_home() {

        if ($_POST['action'] == 'fetchdata') {

            $userid = $this->input->post('userid');
            $todate = date('Y-m-d');
            $fromdate = date('Y-m-d', strtotime($todate . ' - 7 day'));
            $postArr = array("user_id_fk" => $userid, "approved_status" => 1, "date(entry_kpi_date_added) >=" => date("Y-m-d", strtotime($fromdate)), "date(entry_kpi_date_added) <=" => date("Y-m-d", strtotime($todate)));
            $this->load->model('entry_kpi_model');
            $graphArr = $this->entry_kpi_model->get_record($postArr);
            $dateArr = array();
            $approvedvalue = array();
            if (count($graphArr) > 0) {
                foreach ($graphArr as $value) {
                    $approved_value = intval($value['approved_value']);
                    $date = date("d-m-Y", strtotime($value['entry_kpi_date_added']));
                    array_push($dateArr, $date);
                    array_push($approvedvalue, $approved_value);
                }
            }
            $assos['datearr'] = $dateArr;
            $assos['approvedarr'] = $approvedvalue;
            echo json_encode($assos);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */