<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('news_models');
        $this->load->helper('url_helper');
    }
    
    public function index(){
        $data['news'] = $this->news_models->get_news();
        $data['title'] = 'Listing News';
        $this->load->view('components/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('components/footer', $data);
    }
    
    public function view($slug = NULL){
        $data['news_item'] = $this->news_models->get_news($slug);
        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];
        $this->load->view('components/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('components/footer', $data);
    }

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
        $this->news_models->set_news();
        $this->load->view('components/header', $data);
        $this->load->view('news/success');
        $this->load->view('components/footer');
    }
}

}