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
}
