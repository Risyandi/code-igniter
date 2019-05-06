<?php
/**
 * create class for the class models news
 */
class News_models extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    /**
     * create function get method database
     */
    public function getNews($slug = false) {
        if ($slug === false) {
            $query = $this->db->get('news');
            return $query->result_array();
        }
        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

    /**
     * create function set method database
     */
    public function setNews(){
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        return $this->db->insert('news', $data);
    }

    /**
     * create function delete method database
     */
    public function deleteNews($id){
        return $this->db->delete('news', array('id' => $id));
    }
}
