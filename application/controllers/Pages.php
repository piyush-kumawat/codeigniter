<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

  class Pages extends CI_Controller{
    public function index(){
      $this->load->helper('url');
      $this->load->model('news_model');
      // $this->load->view('addform.php');
      $data['regis'] = $this->news_model->get_record();
      $this->load->view('template/header');
      $this->load->view('welcome_message',$data);
      $this->load->view('template/footer');
    }
  }
?>