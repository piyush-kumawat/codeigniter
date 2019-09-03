<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

  class UserData extends CI_Controller{
    public function index(){
      // print_r($this->session->userdata());
      $id = $this->session->userdata('id');
     
      $this->load->model('news_model');
      $data['regis'] = $this->news_model->getdata($id);
    
      $this->load->view('template/header');
      $this->load->view('userdata',$data);
      $this->load->view('template/footer');
    }

  
  }
