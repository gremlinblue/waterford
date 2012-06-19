<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

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
	
	public function page($id)
	{
	  $news = new $this->Newsletter();
	  $news->load($id);
	  
	  $this->masterpage->addContentPage ( 'news_page', 'content',
          array('news' => $news));
	  $this->masterpage->show(array('active_link' => get_class($this)));
	}
	
	private function show_list()
	{
		$this->masterpage->addContentPage ( 'news_summary', 'content',
          array('news' => $this->Newsletter->get_news_summary()));

        $this->masterpage->show(array('active_link' => get_class($this)));
	}
	
}
