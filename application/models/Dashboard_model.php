<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

  function addDomain($data){
    $this->db->insert('domains', $data);
  }

  function getService($user, $date=FALSE){
    
    $this->db->select('*');
    $this->db->from('domains');
    if($user) {
      $this->db->where('idUser', $user);
    }
    if($date) {
      //$this->db->where('YEAR(`renewal`)', 'YEAR(CURRENT_DATE + INTERVAL 1 MONTH)', FALSE);
      //$this->db->where('MONTH(`renewal`)', 'MONTH(CURRENT_DATE + INTERVAL 1 MONTH)', FALSE);
      $this->db->where('YEAR(`renewal`)', 'YEAR(CURRENT_DATE)', FALSE);
      $this->db->where('MONTH(`renewal`)', 'MONTH(CURRENT_DATE)', FALSE);
    }

    $query = $this->db->get();

    //echo '<pre>', var_dump($query), '</pre>';
    //die();
    
    if($query->num_rows() > 0){ // chiamo il metodo num_rows per controllare se è presente almeno una riga
      foreach ($query->result() as $row){ // il metodo result() mi torna l'array dei risultati
          $data[] = $row;
      }
      return $data;
    }
  }

}