<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('base.php');

class Login extends Base {

    protected $_tablename = 'logins';
	
	var $id                        = null;
	var $username                  = null;
	var $person_id                 = null;
	var $password                  = null;
	var $password_retrieval_hint   = null;
	var $password_retrieval_answer = null;
	var $date_created              = null;
	var $date_updated              = null;
    
	public function save_with_defaults($username, $person_id) // can be used for passwrd reset
	{
	  $this->username = $username;
	  $this->person_id = $person_id;
	  # defaults
	  $this->password = '123456';
	  $this->password_retrieval_hint   = '123456';
	  $this->password_retrieval_answer = '123456';
	  
      $current_time = time();
	  $this->date_updated = strftime('%Y-%m-%d %H:%M:%S', $current_time);
	  $this->date_created = strftime('%Y-%m-%d %H:%M:%S', $current_time);
	  
	  parent::save();
	  
	}
}

?>