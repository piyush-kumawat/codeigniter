<?php
class News_model extends CI_Model
{
  public function __construct()
  {
    $this->load->database();
  }

  //------get data from database
  public function get_record()
  {
    $query = $this->db->get('regis');
    return $query->result_array();
  }

  //-----get data by id--------------
  public function getdata($id)
  {  
    $this->db->where('id', $id);
    $query = $this->db->get('regis');
    return $query->result_array();
  }

  //======insert record==========

  public function insert_record($id = 0)
  {
    // $this->load->helper('url');
    $subject = $this->input->post('subject');
    $string_version = implode(',', $subject);
    $skils = $this->input->post('skils');
    $string_skils = implode(',', $skils);
    $data = array(
      'fname' => $this->input->post('fname'),
      'lname' => $this->input->post('lname'),
      'gender' => $this->input->post('gender'),
      'contact' => $this->input->post('contact'),
      'country' => $this->input->post('country'),
      'state' => $this->input->post('state'),
      'city' => $this->input->post('city'),
      'email' => $this->input->post('email'),
      'password' => $this->input->post('password'),
      'address' => $this->input->post('address'),
      'subject' => $string_version,
      'skils' => $string_skils,
    );
     
    if ($id == 0) {
      return $this->db->insert('regis', $data);
    }else{
      $this->db->where('id', $id);
      return $this->db->update('regis', $data);
    }
   
   

  }

  public function login()
  {

    $user = $this->input->post('user');
    $pass = $this->input->post('pass');
   
    $this->db->where('email', $user);
    $this->db->where('password', $pass);
   
    $query = $this->db->get('regis');
    if ($query->num_rows() > 0) {
      $row = $query->row();
      if ($row->user_type == 'admin') {
        $query->result_array();
        return 2;
      }
      if ($row->user_type == 'student') {
        $row = $query->row();
        $data = array(
          'id' => $row->id,
          'fname' => $row->fname,
          'lname' => $row->lname,
          // 'gender' => $row->gender,
          // 'contact' => $row->contact,
          // 'country' => $row->country,
          // 'state' => $row->state,
          // 'city' => $row->city,
          'email' => $row->email,
          // 'address' => $row->address,
          // 'subject' => $row->subject,
          // 'skils' => $row->skils,
        );
        $this->session->set_userdata($data);
        return 1;
      }
    } else {
      return false;
    }
  }
  public function update()
  {
    $subject = $this->input->post('subject');
    $string_version = implode(',', $subject);
    $skils = $this->input->post('skils');
    $string_skils = implode(',', $skils);
    $data = array(
      'id' =>  $this->input->post('id'),
      'fname' => $this->input->post('fname'),
      'lname' => $this->input->post('lname'),
      'gender' => $this->input->post('gender'),
      'contact' => $this->input->post('contact'),
      'country' => $this->input->post('country'),
      'state' => $this->input->post('state'),
      'city' => $this->input->post('city'),
      'email' => $this->input->post('email'),
      'address' => $this->input->post('address'),
      'subject' => $string_version,
      'skils' => $string_skils,
    );
    $this->db->where('id', $data['id']);
    $this->session->set_userdata($data);
    return $this->db->update('regis', $data);
  }

  public function setSessionData($id)
  {
    echo '$id';
    die();
    // $this->session->unset_userdata($data);
    return true;
  }

  // public function saveEmployee($id = 0)
  //   {
 
       
        
  //       if ($id == 0) {
  //           return $this->db->insert('employee', $data);
  //       } else {
  //           $this->db->where('id', $id);
  //           return $this->db->update('employee', $data);
  //       }
  //   }
}
