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
	var $is_active        = true;
	var $date_created     = null;
	var $date_updated     = null;
    
}

?>