<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function add_product($product_image) {
        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price'),
            'image' => $product_image
        );

        return $this->db->insert('products', $data);
    }

    public function get_products() {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('products');
        return $query->result_array();
    }

    public function get_product_by_id($id) {
        $query = $this->db->get_where('products', array('id' => $id));
        return $query->row_array();
    }

    public function toggle_like($product_id, $user_id) {
        if ($this->is_liked_by_user($product_id, $user_id)) {
            // If liked, unlike it
            $this->db->where('product_id', $product_id);
            $this->db->where('user_id', $user_id);
            return $this->db->delete('likes');
        } else {
            // If not liked, add like
            $data = array(
                'product_id' => $product_id,
                'user_id' => $user_id
            );
            return $this->db->insert('likes', $data);
        }
    }

    public function count_likes($product_id) {
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('likes');
        return $query->num_rows();
    }

    public function is_liked_by_user($product_id, $user_id) {
        $this->db->where('product_id', $product_id);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('likes');
        return $query->num_rows() > 0;
    }

}
