<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('news_models');
        $this->load->helper('url_helper');
    }
    
    /**
     * method index view
     */
    public function index(){
        $data['news'] = $this->news_models->getNews();
        $data['title'] = 'Listing News';
        $this->load->view('components/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('components/footer', $data);
    }
    
    /**
     * method read
     */
    public function view($slug = NULL){
        $data['news_item'] = $this->news_models->getNews($slug);
        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];
        $this->load->view('components/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('components/footer', $data);
    }

    /**
     * method create
     */
    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Create News';
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('components/header', $data);
            $this->load->view('news/create');
            $this->load->view('components/footer');
        } else {
            $this->news_models->setNews();
            $this->load->view('components/header', $data);
            $this->load->view('news/success');
            $this->load->view('components/footer');
        }
    }
    
    /**
     * method delete
     */
    public function delete($id=null){
        if(!isset($id)){
            show_404();
        }

        if($this->news_models->deleteNews($id)){
            redirect(site_url('/news'));
        }
    }

}