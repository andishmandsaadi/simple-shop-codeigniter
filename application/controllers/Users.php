<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

function __construct()
{
    parent::__construct();
    $this->load->model('User_model');
}

public function register() {
    // Form validation rules
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

    if($this->form_validation->run() === FALSE){
        $this->load->view('templates/header');
        $this->load->view('users/register');
        $this->load->view('templates/footer');
    } else {
        // Encrypt password
        $hashed_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $this->User_model->register($hashed_password);

        // Set message
        $this->session->set_flashdata('user_registered', 'You are now registered and can log in');

        redirect(base_url());
    }
}

public function login() {
    // Form validation rules
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if($this->form_validation->run() === FALSE){
        $this->load->view('templates/header');
        $this->load->view('users/login');
        $this->load->view('templates/footer');
    } else {
        // Get username and password
        $username = $this->input->post('username',true);
        $password = $this->input->post('password',true);

        // Login user
        $user_id = $this->User_model->login($username, $password);

        if($user_id){
            // Create session
            $user_data = array(
                'user_id' => $user_id,
                'username' => $username,
                'logged_in' => true
            );

            $this->session->set_userdata($user_data);

            // Set message
            $this->session->set_flashdata('user_loggedin', 'You are now logged in');

            redirect(base_url());
        } else {
            // Set message
            $this->session->set_flashdata('login_failed', 'Login is invalid');

            redirect('users/login');
        }
    }
}

// Logout method
public function logout() {
    // Unset user data
    $this->session->unset_userdata('logged_in');
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('username');

    // Set message
    $this->session->set_flashdata('user_loggedout', 'You are now logged out');

    redirect(base_url());
}
}
