<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminders_model extends CI_Model {

  // estraggo l'elenco dei servizi scaduti in stato non pagato)
  function getService($user, $exired=FALSE){
    
    $this->db->select('*');
    $this->db->from('domains');
    if($user) {
      $this->db->where('idUser', $user);
    }
    if($exired) {
      $this->db->where('YEAR(`renewal`)', 'YEAR(CURRENT_DATE - INTERVAL 1 MONTH)', FALSE);
      $this->db->where('MONTH(`renewal`)', 'MONTH(CURRENT_DATE - INTERVAL 1 MONTH)', FALSE);
      $this->db->where('`pay`', 1, FALSE);
    }else{
      $this->db->where('YEAR(`renewal`)', 'YEAR(CURRENT_DATE + INTERVAL 1 MONTH)', FALSE);
      $this->db->where('MONTH(`renewal`)', 'MONTH(CURRENT_DATE + INTERVAL 1 MONTH)', FALSE);
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

  function updateRenewal(){    
    $this->db->query( "UPDATE domains SET pay = 0, renewal = DATE_ADD(renewal, INTERVAL 1 YEAR) WHERE YEAR(`renewal`) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(`renewal`) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)");
  
    $data = array(
      'pay' => 1,
    );
    $this->db->where('YEAR(`renewal`)', 'YEAR(CURRENT_DATE + INTERVAL 1 MONTH)', FALSE);
    $this->db->where('MONTH(`renewal`)', 'MONTH(CURRENT_DATE + INTERVAL 1 MONTH)', FALSE);
    $this->db->update('domains', $data);
  }

}