<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Providers extends CI_Controller {

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
        
        $data['providers'] = $this->providers_model->getProvidersList($userId); // chiamo il modello e lo assegno ad un array
        $this->load->view('providers/list', $data);
        
    }

    function new_provider(){
      if(isset($_POST) && !empty($_POST)) {
        $data = $_POST['provider'];
        // concateno all'array anche l'id dell'utente
        $data['idUser'] = 1; //$this->session->userdata('id');
        
        $this->providers_model->addProvider($data);
        redirect('providers');
      }else{
        $this->load->view('providers/new');
      }
    }

    function edit(){ 
        $id = $this->uri->segment(3);
        //$userId = $this->session->userdata('id');
        $userId = 1;

        $data['provider'] = $this->providers_model->getProvider($id, $userId);
        
        if($data['provider']){
            $this->load->view('providers/edit', $data);
        }else{
            show_404();
        }
    }

    function update(){
      if(isset($_POST) && !empty($_POST)) {

        
        $data = $_POST['provider'];
        $id = $data['id'];
        
        //$userId = $this->session->userdata('id');
        $userId = 1;
        $this->providers_model->updateProvider($id, $data, $userId);
      }

      redirect('providers');
    }

    function delete_provider(){
      $id = $this->uri->segment(3);
      //$userId = $this->session->userdata('id');
      $userId = 1;
      $this->providers_model->deleteProvider($id, $userId); // chiamo il metodo che fa la cancellazione del record

      redirect('providers'); // faccio il recirect
    }
}
