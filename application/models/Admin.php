<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Admin extends CI_Controller 
{
	
	function __construct() 
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->no_cache();
		$this->load->library('form_validation');	
		$this -> load -> library('session');	
	}
	protected function no_cache() 
	{
		//This function is used for clearing the cache
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0', false);
		header('Pragma: no-cache');
	}
	public function index()
	{
		
		//This function is used for login a user
		$session=$this->session->all_userdata();

		if(isset($session['email_id']))
		{	
			//the email is set in session
			if($session['email_id']!='')
			{
				
				redirect('admin_home/home');	
				//redirect('admin_home/customer_welcome');
			}
			
		}
		else 
		{
			if($this->form_validation->run('admin_login')==FALSE)
			{
				$this->load->view('admin/login');
			}
			else 
			{
				if(isset($_POST['submit']))
				{
					//now getting the values from view
					$email_id=$this->input->post('email_id');
					$password=$this->input->post('password');					 

					//get the data from admin table
					$result=$this->admin_model->getRecord('admin_login',array('user_name'=>$email_id,'password'=>$password));
					$result_role=$this->admin_model->getRecord('sbc_web_user',array('email'=>$email_id));


					$all_user=$this->admin_model->getRecord('admin_login',array());

					if($result==0)
					{
						//invalid credential
						$this-> session->set_flashdata('message', 'Authentication Failed');
						redirect("admin/index");	
					}
					else 
					{
						//user validation successful
						// print_r($result_role);die();
						$user_role = $result_role[0]['user_role'];
						$user_id = $result_role[0]['id'];
						if($user_role == 'subscriber'){
							$this->session->set_flashdata('message', 'Please Login Through The Android App Only');
							redirect("admin/index");
						}else{	

												
							$data=array('email_id'=>$email_id, 'user_role'=>$user_role, 'user_id'=>$user_id);
							$this->session->set_userdata($data);
							if($user_role == 'customer'){
								redirect('admin_home/customer_home');
							}else{
							redirect('admin_home/home');	
							}

							
						}							
					}
				}
			}
		}	
		
		
	}
	public function forgotPassword()
	{
		$email_id = $this->session->userdata('email_id');
		if($email_id !='')
		{
			redirect('admin_home/home');
		}
		else 
		{
			if($this->form_validation->run('forgot_password')==FALSE)
			{
				$this->load->view('admin/forgot_password');		
			}
			else 
			{
				if(isset($_POST['submit']))
				{
					//now getting the values from view
					$email_id=$this->input->post('email_id');
					//get the data from admin table
					$result=$this->admin_model->getRecord('admin_login',array('user_name'=>$email_id));
					if($result==0)
					{
						//invalid email id
						$this -> session -> set_flashdata('error_message', 'Email does not exist');
						redirect("admin/forgotPassword");	
					}
					else 
					{
						//now send the email to this email id
						$base_url = base_url();
						$subject  ='Forgot Password';
						$message  = '';
						$password =$result[0]['password'];
						$message .= '<!doctype html><html><head><meta charset="utf-8"><title>Sonic Biochem</title></head><body>
									<div style="margin: 0 100px;width: 599px;border-radius: 7px;"><div style="padding:20px; background-color:#4BB033;	height: 50px;	text-align: left;	color: #ffffff;	font-size:xx-large;	padding-left: 20px;">
									Sonic Biochem <span style="font-size:large;">&reg;</span></div><div style="margin: 15px; font-family:Arial" >
									<b style="color: #777;"> Hi user</b><br /><br />Your login detail is : <br /><br />
									<strong style="color: #777;">Email Id : </strong>'.$email_id.'<br />
									<strong style="color: #777;">Password :</strong> '.$password.' <br /><br />
									<strong style="color: #777;"> Kind Regards,</strong><div style="margin: 15px -13px auto;">
									<img src="'.$base_url.'assest/image/sonic_logo.png" /></div></div>
									<div style="font-family:Arial;padding:20px;background-color:#4BB033;height: 50px;text-align: center;color: #ffffff;font-size:medium;line-height:41px;padding-left: 20px;">&copy;2015 Sonic Biochem</div>
									</div></body></html>';
						$email_send=$this->admin_model->sendEmail($email_id,$subject,$message);
						if($email_send==0)
						{
							$this->session->set_flashdata('error_message','Password could not send this time');
							redirect('admin/forgotPassword');
						}
						else 
						{
							$this->session->set_flashdata('success_message','Password send successfully');
							redirect('admin/index');
						}
					}
				}
			}
		}	
		
	}
	public function logout() 
	{


		//This function is used to logout the user and destroy the session
		$this->session->unset_userdata('email_id');
		$this->session->sess_destroy();
		redirect(site_url('admin/index'));
		$this->db->cache_delete_all();

	}
}


?>