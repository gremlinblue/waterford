<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller {

	public function index()
	{
	  $this->show();
	}
	
	public function show()
	{
	  $this->load->model('Login');
	  $login = new $this->Login();
	  
	  $data['logins'] = $login->get();
	  $this->load->view('logins_list', $data);
	}
	
	public function create()
	{
	  # receive data and create
	}
	
	public function edit($id)
	{
	  $this->load->model('Login');
	  $login  = new $this->Login();
	  
	  $data['logins'] = $login->get(array($id));
	  $this->load->view('logins_edit', $data);
	}
	
	public function delete($id)
	{
	  $this->load->model('Login');
	  $login  = new $this->Login();
	  $login->delete($id);
	  
	  #reroute to list
	  $this->show();
	}
	
}