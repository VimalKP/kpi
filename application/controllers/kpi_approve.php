<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kpi_approve extends CI_Controller {

    public function index() {

        $userid = $this->session->userdata('user_id');

        $this->load->model('registration_model');
        $this->load->model('entry_kpi_model');
        $this->load->model('target_model');
        $data['usergetArr'] = $this->registration_model->get_child_user_array($userid);

        $var = count($data['usergetArr']);
        $userarr = array();
        $childusersArr = array();
        if ($var > 0) {
            for ($i = 0; $i < $var; $i++) {
                array_push($userarr, $data['usergetArr'][$i]['user_id']);
                $childusersArr[$data['usergetArr'][$i]['user_id']] = $data['usergetArr'][$i]['firstname'] . " " . $data['usergetArr'][$i]['lastname'];
            }

            $data['kpiDetail'] = $this->entry_kpi_model->get_child_entry($userarr);
        }
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        exit();
        $data['childusersArr'] = $childusersArr;
        unset($data['usergetArr']);

        $childkpiArr = array();
        if (count($data['kpiDetail']) > 0) {
            foreach ($data['kpiDetail'] as $kpi_key => $kpi_value) {
                $userid = $kpi_value['user_id'];
                $kpiid = $kpi_value['kpi_id_fk'];
                $childkpiArr[$userid][$kpiid]['kpiName'] = $kpi_value['kpi_name'];
                $childkpiArr[$userid][$kpiid]['kpiValue'] = $kpi_value['kpi_value'];
                $childkpiArr[$userid][$kpiid]['kpiComment'] = $kpi_value['comment'];
                $childkpiArr[$userid][$kpiid]['kpiapproved_value'] = $kpi_value['approved_value'];
                $childkpiArr[$userid][$kpiid]['value_of_target'] = $kpi_value['value_of_target'];
                $childkpiArr[$userid][$kpiid]['approved_status'] = $kpi_value['approved_status'];
            }
        }
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        exit();
        $data['childkpisArr'] = $childkpiArr;
        unset($data['kpiDetail']);

        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('kpi_approve_view', $data);
        $this->load->view('common/footer_view');
    }

    function approvekpivalue() {
        $userid = $this->input->post('userid');
        $kpiid = $this->input->post('kpiid');
        $comment = $this->input->post('comment');
        $approved_value = $this->input->post('finalmain');

        $parent_id = $this->session->userdata('user_id');
        $updateArr = array();
        $updateArr['approved_parent_id'] = $parent_id;
        $updateArr['approved_status'] = 1;
        $updateArr['approved_comment'] = $comment;
        $updateArr['approved_date'] = date("Y-m-d H:i:s");
        $updateArr['approved_value'] = $approved_value;

        $where = array();
        $where['user_id_fk'] = $userid;
        $where['kpi_id_fk'] = $kpiid;
        $where['date(entry_kpi_date_added)'] = date("Y-m-d");

        $this->load->model('entry_kpi_model');
        echo $this->entry_kpi_model->update_record($where, $updateArr);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */