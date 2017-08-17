<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Providers extends MY_Controller {

    function __construct(){
        parent::__construct();
    }

    function index(){ 
      $user = $this->ion_auth->user()->row();
      $userId = $user->id;
        
      $data['providers'] = $this->providers_model->getProvidersList($userId); // chiamo il modello e lo assegno ad un array
      $this->load->view('providers/list', $data);
        
    }

    function new_provider(){
      if(isset($_POST) && !empty($_POST)) {
        
        $user = $this->ion_auth->user()->row();
        $userId = $user->id;

        $data = $_POST['provider'];
        // concateno all'array anche l'id dell'utente
        $data['idUser'] = $userId;
        
        $this->providers_model->addProvider($data);
        redirect('providers');
      }else{
        $this->load->view('providers/new');
      }
    }

    function edit(){ 
        $id = $this->uri->segment(3);
        $user = $this->ion_auth->user()->row();
        $userId = $user->id;

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
        
        $user = $this->ion_auth->user()->row();
        $userId = $user->id;
        $this->providers_model->updateProvider($id, $data, $userId);
      }

      redirect('providers');
    }

    function delete_provider(){
      $id = $this->uri->segment(3);
      $user = $this->ion_auth->user()->row();
      $userId = $user->id;
      $this->providers_model->deleteProvider($id, $userId); // chiamo il metodo che fa la cancellazione del record

      redirect('providers'); // faccio il recirect
    }
}
