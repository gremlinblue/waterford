<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base extends CI_Model {

    protected $_tablename = null;
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_by_id($id)  //# test this
	{
      $this->db->where('id', $id);
	  $result = $this->db->get($this->_tablename);
	  
	  if($result->num_rows == 1){
        $class_vars = get_object_vars($result->row());

	    // if property exists that matches row name, then set value
        foreach ($class_vars as $name => $value)
          $this->set_property($name, $value);
      }

    }

	# select
	function get($where_parameters = array(), $select_parameters = array())
	{
	
	  foreach($select_parameters as $k => $v)
	    $this->db->select($k, $v);
	  
	  foreach($where_parameters as $k => $v)
	    $this->db->where($k, $v);
		
	  $raw_result = $this->db->get($this->_tablename);
	  
	  $result     = array();
	  $self_class = get_class($this);
	  foreach($raw_result->result() as $row){
	    $obj = new $self_class; 
		$obj->set_properties($row);
	    array_push($result, $obj);
	  }
	  
	  return $result;
	}
	
	# insert
    function save()
	{
	
	  # note: use get_object_vars
	  
	  $this->db->insert($this->_tablename, $this);
	  return $this->db->insert_id();
	  
	}
	
	# update
	function update($id, $model)
	{
	
	  $this->db->where('id', $id);
	  $this->db->update($this->_tablename, $model);
	  return $this->db->affected_rows();
	  
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

?>