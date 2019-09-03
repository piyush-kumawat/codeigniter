<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

  class Login extends CI_Controller{
    public function index(){
      $this->load->helper('url');
      $this->load->view('loginform');
    }

    public function process(){
      $this->load->model('news_model');
      $result = $this->news_model->login();
      if(! $result){
        $data['error']  = 'Invalid username and/or password';
        $this->load->view('loginform',$data);
      }
      else{
        if($result == 1){
          redirect('UserData');
        }
        if($result == 2){
          redirect('Pages');
        }
       
      }
    }

    public function logout(){
      $this->session->unset_userdata('regis');
      $this->load->view('loginform');
    }
  }
?>