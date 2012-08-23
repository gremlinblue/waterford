<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_Us extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->library ( 'MasterPage' );
	  $this->masterpage->setMasterPage ( 'masterpage_default' );
	  
	  # show latest news always
	  $this->load->model('Newsletter');
	  $this->masterpage->addContentPage ( 'news_list', 'navcontent',
          array('news' => $this->Newsletter->get_latest_news()));
    }

	public function index()
	{
	  $this->masterpage->addContentPage ( 'contact_us', 'content');
      $this->masterpage->show(array('active_link' => get_class($this)));
	}
	
	public function send()
	{
	  $this->send_email($_POST['name'], $_POST['msg']);
	}
	
	private function send_email($return_email, $msg)
	{
	  require_once "Mail.php";
	  $config = parse_ini_file('waterford.ini');

	  $config['charset'] = 'utf-8';
      $config['wordwrap'] = false;
	  $config['crlf'] = "\r\n";
      $config['newline'] = "\r\n";
	  $config['mail_type'] = 'html';
	  $from = $config['from'];

	  $this->load->library('email', $config);
      
      $this->email->from($from, 'County Waterford');
      $this->email->to($from);
	  
      $this->email->subject('Contact Us');
      $this->email->message($return_email." : ".$msg);
	  
      $this->email->send();

      echo $this->email->print_debugger();die();
	}
}