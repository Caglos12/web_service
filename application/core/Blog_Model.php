<?php 

class Blog_Model extends CI_Model {
 
    protected $db_blog;
 
    public function __construct() {
        parent::__construct();
        $this->db_blog = $this->load->database('blog_service', true);
    }
}