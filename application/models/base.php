<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base extends CI_Model {

    protected $_tablename = null;
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function load($id)  //# test this
	{
      $this->db->where('id', $id);
	  $query = $this->db->get($this->_tablename);
      if(!$query->num_rows)
	    throw new BaseModelRuntimeException("Object not found");
	  
	  $class_vars = get_object_vars($query->row());

	  // if property exists that matches row name, then set value
      foreach ($class_vars as $name => $value)
        $this->set_property($name, $value);
	}
	
	function load_by($where_parameters = array(), $select_parameters = array())
	{
	  foreach($select_parameters as $k => $v)
	    $this->db->select($k, $v);
	  
	  foreach($where_parameters as $k => $v)
	    $this->db->where($k, $v);
		
	  $query = $this->db->get($this->_tablename);
	  if(!$query->num_rows)
	    return null;
		
	  $class_vars = $query->row();
	  foreach ($class_vars as $name => $value)
        $this->set_property($name, $value);
		  
      return $this;
	}

	# select
	function get($where_parameters = array(), $select_parameters = array())
	{
	  if(!empty($select_parameters))
	    $this->db->select(implode(',', $select_parameters));
	  
	  if(!empty($where_parameters))
	    foreach($where_parameters as $k => $v)
	      $this->db->where($k, $v);
		
	  $raw_result = $this->db->get($this->_tablename);
	  return $this->create_objects($raw_result);
	}
	
	protected function create_objects($raw_result){
	
	  $result     = array();
	  if(!empty($raw_result))
	    foreach($raw_result->result() as $row)
	      array_push($result, $this->create_object($row));
	  
	  return $result;
	}
	
	private function create_object($data_row){
	
	  $self_class = get_class($this);
	  $obj = new $self_class;
	  $obj->set_properties($data_row);
	  return $obj;
	  
	}
	
	# insert
    function insert()
	{
	  $this->db->insert($this->_tablename, $this);
	  return $this->db->insert_id();
	  
	}
	
	# update
	function update()
	{
	
	  $this->db->where('id', $this->id);
	  $this->db->update($this->_tablename, $this);
	  return $this->db->affected_rows();
	  
	}
	
	# save  :decide to save or update
	function save(){
	
	  if($this->id)
	    $this->update($this->id, $this);
	  else{
	    $this->insert();
		$this->load($this->db->insert_id());
      }
	
	}
	
	# delete
	function delete($id)
	{
	
	  $this->db->where('id', $id);
	  $this->db->delete($this->_tablename);
	  return $this->db->affected_rows();
	  
	}
	
	private function set_property($name, $value, $obj = null)
	{
	  $obj = empty($obj) ? $this : $obj;
	  
      if (isset($obj->$name) || property_exists($obj, $name))
        $obj->$name = $value;	  
    }
	
	public function set_properties($properties, $obj = null)
	{
	  $obj = empty($obj) ? $this : $obj;
	  
	  foreach($properties as $name => $value)
        $this->set_property($name, $value, $obj);
	  
    }
}

class BaseModelRuntimeException extends Exception{}

?>