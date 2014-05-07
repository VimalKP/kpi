<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Message extends CI_Controller {

    public function index() {

        $this->load->model('message_model');
        $data['msgarr']=$this->message_model->get_msg();




        $this->load->view('common/header_view');
        $this->load->view('common/sidebar_view');
        $this->load->view('message_view',$data);
        $this->load->view('common/footer_view');
    }

    public function message_sent(){
        $user_id = $this->session->userdata('user_id');
//        $company_id = $this->session->userdata('company_id');
       
        $message_message_text = $this->input->post('message_text');
        
        $msgArr=array(
//            'user_id_fk' => $user_id,
//            'company_id_fk' => $company_id,
            'message_text' => $message_message_text,
            'message_date_added' => date("Y-m-d H:i:s")
        );
//        echo"<pre>";
//        print_r($msgArr);
//        echo"</pre>";
//        exit();

//        $this->load->helper(array('form'));
//        $this->load->library('form_validation');
//
//        $this->form_validation->set_rules('message_text', 'Message', 'required');
//        if ($this->form_validation->run() == FALSE) {
//            $data['error'] = "";
//
//            $this->load->view('common/header_view');
//            $this->load->view('common/sidebar_view');
//            $this->load->view('message_view',$data);
//            $this->load->view('common/footer_view');
//        } else {
            $this->load->model('message_model');
//            $msg = $this->message_model->update_record($user_id,$msgArr);
            $msg = $this->message_model->updatemsg($user_id,$msgArr);

            $this->load->view('common/header_view');
            $this->load->view('common/sidebar_view');
            $this->load->view('home_view');
            $this->load->view('common/footer_view');
        }
//    }


   }

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>