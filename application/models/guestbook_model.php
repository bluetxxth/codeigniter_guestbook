<?php 


/**
 * Model Class perfoms CRUD to database
 * @author  Gabriel Nieva
 *
 */
class Guestbook_model extends CI_Model{
	
	
	/**
	 * Construct an object of type Guestbook_model
	 */
	public function __construct(){
		
		//load database
		$this->load->database();
	}
	
	
	/**
	 * Get posted posts
	 */
	public function get_posts(){
		
		$query = $this->db->get('posts');
		return $query->result_array();
	}
	
	
	/**
	 * Set posts
	 */
	public function set_posts(){
		
		//make an associative array with text and author
		$data = array(
			'text' => $this->input->post('text'),
			 'author' => $this->input->post('author')
			 	
		);
		
		//Sanitize data so that cross site scirpting hacks can be prevented
		$data = $this->security->xss_clean($data);
		
		//return the posts and the data
		return $this->db->insert('posts' , $data);
	}
	
}