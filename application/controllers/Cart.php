<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function add() {
        $product = $this->product_model->get_product_by_id($this->input->post('product_id'));
        $insert = array(
            'id' => $this->input->post('product_id'),
            'qty' => 1,
            'price' => $product['price'],
            'name' => $product['name'],
            'image' => $product['image']
        );

        $this->cart->insert($insert);
        redirect('cart/index');
    }

    public function index() {
        $data['title'] = 'Shopping Cart';
        $this->load->view('templates/header', $data);
        $this->load->view('cart/index');
        $this->load->view('templates/footer');
    }

    public function remove($rowid) {
        $this->cart->update(array(
            'rowid' => $rowid,
            'qty' => 0
        ));
        redirect('cart/index');
    }

    public function clear() {
        $this->cart->destroy();
        redirect('cart/index');
    }

    public function checkout() {
        // Here, implement any required functionality before clearing the cart
        $this->cart->destroy();
        $this->session->set_flashdata('success', 'Thank you for your purchase!');
        redirect('cart/success');
    }

    public function success() {
        $data['title'] = 'Thank You';
        $this->load->view('cart/success', $data);
    }


}
