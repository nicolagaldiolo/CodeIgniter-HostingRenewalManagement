<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Providers_model extends CI_Model {

  function addProvider($data){
    $this->db->insert('providers', $data);
  }

  function getProvidersList($user){
    
    // query lanciata con metodo Active Records
    $this->db->select('*');
    $this->db->from('providers');
    if($user) {
      $this->db->where('idUser', $user);
    }
    $query = $this->db->get();

    //echo var_dump($query->result());
    //die();

    if($query->num_rows() > 0){ // chiamo il metodo num_rows per controllare se è presente almeno una riga
      foreach ($query->result() as $row){ // il metodo result() mi torna l'array dei risultati
          $data[] = $row;
      }
      return $data;
    }
  }

  function getProvider($id, $user){
    
    // query lanciata con metodo Active Records
    $this->db->select('*');
    $this->db->from('providers');
    $this->db->where('id', $id);
    if($user) {
        $this->db->where('idUser', $user);
    }

    $query = $this->db->get()->result();

    if($query){
      return $query[0];
    }else{
      return null;
    }
  }

  // U - Update
  function updateProvider($id, $data, $user){
    $this->db->where('id', $id);
    if($user) {
        $this->db->where('idUser', $user);
    }
    $this->db->update('providers', $data);
  }

  // D - Delete
  function deleteProvider($id, $user){
    $this->db->where('id', $id);
    if($user) {
        $this->db->where('idUser', $user);
    }
    $this->db->delete('providers');
  }

}