<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminders extends CI_Controller { 
  public function __construct() { 
    parent::__construct(); 
  }
  
  public function index(){
    if(!$this->input->is_cli_request()){
      echo "This script can only be accessed via the command line" . PHP_EOL;
      return;
    }
    
    //$userId = $this->session->userdata('id');
    $userId = 1;

    $data['domainsCurrent'] = $this->dashboard_model->getService($userId, TRUE);
    $month=date("F Y", strtotime($data['domainsCurrent'][0]->renewal) );

    $this->email->set_mailtype("html");
    $this->email->set_newline("\r\n");
    $this->email->to("galdiolo.nicola@gmail.com");
    $this->email->from("galdiolo.nicola@gmail.com");
    $this->email->subject("Promemoria Servizi in scadenza mese ({$month})");
    $this->email->message($this->load->view('email_template/reminder', $data, true));
    $this->email->send();
  }
}
