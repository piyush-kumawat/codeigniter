<?php 
  class LoginSuccess extends CI_Controller{
    public function __construct()
    {
      parent::__construct();
      $this->load->model('news_model');
      $this->load->model('url_helper');

    }
    public function index(){
      $data['regis'] = $this->news_model>get_record();
      }
      
  }
?>