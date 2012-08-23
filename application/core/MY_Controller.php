<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
	  
	  if ( !isset($this->session->userdata['username']) )
         $this->redirect_to_home();
   }
   
   public function logout()
   {
      $this->session->unset_userdata('username');
      $this->redirect_to_home();
   }
   
   protected function redirect_to_home()
   {
     redirect('login');
   }
	
}