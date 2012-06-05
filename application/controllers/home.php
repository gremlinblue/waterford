<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
	  $this->load->model('RoleType');
	  $roletype = new $this->RoleType();
	  $asd= $roletype->get()->result();
	  print_r(get_object_vars($asd[0]));
	    die('home');
		$this->load->view('welcome_message');
	}
}