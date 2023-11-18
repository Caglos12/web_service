<?php 

class Secondary_Model extends CI_Model {
 
    protected $db_secondary;
 
    public function __construct() {
        parent::__construct();
        $this->db_secondary = $this->load->database(SERVER_DB_S, true);
    }
}