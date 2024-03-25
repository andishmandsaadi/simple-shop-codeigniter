<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Load migration library
        $this->load->library('migration');

        // Restrict access to CLI requests only
        if (!$this->input->is_cli_request()) {
            show_error('You don\'t have permission to access this page', 403);
        }
    }

    public function index() {
        if ($this->migration->latest() === FALSE) {
            // Show error if migration failed
            echo $this->migration->error_string();
        } else {
            // Success message
            echo "Migrated database successfully." . PHP_EOL;
        }
    }
}
