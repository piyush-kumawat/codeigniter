<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

  class UpdateRecord extends CI_Controller{
    public function index(){
      $this->load->helper('function_helper');
      // $data['regis'] = $this->session->userdata();
      $this->load->model('news_model');
      // $this->load->view('updateform',$data);
    }
    public function updateprocess($id){
      // echo $id;die();   
      $this->load->model('news_model'); 
      $result = $this->news_model->insert_record($id);
      if(! $result){
        $data['error']  = 'Record not updated';
        $this->load->view('updateform',$data);
      }
      else{
        redirect('UserData');
      }
    }
    public function edit($id){
      $this->load->helper('function_helper');
      $this->load->model('news_model');
     $data['regis'] = $this->news_model->getdata($id);
      $this->load->view('updateform',$data);
    }
  }
