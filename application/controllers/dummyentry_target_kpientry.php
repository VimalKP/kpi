<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class dummyentry_target_kpientry extends CI_Controller {

    public function index() {
        $this->dummykpitargetentry();
//        $this->dummytargetentry();
    }

    public function dummytargetentry() {
        $fromDate = '2014-03-01';
//        $toDate = '2014-04-01';
        $toDate = '2014-05-07';
        $alldate = $this->getAllDatesBetweenTwoDates($fromDate, $toDate);
        $this->load->model('registration_model');
        $this->load->model('kpi_user_model');
        $this->load->model('target_model');
        $this->load->model('dummyentry_model');
        $datearr = array();
        $existingarr = $this->dummyentry_model->listofdistincttargetdate();
        for ($i = 0; $i < count($existingarr); $i++) {
            $datearr[] = $existingarr[$i]['date'];
        }
        echo '<pre>';
        print_r($datearr);
        echo '</pre>';
//        exit();
        for ($l = 0; $l < count($alldate); $l++) {
            $date = $alldate[$l];
            if (!in_array($date, $datearr)) {
                $company_id = 1;
                echo $date . '<br/>';
//                $targatedate = date("Y-m-d H:i:s", strtotime($date));

                $arr2 = array('company_id' => $company_id, 'registration_status' => 0);
                $regesarray = $this->registration_model->get_record($arr2);
                $userarray = array();
                for ($k = 0; $k < count($regesarray); $k++) {
                    $userid = $regesarray[$k]['user_id'];
                    $parentid = $regesarray[$k]['parent_id'];
                    if ($parentid != 0) {
                        $userarray[] = $userid;
                    }
                }
                if (count($userarray) > 0) {
                    $userskpiarray = $this->kpi_user_model->getalluserskpi($userarray);
                    for ($i = 0; $i < count($userskpiarray); $i++) {
                        $user_id_fk = $userskpiarray[$i]['user_id_fk'];
                        $kpi_id_fk = $userskpiarray[$i]['kpi_id_fk'];
                        $kpiarr = explode(',', $kpi_id_fk);
                        $limit = count($kpiarr);
                        $oldtargetarray = $this->target_model->ftech_old_target($user_id_fk, $kpiarr, $limit);
                        if (count($oldtargetarray)) {
                            for ($j = 0; $j < count($oldtargetarray); $j++) {
                                $user_id_fk = $oldtargetarray[$j]['user_id_fk'];
                                $kpi_id_fk = $oldtargetarray[$j]['kpi_id_fk'];
                                $value_of_target = $oldtargetarray[$j]['value_of_target'];
                                $postArr = array('kpi_id_fk' => $kpi_id_fk, 'value_of_target' => $value_of_target, 'target_date_added' => $date, 'user_id_fk' => $user_id_fk);
                                $this->target_model->insert_record($postArr);
                            }
                        }
                    }
                }
            }
        }
        exit();
    }

    public function dummykpitargetentry() {
        $fromDate = '2014-03-01';
//        $toDate = '2014-04-01';
        $toDate = '2014-05-07';
        $alldate = $this->getAllDatesBetweenTwoDates($fromDate, $toDate);
        $this->load->model('registration_model');
        $this->load->model('kpi_user_model');
        $this->load->model('target_model');
        $this->load->model('dummyentry_model');
        $this->load->model('entry_kpi_model');
        $datearr = array();
        $existingarr = $this->dummyentry_model->listofdistinctkpitdate();
        for ($i = 0; $i < count($existingarr); $i++) {
            $datearr[] = $existingarr[$i]['date'];
        }
        for ($l = 0; $l < count($alldate); $l++) {
            $date = $alldate[$l];
            if (!in_array($date, $datearr)) {
                $company_id = 1;
                echo $date . '<br/>';
//                $targatedate = date("Y-m-d H:i:s", strtotime($date));

                $arr2 = array('company_id' => $company_id, 'registration_status' => 0);
                $regesarray = $this->registration_model->get_record($arr2);
                $userarray = array();
                $parentarray = array();
                for ($k = 0; $k < count($regesarray); $k++) {
                    $userid = $regesarray[$k]['user_id'];
                    $parentid = $regesarray[$k]['parent_id'];
                    if ($parentid != 0) {
                        $userarray[] = $userid;
                        $parentarray[$userid] = $parentid;
                    }
                }
//                echo '<pre>';
//                print_r($parentarray);
//                echo '</pre>';
//                exit();
                if (count($userarray) > 0) {
                    $userskpiarray = $this->kpi_user_model->getalluserskpi($userarray);
                    for ($i = 0; $i < count($userskpiarray); $i++) {
                        $user_id_fk = $userskpiarray[$i]['user_id_fk'];
                        $kpi_id_fk = $userskpiarray[$i]['kpi_id_fk'];
                        $kpiarr = explode(',', $kpi_id_fk);
                        $limit = count($kpiarr);
                        if ($limit > 0) {

                            for ($j = 0; $j < count($kpiarr); $j++) {
                                $kpiid = $kpiarr[$j];
                                $targetdata = $this->dummyentry_model->targetvalue($kpiid, $user_id_fk, $date);
//                               echo '<pre>';
//                               print_r($targetdata);
//                               echo '</pre>';
//                               exit();
                                $entrykpivalue = $targetdata[0]['value_of_target'];
                                $postArr = array(
                                    'user_id_fk' => $user_id_fk,
                                    'kpi_id_fk' => $kpiid,
                                    'entry_kpi_status' => 1,
                                    'kpi_value' => $entrykpivalue,
                                    'comment' => '',
                                    'entry_kpi_date_added' => $date,
                                    'approved_parent_id' => $parentarray[$user_id_fk],
                                    'approved_date' => $date,
                                    'approved_value' => $entrykpivalue,
                                    'approved_status' => 1
                                );
//                                $data = array();
                                if (trim($entrykpivalue) != '') {
                                    $insertedid = $this->entry_kpi_model->insert_record($postArr);
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function getAllDatesBetweenTwoDates($strDateFrom, $strDateTo) {
        $aryRange = array();

        $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2), substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
        $iDateTo = mktime(1, 0, 0, substr($strDateTo, 5, 2), substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));

        if ($iDateTo >= $iDateFrom) {
            array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry
            while ($iDateFrom < $iDateTo) {
                $iDateFrom+=86400; // add 24 hours
                array_push($aryRange, date('Y-m-d', $iDateFrom));
            }
        }
        return $aryRange;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */