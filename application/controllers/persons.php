<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Persons extends CI_Controller {

	public function index()
	{
	  $this->show();
	}
	
	public function show()
	{
	  $this->load->model('Person');
	  $person = new $this->Person();
	  
	  $data['persons'] = $person->get();
	  $data['columns'] = get_class_vars(get_class($person));
	  
	  $this->load->helper('myurl_helper');
	  $this->load->view('persons_list', $data);
	}
	
	public function create()
	{
	  # receive data and create
	}
	
	public function edit($id)
	{
	  $this->load->model('Person');
	  $person  = new $this->Person();
	  
	  $data['persons'] = $login->get(array($id));
	  $this->load->view('persons_edit', $data);
	}
	
	public function delete($id)
	{
	  $this->load->model('Person');
	  $person  = new $this->Person();
	  $person->delete($id);
	  
	  #reroute to list
	  $this->show();
	}
	
}