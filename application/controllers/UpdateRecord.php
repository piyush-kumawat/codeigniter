<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UpdateRecord extends CI_Controller
{
  public function index()
  {
    $this->load->helper('function_helper');
    $this->load->model('news_model');
  }
  public function updateprocess($id)
  {
    $this->load->model('news_model');
    $result = $this->news_model->insert_record($id);
    if (!$result) {
      $data['error']  = 'Record not updated';
      $this->load->view('updateform', $data);
    } else {
      if($id=0){
        redirect('UserData');
      }else{
        redirect('Pages');    
      }
      
    }
  }

  // edit form load data
  public function edit($id)
  {
    $this->load->helper('function_helper');
    $this->load->model('news_model');
    $data['regis'] = $this->news_model->getdata($id);
    $this->load->view('updateform', $data);
  }

  // delete record from database
  public function delete($id)
  {
    $this->load->model('news_model');
    $this->news_model->delete_record($id);
    redirect('Pages');
  }
}
