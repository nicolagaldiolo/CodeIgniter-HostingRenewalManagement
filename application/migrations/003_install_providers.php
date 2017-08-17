<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_providers extends CI_Migration {

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
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
      ),
      'label' => array(
        'type' => 'VARCHAR',
        'constraint' => '40',
      ),
      'website' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
      )
    ));

    $this->dbforge->add_key('id', TRUE);  
    $this->dbforge->create_table('providers');
  }

  public function down(){
    $this->load->dbforge();  
    $this->dbforge->drop_table('providers');
  }

}