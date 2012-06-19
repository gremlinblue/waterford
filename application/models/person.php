<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('base.php');

class Person extends Base {

    protected $_tablename = 'persons';
	
	var $id               = null;
	var $firstname        = null;
	var $lastname         = null;
	var $address          = null;
	var $telephone_number = null;
	var $email            = null;
	var $password         = null;
	var $is_active        = true;
	var $role             = null;
	var $date_created     = null;
	var $date_updated     = null;
 
    function update($id, $model)
	{
	
	  $this->date_updated = strftime('%Y-%m-%d %H:%M:%S', time());
	  parent::update($id, $model);

	}
	
	function insert()
	{
	
	  $current_time = time();
	  $this->date_updated = strftime('%Y-%m-%d %H:%M:%S', $current_time);
	  $this->date_created = strftime('%Y-%m-%d %H:%M:%S', $current_time);
	  
	  if($this->is_unique_email())
	    parent::insert();
	  else
	    throw new Exception("Non-unique email");
	  
	}
	
	private function is_unique_email()
	{
	
	  $this->db->where('email', $this->email);
	  $query = $this->db->get($this->_tablename);
      $result = $query->num_rows ?  false : true;
	  return $result;
	}
	
	public function verify_user($email, $password)
	{
	  $query = $this
	             ->db
				 ->where('email', $email)
				 ->where('password', MD5($password))
				 ->limit(1)
				 ->get($this->_tablename);

	  if($query->num_rows > 0)
	    return true;

	  return false;
	}
	
}

?>