<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
        
        //$loggedIn = $this->session->userdata('logged-in');

        //if(!isset($loggedIn) || $loggedIn != true){
            // Not logged In
        //    show_404();
        //}
    }

    function index(){ 
        //$userId = $this->session->userdata('id');
        $userId = 1;
        
        // DATI GLOBALI

        // estraggo l'elenco dei domini
        $data['domains'] = $this->dashboard_model->getService($userId);
        
        // calcolo il guadagno totale per tutti i domini
        $sum = 0;
        foreach($data['domains'] as $domain) {
          $sum += $domain->fee;
        }
        
        // Mi giro tutti i domini e mi creo un array con il guadagno totale per mese
        $sum_by_mounth = array();
        foreach($data['domains'] as $domain) {
          $month=date("n", strtotime($domain->renewal) );
          if(!isset($sum_by_mounth[$month])){
            $sum_by_mounth[$month] = $domain->fee;
          }else{
            $sum_by_mounth[$month] += $domain->fee;
          }
        }
        $data['earnByMounth'] = $sum_by_mounth;



        // DATI FILTRATI PER MESE CORRENTE

        // estraggo l'elenco dei domini in scadenza
        $data['domainsCurrent'] = $this->dashboard_model->getService($userId, TRUE);

        // calcolo il guadagno totale per tutti i domini in scadenza
        $sum_current = 0;
        if(!empty($data['domainsCurrent'])){
          foreach($data['domainsCurrent'] as $domain) {
            $sum_current += $domain->fee;
          }
        }

        // mi creo un array con tutte le somme
        $data['summmary']['total'] = count($data['domains']);
        $data['summmary']['sum'] = $sum;
        $data['summmary']['total_current'] = count($data['domainsCurrent']);
        $data['summmary']['sum_current'] = $sum_current;

        
        $this->load->view('dashboard/view', $data);
        
    }
}
