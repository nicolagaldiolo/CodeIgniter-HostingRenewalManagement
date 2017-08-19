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

    // faccio un giro sugli utenti e invio la mail di promemoria per ogni utente
    $users = $this->ion_auth->users()->result();
    if(!empty($users)){
      
      foreach($users as $user){
        //echo '<pre>', var_dump($user), '</pre>';
        $userId = $user->id;

        // Estraggo tutti i domini (legati all'utente) scaduti il mese scorso non acora seganti come pagati
        $data['domainsExpired'] = $this->reminders_model->getService($userId, TRUE);
        
        // Estraggo tutti i domini in scadenza (legati all'utente)
        $data['domainsCurrent'] = $this->reminders_model->getService($userId, FALSE);

        $month = "";
        if(!empty($data['domainsCurrent'])){
          $month="mese ( " . date("F Y", strtotime($data['domainsCurrent'][0]->renewal) ) . " )";
        }

        // preparo la mail di promemoria
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $this->email->to($user->email);
        $this->email->from('galdiolo.nicola@gmail.com','Hosting manager');
        $this->email->subject("Promemoria Servizi in scadenza {$month}");
        $this->email->message($this->load->view('email_template/reminder', $data, true));
        $this->email->send();

      }
      // aggiorno la data di scadenza (+1 anno) dei domini scaduti il mese scorso
      // metto i domini che scadono il mese prossimo nello stato "in scadenza"
      $this->reminders_model->updateRenewal();
    }

  }
}