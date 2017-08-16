<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domains extends CI_Controller {

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
        
        $data['domains'] = $this->domains_model->getDomains($userId); // chiamo il modello e lo assegno ad un array
        $this->load->view('domains/list', $data);
        
    }

    function new_domain(){
      if(isset($_POST) && !empty($_POST)) {
        $data = $_POST['domain'];
        // concateno all'array anche l'id dell'utente
        $data['idUser'] = 1; //$this->session->userdata('id');
        $this->domains_model->addDomain($data);
        redirect('domains');
      }else{
        //$userId = $this->session->userdata('id');
        $userId = 1;
        $data['providers'] = $this->providers_model ->getProvidersList($userId);
        $this->load->view('domains/new', $data);
      }
    }

    function edit(){ 
        $id = $this->uri->segment(3);
        //$userId = $this->session->userdata('id');
        $userId = 1;

        $data['domain'] = $this->domains_model->getDomain($id, $userId);
        $data['providers'] = $this->providers_model ->getProvidersList($userId);
        
        if($data['domain']){
            $this->load->view('domains/edit', $data);
        }else{
            show_404();
        }
    }

    function update(){
      if(isset($_POST) && !empty($_POST)) {

        
        $data = $_POST['domain'];
        $id = $data['id'];
        
        //$userId = $this->session->userdata('id');
        $userId = 1;
        $this->domains_model->updateDomain($id, $data, $userId);
      }

      redirect('domains');
    }

    function delete_domain(){
      $id = $this->uri->segment(3);
      //$userId = $this->session->userdata('id');
      $userId = 1;
      $this->domains_model->deleteDomain($id, $userId); // chiamo il metodo che fa la cancellazione del record

      redirect('domains'); // faccio il recirect
    }
}
