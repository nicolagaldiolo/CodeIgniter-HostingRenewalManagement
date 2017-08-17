<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_domains extends CI_Migration {

  public function up(){
    $this->load->dbforge();
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'idUser' => array(
        'type' => 'INT',
        'constraint' => 11,
      ),
      'url' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
      ),
      'domain' => array(
        'type' => 'INT',
        'constraint' => 11,
      ),
      'hosting' => array(
        'type' => 'INT',
        'constraint' => 11,
      ),
      'renewal' => array(
        'type' => 'DATE',
      ),
      'pay' => array(
        'type' => 'INT',
        'constraint' => 1,
      ),
      'fee' => array(
        'type' => 'DECIMAL',
        'constraint' => "10,2",
      ),
      'note' => array(
        'type' => 'TEXT',
      ),
      'createdAT' => array(
        'type' => 'TIMESTAMP',
        'on_update' => ''
      )
    ));

    $this->dbforge->add_key('id', TRUE);  
    $this->dbforge->create_table('domains');
  }

  public function down(){
    $this->load->dbforge();  
    $this->dbforge->drop_table('domains');
  }

}