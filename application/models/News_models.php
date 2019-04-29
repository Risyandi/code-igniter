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
    public function get_news($slug = FALSE) {
        if ($slug === FALSE) {
            $query = $this->db->get('news');
            return $query->result_array();
        }
        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }
}
