<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_News extends MY_Controller {

	public function __construct()
    {
      parent::__construct();
      $this->load->library ( 'MasterPage' );
	  $this->masterpage->setMasterPage ( 'masterpage_admin' );
	}
	
	public function index()
	{
      $this->show_list();
	}
	
	public function create()
	{
	  $this->edit(0);
	}
	
	public function edit($id)
	{
	  $newsletter = $this->get_newsletter($id);
	  
	  $data = array();
	  $data['newsletter']    = $newsletter;
      $data['persons'] = $this->get_persons();
	  
	  $this->masterpage->addContentPage ( 'admin_news_edit', 'content', $data);
	  $this->masterpage->show(array('active_link' => 'News'));	  
	}
	
	public function broadcast($id)
	{
	  $newsletter = $this->get_newsletter($id);
	  $this->broadcast_to_all($newsletter);
	  
	  redirect('/admin_news');
	}
	
	public function save()
	{
	  $parameters = $this->input->post();
	  $news       = $this->save_newsletter($parameters);
	  
	  if(isset($parameters['broadcast']))
	    $this->broadcast_to_all($news);
	    
	  redirect('/admin_news');
	}
	
	private function show_list()
	{
	  $data = array();
	  
	  $this->load->model('Newsletter');
	  $news = new $this->Newsletter();
	  
	  #cols
	  $columns = get_class_vars(get_class($news));
	  $data['columns'] = $columns;
	  
	  $news = $news->get();
	  $data['news'] = $news;
	  
	  #persons
	  $data['persons'] = $this->get_persons();
	  
	  $this->masterpage->addContentPage ( 'admin_news_list', 'content', $data);
	  $this->masterpage->show(array('active_link' => 'News'));
	}

	private function get_newsletter($id)
	{
	  $this->load->model('Newsletter');
	  $news = new $this->Newsletter();
	  
	  try{
	    $news->load($id);
	  }catch(BaseModelRuntimeException $e){
	    $news = null;
	  }
	  return $news;
	}
	
	private function get_persons()
	{
	  $this->load->model('Person');
	  $person = new $this->Person();
	  
	  $result = array();
	  foreach($person->get(null, array('id','firstname','lastname')) as $p)
	    $result[$p->id] = $p->lastname.", ".$p->firstname;
	  
	  return $result;
	}

    private function save_newsletter($parameters)
	{
	  $this->load->model('Newsletter');
	  $news = new $this->Newsletter();
	  
	  if($id = $parameters['id'])
	    $news->load($id);
	  
	  # set checkboxes
	  foreach(array('frontpage','published') as $k)
	    $parameters[$k] = (isset($parameters[$k])? 1 : 0);
	  
	  $news->set_properties($parameters);
	  $news->save();
	  return $news;
	}
	
	private function broadcast_to_all($news)
	{
	
	  $this->load->model('Person');
	  $emails = array();
	  foreach($this->Person->get(null, array('email')) as $p)
	    array_push($emails, $p->email);
		
	  $news->date_broadcasted = strftime('%Y-%m-%d %H:%M:%S', time());
	  $news->update();
	  
	  $this->send_email($news, $emails);
	}
	
	private function send_email($news, $emails)
	{
	  $emails=array('scytheb_2501@yahoo.com'); # testing
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
      $this->email->to(implode(',',$emails));
	  $this->email->cc($from);
      
      $this->email->subject($news->title);
      $this->email->message($this->format_email_body($news));
	  
      $this->email->send();

      echo $this->email->print_debugger();die();
	}
	
	private function format_email_body($news){
	  
	  $this->load->model('Person');
	  $person = new $this->Person();
	  $person->load($news->author_id);
	  
	  return $this->load->view('news_page_raw',array('news'=>$news,
	                                          'author'=>$person), true);
	}
}