<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

  class InsertForm extends CI_Controller{
    public function index(){
      $this->load->helper('url');
      $this->load->model('news_model');
      $this->news_model->insert_record();
      redirect('Pages');
     
    }
  }
?>