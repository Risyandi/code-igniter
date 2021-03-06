<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * examples controller static pages
 * https://yoursite.com/index.php/{name_class}/{name_function} || https://yoursite.com/index.php/category/page/{your_static_page} 
 */
class Category extends CI_Controller {
    public function page($page = 'home'){
        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            show_404();
        }
        $data['title'] = ucfirst($page);
        $this->load->view('components/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('components/footer', $data);
    }
}
