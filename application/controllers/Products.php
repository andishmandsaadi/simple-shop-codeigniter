<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['products'] = $this->product_model->get_products();
        $data['title'] = 'Products Listing';

        $this->load->view('templates/header', $data);
        $this->load->view('products/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id) {
        $data['product'] = $this->product_model->get_product_by_id($id);

        if (empty($data['product'])) {
            show_404();
        }

        $data['title'] = $data['product']['name'];

        $this->load->view('templates/header', $data);
        $this->load->view('products/view', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        // Only logged-in users can upload products
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }

        $data['title'] = 'Upload Product';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('products/create', $data);
            $this->load->view('templates/footer');
        } else {
            // Handle file upload
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|webp|png';
            $config['max_size'] = '20480'; // 2MB
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                echo($this->upload->display_errors());
                exit;
                $errors = array('error' => $this->upload->display_errors());
                $product_image = 'noimage.jpg';
            } else {
                $data = $this->upload->data();
                $product_image = $data['file_name'];
            }

            $this->product_model->add_product($product_image);
            redirect('products');
        }
    }
}
