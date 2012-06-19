<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	public function index()
	{
      # default signup
	  $this->signup();
	}
	
	public function signup()
	{
	  $this->edit(0);
	}
	
	public function save()
	{
	  $parameters = $this->input->post();
	  
	  $person = $this->save_person($parameters);
      $this->redirect_to_home();
	}
	
	public function edit($id)
	{
	  $data = array();
	  
	  if($id)
	    $data['person'] = $this->load_person($id);
		  
	  
	  $this->load->helper('form');
	  $this->load->view('account_edit', $data);
	}
	
	private function load_person($person_id){
	  $this->load->model('Person');
	  
	  $person = new $this->Person();
	  $person->load($person_id);
	  
	  return $person;
	}
	
	private function load_roles(){
	
	  $this->load->library('roles');
	  $reflection = new ReflectionClass('Roles');
	  return array_flip($reflection->getConstants());
	  
	}
	
	private function save_person($parameters){
	
	  $this->load->model('Person');
	  $person = new $this->Person();
	  
	  $this->load->library('roles');
	  
	  if($id = $parameters['person_id'])
	    $person->load($id);

	  # set default values for members
	  $parameters['is_active'] = true;
	  $parameters['role']      = Roles::Member;
	  
	  $person->set_properties($parameters);
	  $person->save();
	  return $person;
	}

}
