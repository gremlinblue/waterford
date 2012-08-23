<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('base.php');

class Photo extends Base {

    protected $_tablename = 'photos';
	
	var $id               = null;
	var $filename         = null;
	var $hash             = null;
	var $comment          = null;
	var $frontpage        = null;
	var $published        = null;
    var $date_created     = null;
	var $date_updated     = null;
 
    function update()
	{
	
	  $this->date_updated = strftime('%Y-%m-%d %H:%M:%S', time());
	  parent::update();

	}
	
	function insert()
	{
	
	  $current_time = time();
	  $this->date_updated = strftime('%Y-%m-%d %H:%M:%S', $current_time);
	  $this->date_created = strftime('%Y-%m-%d %H:%M:%S', $current_time);
	  parent::insert();
	}
	
	function get_latest_photos($limit = 4)
	{
	  $this->db->select('id,filename,comment,date_created');
	  $this->db->where('published', true);
	  $this->db->order_by('frontpage','desc');
	  $this->db->order_by('date_created','desc');
	  $this->db->limit($limit);
	  $raw_result = $this->db->get($this->_tablename);
	  return $this->create_objects($raw_result);
	}
	
	function get_photos_summary()
	{
	  return $this->get_latest_photos();
	}
}

?>