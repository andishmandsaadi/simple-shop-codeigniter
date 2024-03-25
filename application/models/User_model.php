<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function register($enc_password) {
        // User data array
        $data = array(
            'username' => $this->input->post('username',true),
            'email' => $this->input->post('email',true),
            'password' => $enc_password,
        );

        // Insert user
        return $this->db->insert('users', $data);
    }

    public function login($username, $password) {
        // Fetch user by username
        $this->db->where('username', $username);
        $result = $this->db->get('users');

        if ($result->num_rows() == 1) {
            $hashed_password = $result->row(0)->password;

            // Verify the password against the hashed password in the database
            if (password_verify($password, $hashed_password)) {
                // If the password is correct, return the user's ID
                return $result->row(0)->id;
            } else {
                // If the password is incorrect, return false
                return false;
            }
        } else {
            // If no matching user was found, return false
            return false;
        }
    }

}
