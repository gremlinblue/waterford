<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('base.php');

class Newsletter extends Base {

    protected $_tablename = 'newsletters';
	
	var $id               = null;
	var $title            = null;
	var $news             = null;
	var $author_id        = null;
	var $frontpage        = null;
	var $published        = null;
    var $date_broadcasted = null;
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
	
	function broadcast($emails)
	{
	  $this->send_email($emails);
	  $this->date_broadcasted = strftime('%Y-%m-%d %H:%M:%S', time());
	  $this->update();
	}
	
	function get_latest_news($limit = 5)
	{
	  $this->db->select('id,title,date_created');
	  $this->db->order_by('date_created','desc');
	  $this->db->limit($limit);
	  $raw_result = $this->db->get($this->_tablename);
	  return $this->create_objects($raw_result);
	}
	
	function get_news_summary($limit = 3)
	{
	  $this->db->select('id,title,news,date_created');
	  $this->db->order_by('date_created','desc');
	  $this->db->limit($limit);
	  $raw_result = $this->db->get($this->_tablename);
	  return $this->create_objects($raw_result);
	}
	
	private function send_email($emails)
	{
	  /*$this->load->library('email');
$emails = array('scytheb_2501@yahoo.com','caithyheart@yahoo.com');
      $this->email->from('your@example.com', 'Your Name');
      $this->email->to(implode(',',$emails));
      #$this->email->cc('another@another-example.com');
      #$this->email->bcc('them@their-example.com');

      $this->email->subject('Email Test');
      $this->email->message('Testing the email class.');
      $this->email->send();

      echo $this->email->print_debugger();die();*/
	}
}

?>