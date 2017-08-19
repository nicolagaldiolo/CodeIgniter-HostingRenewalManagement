<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domains extends MY_Controller {

    function __construct(){
      parent::__construct();
    }

    function index(){ 
        $user = $this->ion_auth->user()->row();
        $userId = $user->id;
        $data['domains'] = $this->domains_model->getDomains($userId); // chiamo il modello e lo assegno ad un array
        $this->load->view('domains/list', $data);
        
    }

    function new_domain(){
      $user = $this->ion_auth->user()->row();
      $userId = $user->id;
      
      if(isset($_POST) && !empty($_POST)) {
        $data = $_POST['domain'];
        // concateno all'array anche l'id dell'utente
        $data['idUser'] = $userId;
        $this->domains_model->addDomain($data);
        redirect('domains');
      }else{
        
        $data['providers'] = $this->providers_model ->getProvidersList($userId);
        $this->load->view('domains/new', $data);
      }
    }

    function edit(){ 
      $id = $this->uri->segment(3);
      $user = $this->ion_auth->user()->row();
      $userId = $user->id;

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

        $user = $this->ion_auth->user()->row();
        $userId = $user->id;
        
        $data = $_POST['domain'];
        $id = $data['id'];
        
        $this->domains_model->updateDomain($id, $data, $userId);
      }

      redirect('domains');
    }

    function paid(){
      $id = $this->uri->segment(3);
      $user = $this->ion_auth->user()->row();
      $userId = $user->id;
      
      $this->domains_model->paidDomain($id, $userId);

      redirect('domains');
    }

    function delete_domain(){
      $id = $this->uri->segment(3);
      $user = $this->ion_auth->user()->row();
      $userId = $user->id;
      $this->domains_model->deleteDomain($id, $userId); // chiamo il metodo che fa la cancellazione del record

      redirect('domains'); // faccio il recirect
    }
}
