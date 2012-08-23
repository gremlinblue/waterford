<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

   public function __construct()
   {
      session_start();
      parent::__construct();
	  $this->load->library ( 'MasterPage' );
   }
  
	public function index()
	{
	  if ( isset($this->session->userdata['username']) )
         redirect('home');
      
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email Address', 'valid_email|required');
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
	
      if ( $this->form_validation->run() !== false ) {
	  
         // then validation passed. Get from db
         $this->load->model('person');
         $result = $this->person->verify_user(
					$this->input->post('email'), 
                     $this->input->post('password'));

         if ( $result !== false ) {
  		    $this->session->set_userdata('username', $this->input->post('email'));
			redirect('home/admin');
		 }
		 else
		   $this->load_view(array('error' => 'Invalid Username & Password'));
      }
	  $this->load_view();
	}
	
    public function logout()
    {
      $this->session->unset_userdata('username');
	  redirect('home');
    }
	
	public function signup($additional_data = array())
	{
	  $this->masterpage->setMasterPage ( 'masterpage_default' );
      $this->masterpage->addContentPage ( 'register', 'content', $additional_data );
	  $this->masterpage->show(array('active_link' => get_class($this)));
	}
	
	public function register()
	{
	  $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email Address', 'valid_email|required');
	  $this->form_validation->set_rules('firstname', 'Firstname', 'required');
	  
      $parameters = $this->input->post();
	  $additional_data = array();
	  
	  if($this->form_validation->run() !== FALSE)
	    if($this->save_person($parameters))
	      $additional_data['error'] = 'Successfully registered!';
	  
	  $this->signup($additional_data);	  
	}
	
	public function load_view($data = array())
	{
	  $this->masterpage->setMasterPage ( 'masterpage_default' );
      $this->masterpage->addContentPage ( 'login', 'maincontent', $data);
	  $this->masterpage->show();
	}
	
	private function save_person($parameters)
	{
	  $this->load->model('Person');
	  $person = new $this->Person();
	  
	  $this->load->library('roles');
	  
	  $parameters['password'] = MD5('123456');
	  $parameters['is_active'] = 0;
	  $parameters['role'] = Roles::Member;

	  $person->set_properties($parameters);
	  $person->save();
	  return ($person->id ? true : false );
	}
	
}