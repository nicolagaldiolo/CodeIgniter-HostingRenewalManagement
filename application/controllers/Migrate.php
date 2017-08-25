<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migrate extends CI_Controller {

  public function index()
  {
    
    if(!$this->input->is_cli_request()){
      echo "This script can only be accessed via the command line" . PHP_EOL;
      return;
    }
    
    $this->load->library('migration');

    if ( ! $this->migration->current()) {
      show_error($this->migration->error_string());
    }
  }

}