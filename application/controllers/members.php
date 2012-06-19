<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends CI_Controller {

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
      $this->show_list();
	}
	
	private function show_list()
	{
		$this->load->model('Person');
		$this->masterpage->addContentPage ( 'members_list', 'content',
          array('members' => $this->Person->get(array('is_active'=>true))));

        $this->masterpage->show(array('active_link' => get_class($this)));
	}
	
}
