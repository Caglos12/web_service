<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';
require dirname(__FILE__).'/../../util.php'; 

class BlogService extends REST_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('MdlBlogService');
    }

    private function detail_get(){
        $detail["id"] = (empty($this->input->get('id')) || $this->input->get('id')=='undefined'?'':$this->input->get('id'));
        $detail["filtro"] = (empty($this->input->get('filtro')) || $this->input->get('filtro')=='undefined'?'':$this->input->get('filtro'));
        return $detail;
    }

    public function getAllBlogs_get(){
        $data['code'] = '';
        $blogs = $this->MdlBlogService->getAllBlogs();
        if ($blogs == TRUE){
            $data['code'] = '200';
            $data['results'] = $blogs;
        } else {
            $data['code'] = '201';
        }
        header('Cache-Control: no-cache, must-revalidate');
		header('Content-type: application/json');
        $this->response($data);
    }

    public function getBlogDetail_get(){
        $detail = $this->detail_get();
        $data['code'] = '';
        $blog = $this->MdlBlogService->getBlogDetail($detail['id']);
        if ($blog == TRUE){
            $data = $blog;
        } else {
            $data['code'] = '201';
        }
        header('Cache-Control: no-cache, must-revalidate');
		header('Content-type: application/json');
        $this->response($data);
    }

    public function getBlogForFilter_get(){
        $detail = $this->detail_get();
        $data['code'] = '';
        $data['message'] = '';
        $blogs = $this->MdlBlogService->getBlogForFilter($detail['filtro']);
        if ($blogs == TRUE){
            $data['code'] = '200';
            $data['message'] = 'Se encontraron datos';
            $data["results"] = $blogs;
        } else {
            $data['code'] = '201';
            $data['message'] = 'No hay ningun resultado que coincida';
        }
        header('Cache-Control: no-cache, must-revalidate');
		header('Content-type: application/json');
        $this->response($data);
    }

    public function addBlog_post(){
        $data['code'] = '';
        $data['message'] = '';
        $data['id'] = -1;
        $postData = file_get_contents("php://input");
        $obj = json_decode($postData, true);
        $titulo = $obj["titulo"];
        $autor = $obj["autor"];
        $fecha = $obj["fecha"];
        $contenido = $obj["contenido"];
        $result = $this->MdlBlogService->addBlog($titulo, $autor, $fecha, $contenido);
        if ($result){
            $data['id'] = $result['id'];
            $data['code'] = '200';
            $data['message'] = 'Se registro correctamente';
        } else {
            $data['code'] = '201';
            $data['message'] = 'Ocurrio un error al registrar';
        }
        header('Cache-Control: no-cache, must-revalidate');
		header('Content-type: application/json');
        $this->response($data);
    }
}