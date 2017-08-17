<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domains_model extends CI_Model {

  function addDomain($data){
    $this->db->insert('domains', $data);
  }

  function getDomains($user){
    
    // query lanciata con metodo Active Records
    $this->db->select('d.id, d.url, p1.name as domain, p1.label as domLabel, p2.name as hosting, p2.label as hosLabel, d.renewal, d.pay, d.fee, d.note');
    $this->db->from('domains as d');
    $this->db->join('providers as p1', 'd.domain = p1.id', 'left');
    $this->db->join('providers as p2', 'd.hosting = p2.id', 'left');
    if($user) {
        $this->db->where('d.idUser', $user);
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

  function getDomain($id, $user){
    
    // query lanciata con metodo Active Records
    $this->db->select('*');
    $this->db->from('domains');
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

  function paidDomain($id, $user){
    
    $data = array(
      'pay' => 0,
    );
  
    $this->db->where('id', $id);
    if($user) {
        $this->db->where('idUser', $user);
    }
    $this->db->update('domains', $data);

  }

  // U - Update
  function updateDomain($id, $data, $user){
    
    //var_dump($data);
    //die();
    
    $this->db->where('id', $id);
    if($user) {
        $this->db->where('idUser', $user);
    }
    $this->db->update('domains', $data);
  }

  // D - Delete
  function deleteDomain($id, $user){
    $this->db->where('id', $id);
    if($user) {
        $this->db->where('idUser', $user);
    }
    $this->db->delete('domains');
  }

}