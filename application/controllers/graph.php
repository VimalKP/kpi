<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Graph extends CI_Controller {

    public function index() {

        $this->load->model('kpi_master_model');
        $data['kpiArr'] = $this->kpi_master_model->getAllKpi();

        $this->load->model('registration_model');
        $data['registerArr'] = $this->registration_model->getAllregister();

        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('graph_view', $data);
        $this->load->view('common/footer_view');
    }

    function getkpivalue() {
        $userid = $this->input->post('userid');
//        $userid=2;
//        $kpiid=4;
        $kpiid = $this->input->post('kpiid');

        $postArr = array("user_id_fk" => $userid, "kpi_id_fk" => $kpiid, "approved_status" => 1);
        $this->load->model('entry_kpi_model');
        $amt = $this->entry_kpi_model->get_record($postArr);
        $alldata = array();
        $allvalue = array();
        $dateArr = array();
        if (count($amt) > 0) {
            foreach ($amt as $value) {
//                $alldata[$value['entry_kpi_date_added']]=$value['kpi_value'];
//                $alldata[]=$value['kpi_value'];
                $value_of_target = intval($value['kpi_value']);
                $date = intval($value['entry_kpi_date_added']);
                array_push($allvalue, $value_of_target);
                array_push($dateArr, $date);
            }
        }




        $assos['valuearr'] = $allvalue;
        $assos['datearr'] = $dateArr;
        echo json_encode($assos);
//        echo json_encode($dateAr);
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */