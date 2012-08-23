<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->library ( 'MasterPage' );
	}

	public function index()
	{
	  $this->load->model('Photo');
	  $photos = $this->Photo->get_photos_summary();
	  
	  $this->show_default_masterpage();
	  $this->masterpage->addContentPage ( 'home', 'content', array('photos'=>$photos));
      $this->masterpage->show(array('active_link' => get_class($this)));
	}
	
	public function gallery()
	{
	  $this->load->model('Photo');
	  $photos = $this->Photo->get_latest_photos(50);

	  $this->show_default_masterpage();
	  $this->masterpage->addContentPage ( 'photo_gallery', 'content', array('photos'=>$photos));
      $this->masterpage->show(array('active_link' => get_class($this)));
	}
	
	public function admin()
	{
	  $this->masterpage->addContentPage ( 'admin_home', 'content');
	  $this->masterpage->setMasterPage('masterpage_admin');
	  $this->masterpage->show(array('active_link' => get_class($this)));
	}
	
	private function show_default_masterpage(){
	
	  $this->masterpage->setMasterPage ( 'masterpage_default' );
	  
	  # show latest news always
	  $this->load->model('Newsletter');
	  $this->masterpage->addContentPage ( 'news_list', 'navcontent',
          array('news' => $this->Newsletter->get_latest_news()));
	}
}