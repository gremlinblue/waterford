<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_Us extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->library ( 'masterpage' );
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
	  print_r($_POST);
	  $this->index();
	}
}