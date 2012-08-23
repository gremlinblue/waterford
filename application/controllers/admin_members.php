<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Members extends MY_Controller {

	public function __construct()
    {
      parent::__construct();
      $this->load->library ( 'MasterPage' );
	  $this->masterpage->setMasterPage ( 'masterpage_admin' );
	}
	
	public function index()
	{
	  $this->show_list();
	}
	
	public function show_list()
	{
	  $data = array();
	  
	  $this->load->model('Person');
	  $person = new $this->Person();
	  
	  #roles
	  $data['roles']  = $this->load_roles();
	  
	  #persons
	  $persons = $person->get();
	  $data['persons'] = $persons;
	  
	  #cols
	  $columns = get_class_vars(get_class($person));
	  unset($columns['password']);
	  $data['columns'] = $columns;
	  
	  $this->load->helper('form');
	  $this->masterpage->addContentPage ( 'admin_members_list', 'content', $data);
	  $this->masterpage->show(array('active_link' => 'Members'));

	}
	
	public function save()
	{
	  $parameters = $this->input->post();
	  $this->save_person($parameters);
	  redirect('/admin_members');
	}
	
	public function create()
	{
	  $this->edit(0);
	}
	
	public function edit($id)
	{	
	  $data = array();
	  
	  if($id)
	    $data['person'] = $this->load_person($id);
	  $data['roles']  = $this->load_roles();
	  
	  $this->masterpage->addContentPage ( 'admin_members_edit', 'content', $data);
	  $this->masterpage->show(array('active_link' => 'Members'));
	}
	
	public function delete($id)
	{
	  $this->load->model('Person');
	  $person  = new $this->Person();
	  $person->delete($id);
	  
	  redirect('/admin_members');
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
	  
	  if($id = $parameters['id'])
	    $person->load($id);
	  else
	    $parameters['password'] = MD5('123456');

	  # set is_active parameter : can't do this directly, this is ugly code
	  $parameters['is_active'] = (isset($parameters['is_active'])? 1 : 0);

	  $person->set_properties($parameters);
	  $person->save();
	  return $person;
	}
	
}