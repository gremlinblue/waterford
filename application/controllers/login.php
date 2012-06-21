<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

   public function __construct()
   {
      session_start();
      parent::__construct();
	  $this->load->library ( 'masterpage' );
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
         $result = $this
                  ->person
                  ->verify_user(
                     $this->input->post('email'), 
                     $this->input->post('password')
                  );

         if ( $result !== false ) {
  		    $this->session->set_userdata('username', $this->input->post('email'));
			redirect('home');
         }

      }
	  #$this->load_view();
	  $this->load->view('login');
	}
	
    public function logout()
    {
      $this->session->unset_userdata('username');
	  redirect('home');
    }
	
	private function load_view()
	{
      $this->masterpage->setMasterPage ( 'masterpage_default' );
      $this->masterpage->addContentPage ( 'login', 'navcontent' );
	  $this->masterpage->show ( );
	}
	
}