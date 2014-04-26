<?php

class Holiday extends CI_Controller {

    public function index() {
//        $company_id = $this->session->userdata('company_id');
//        $this->load->model('holiday_model');
//        $arr = array('company_id_fk' => $company_id);
//        $holidayarr = $this->holiday_model->get_record($arr);
//        if (count($holidayarr) > 0) {
//            $success = '';
//        }
        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('holiday_view');
        $this->load->view('common/footer_view');
    }

    public function holidayhandle() {
        $action = $this->input->post('action');
        $date = $this->input->post('date');
        $company_id = $this->session->userdata('company_id');
        $this->load->model('holiday_model');
        if ($action == 'add') {
            $data = array(
                'company_id_fk' => $company_id,
                'holidaydate' => $date
            );
            $this->holiday_model->insert_record($data);
        } else {
            $data = array(
                'company_id_fk' => $company_id,
                'holidaydate' => $date
            );
            $this->holiday_model->delete_record($data);
        }
    }

    public function prepareHolidayEvent() {
//        $query = array();
//        $query['key'] = 'holidays';
//        $holidayData = $this->mdl_holidays->getHolidays($this->sessionId, $query);
//        $holidayData = $holidayData->data;
        $company_id = $this->session->userdata('company_id');
        $this->load->model('holiday_model');
        $arr = array('company_id_fk' => $company_id);
        $holidayarr = $this->holiday_model->get_record($arr);
        $events = array();
//        echo '<pre>';
//        print_r($holidayarr);
//        echo '</pre>';
//        exit();
        foreach ($holidayarr as $date) {
//            echo ($date['holidaydate']);
//            exit();
            $event = array(
                'id' => $date['holidaydate'],
                'title' => 'H',
                'start' => $date['holidaydate']
            );
            array_push($events, $event);
//			$events.=$event ;
        }
//        echo '<pre>';
//        print_r($events);
//        echo '</pre>';
//        exit();
        echo json_encode($events);
    }

//    function checkdate() {
//        $today = date('Y-m-d ');
//        $tommorow = date('Y-m-d', strtotime($today . ' + 1 day'));
//        echo '<pre>';
//        print_r($tommorow);
//        echo '</pre>';
//        exit();
//        $this->load->model('holiday_model');
//        $date = $this->holiday_model->checkdate($tommorow);
//        if (count($date) > 0) {
//            $success = 'yes';
//            $msg = "Tomorrow is Holiday ";
////        }
////        if (count($date) > 0 && $success == 'yes') {
//            
//            $this->load->view('common/header_view', $data);
//            $this->load->view('common/sidebar_view');
//            $this->load->view('home_view');
//            $this->load->view('common/footer_view');
//        }
//    }
    public function batchholiday() {

        $batch = $this->input->post('batch');
        $company_id = $this->session->userdata('company_id');
        $this->load->model('holiday_model');
        $allholiday = array();
//         $arr = array('company_id_fk' => $company_id);
        $holidayarr = $this->holiday_model->getholidayarray($company_id);
        for ($i = 0; $i < count($holidayarr); $i++) {
            array_push($allholiday, $holidayarr[$i]['holidaydate']);
        }
//        echo '<pre>';
//        print_r($allholiday);
//        echo '</pre>';
//        exit();
        $startDate = '2014-01-01';
        $endDate = '2014-12-31';
        if ($batch != '0') {
            if ($batch == 'all_sunday') {
                $data = $this->getDateForSpecificDayBetweenDates($startDate, $endDate, 0);
            }
            if ($batch == 'all_saturday') {
                $data = $this->getDateForSpecificDayBetweenDates($startDate, $endDate, 6);
            }
            if ($batch == 'odd_saturday') {
                $data = $this->getDateForSpecificDayBetweenDates($startDate, $endDate, 6);
                $oddarr = array();
                for ($i = 0; $i < count($data); $i++) {
                    $date = $data[$i];
                    $actdate = date('j', strtotime($date));
                    if ($actdate % 2 != 0) {
                        array_push($oddarr, $date);
                    }
                }
                $data = $oddarr;
            }
            if ($batch == 'even_saturday') {
                $data = $this->getDateForSpecificDayBetweenDates($startDate, $endDate, 6);
                $oddarr = array();
                for ($i = 0; $i < count($data); $i++) {
                    $date = $data[$i];
                    $actdate = date('j', strtotime($date));
                    if ($actdate % 2 == 0) {
                        array_push($oddarr, $date);
                    }
                }
                $data = $oddarr;
            }
        }
        for ($i = 0; $i < count($data); $i++) {
            $date = $data[$i];
            if (!in_array($date, $allholiday)) {
                $holidaydata = array(
                    'company_id_fk' => $company_id,
                    'holidaydate' => $date
                );
                $this->holiday_model->insert_record($holidaydata);
            }
        }
//        $this->index();
        redirect('holiday');
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        exit();
    }

    public function getDateForSpecificDayBetweenDates($startDate, $endDate, $weekdayNumber) {
        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);

        $dateArr = array();

        do {
            if (date("w", $startDate) != $weekdayNumber) {
                $startDate += ( 24 * 3600); // add 1 day
            }
        } while (date("w", $startDate) != $weekdayNumber);


        while ($startDate <= $endDate) {
            $dateArr[] = date('Y-m-d', $startDate);
            $startDate += ( 7 * 24 * 3600); // add 7 days
        }

        return($dateArr);
    }

}

?>
