<?php


/**
 * 
 * Controller class 
 * Named in a way that can be associated with a URI
 * @author  Gabriel Nieva
 *
 */
class Guestbook extends CI_Controller{
	
	/**
	 * Creates an object of type Guestbook
	 */
	public function __construct(){
		//call the parent (base) constructor
		parent:: __construct();
		//load model
		$this->load->model('guestbook_model');
		//load helper
		$this->load->helper(array('form', 'url'));
		//load from library
		$this->load->library('form_validation');
		
	}
	
	/**
	 * Index controller
	 */
	public function index(){
		//posts
		$data['posts'] = $this->guestbook_model->get_posts();
		//title
		$data['title'] = 'Guestbook';
		//form with label, textarea, input, submit...
		$data['form'] = form_open('guestbook/create').form_label('Write in our guestbook:', 'text').'<br>
		      '.form_textarea('text', '').'<br>'.form_label('Author:','author').form_input('author',
		      '').form_submit('submit', 'Submit').form_close();
		
		//load the guestbook view with the data
		$this->load->view('guestbook/index', $data);	
	}
	
	/**
	 * Create posts
	 */
	public function create(){
		//set rules for form validation for text
		$this->form_validation->set_rules('text','text','required');
		//set rules for form validation for author
		$this->form_validation->set_rules('author','author','required');
		//if the form is valid
		if($this->form_validation->run()===true){
			$this->guestbook_model->set_posts();
			
			//reference index
			$this->index();
			
		}
	}
	
	
	
}