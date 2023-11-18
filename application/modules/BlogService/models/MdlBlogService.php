<?php
class MdlBlogService extends Blog_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllBlogs(){
        $this->db_blog->select("*");
        $this->db_blog->from("blogs bl");
        $this->db_blog->where("bl.status", "1");
        $result = $this->db_blog->get();
        if ($result->num_rows()>0) {
            return $result->result_array();
        } else {
            return FALSE;
        }
    }

    public function getBlogDetail($id = ''){
        $this->db_blog->select("*");
        $this->db_blog->from("blogs bl");
        $this->db_blog->where("bl.id", $id);
        $this->db_blog->where("bl.status", "1");
        $result = $this->db_blog->get();
        if ($result->num_rows()>0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }

    public function getBlogForFilter($filtro = ''){
        $this->db_blog->select("*");
        $this->db_blog->from("blogs bl");
        $this->db_blog->where("bl.titulo LIKE '%".$filtro."%' OR bl.autor LIKE '%".$filtro."%' OR bl.contenido LIKE '%".$filtro."%'", NULL, FALSE);
        $this->db_blog->where("bl.status", "1");
        $result = $this->db_blog->get();
        if ($result->num_rows()>0) {
            return $result->result_array();
        } else {
            return FALSE;
        }
    }

    public function addBlog($titulo = '', $autor = '', $fecha = '', $contenido = ''){
        $this->db_blog->set('titulo', $titulo);
        $this->db_blog->set('autor', $autor);
        $this->db_blog->set('fecha', $fecha);
        $this->db_blog->set('contenido', $contenido);
        $this->db_blog->insert('blogs');
        $id = $this->db_blog->insert_id();
        return ['id' => $id];
    }
}