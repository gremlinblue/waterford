<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Photos extends MY_Controller {

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
	
	public function edit($id, $error = null)
	{
	  $photo = $this->get_photo($id);
	  
	  $data = array('error' => $error);
	  $data['photo']    = $photo;
      
	  $this->masterpage->addContentPage ( 'admin_photos_edit', 'content', $data);
	  $this->masterpage->show(array('active_link' => 'Photos'));	  
	}
	
	public function save()
	{
	  $parameters = $this->input->post();
	  $photo_data = $this->upload();
	  
	  if (is_array($photo_data)){
	    $photo       = $this->save_photo($parameters, $photo_data);
	    redirect('/admin_photos');
	  }
	  else
		$this->edit($parameters['id'], $photo_data);		
	}
	
	private function upload(){
	  $config['upload_path'] = 'images/uploads/';
   	  $config['allowed_types'] = 'gif|jpg|png';
	  
	  $this->load->library('upload', $config);
	  if($this->upload->do_upload('filename') == FALSE)
	    $result = $this->upload->display_errors();
	  else
	    $result = $this->upload->data();
	  
	  return $result;
	}
	
	private function show_list()
	{
	  $data = array();
	  
	  $this->load->model('Photo');
	  $photos = new $this->Photo();
	  
	  #cols
	  $columns = get_class_vars(get_class($photos));
	  $data['columns'] = $columns;
	  
	  $photos = $photos->get();
	  $data['photos'] = $photos;
	  
	  $this->masterpage->addContentPage ( 'admin_photos_list', 'content', $data);
	  $this->masterpage->show(array('active_link' => 'Photos'));
	}

	private function get_photo($id)
	{
	  $this->load->model('Photo');
	  $photo = new $this->Photo();
	  
	  try{
	    $photo->load($id);
	  }catch(BaseModelRuntimeException $e){
	    $photo = null;
	  }
	  return $photo;
	}
	
    private function save_photo($parameters, $photo_details)
	{
	  $this->load->model('Photo');
	  $photo = new $this->Photo();
	  
	  if($id = $parameters['id'])
	    $photo->load($id);
	  
	  # set filename hash
	  $parameters['filename'] = $photo_details['file_name'];
	  $parameters['hash']     = md5_file($photo_details['full_path']);
	  
	  # set checkboxes
	  foreach(array('frontpage','published') as $k)
	    $parameters[$k] = (isset($parameters[$k])? 1 : 0);
	  
	  $photo->set_properties($parameters);
	  $photo->save();
	  return $news;
	}

}