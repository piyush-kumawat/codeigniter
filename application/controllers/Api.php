<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'third_party/REST_Controller.php';
require APPPATH . 'third_party/Format.php';

use Restserver\Libraries\REST_Controller;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Api extends REST_Controller
{

  public function __construct()
  {
    parent::__construct();

    // Load these helper to create JWT tokens
    $this->load->helper(['jwt', 'authorization']);
  }

  public function hello_get()
  {
    $tokenData = 'Token Verify';

    // Create a token
    $token = AUTHORIZATION::generateToken($tokenData);
    // Set HTTP status code
    $status = parent::HTTP_OK;
    // Prepare the response
    $response = ['status' => $status, 'token' => $token];
    // REST_Controller provide this method to send responses
    $this->response($response, $status);
  }

  /*=========verify token==============*/
  private function verify_request()
  {
    // Get all the headers
    $headers = $this->input->request_headers();
    // Extract the token
    $token = $headers['Authorization'];
    // Use try-catch
    // JWT library throws exception if the token is not valid
    try {
      // Validate the token
      // Successfull validation will return the decoded user data else returns false
      $data = AUTHORIZATION::validateToken($token);
      if ($data === false) {
        $status = parent::HTTP_UNAUTHORIZED;
        $response = ['status' => $status, 'msg' => 'Unauthorized Access!'];
        $this->response($response, $status);
        exit();
      } else {
        return $data;
      }
    } catch (Exception $e) {
      // Token is invalid
      // Send the unathorized access message
      $status = parent::HTTP_UNAUTHORIZED;
      $response = ['status' => $status, 'msg' => 'Unauthorized Access! '];
      $this->response($response, $status);
    }
  }


  /*=======dummy function for testing token set========*/

  public function get_me_data_post()
  {
    // Call the verification method and store the return value in the variable
    $data = $this->verify_request();
    // Send the return data as reponse
    $status = parent::HTTP_OK;
    $this->load->helper('url');
    $this->load->model('news_model');
    $user = $this->news_model->get_record();

    $response = ['status' => $status, 'data' => $user];
    $this->response($response, $status);
  }

  /*======login api=============*/

  public function login_post()
  {
    
    $formdata = json_decode(file_get_contents('php://input'), true);
   
   
    $email = $formdata['email'];
    $password = $formdata['password'];
    // Validate the post data
    $con = array(
      'email' =>   $email,
      'password' =>  $password
      // 'status' => 1
    );
    if (!empty($email) && !empty($password)) {
   
      $this->load->helper('url');
      $this->load->model('news_model');
      $user = $this->news_model->login($con);
    // $data = $this->hello_get();
     
      if ($user) {
        $tokendata =$email;
        $token =  AUTHORIZATION::generateToken($tokendata);
        $this->response([
          'status' => TRUE,
          'message' => 'User login successful.',
          'data' => $user,
          'token' => $token
        ], REST_Controller::HTTP_OK);
      } else {
        // Set the response and exit
        //BAD_REQUEST (400) being the HTTP response code
        $this->response("Wrong email or password.", REST_Controller::HTTP_BAD_REQUEST);
      }
    } else {
      // Set the response and exit
      $this->response("Provide email and password.", REST_Controller::HTTP_BAD_REQUEST);
    }
  }

  /*======= Registration api ===========*/

  // public function registration_post(){
  //   $fname = $this->post('fname');
  //   $email = $this->post('email');
  //   $email = $this->post('email');
  //   $email = $this->post('email');
  //   $email = $this->post('email');
  //   $email = $this->post('email');
  //   $email = $this->post('email');
  // }
}


/* End of file Api.php */
