<?php

class Migration_create_tuteurExt extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'tuteurId' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'nom' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'prenom' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'entrepriseId'=>array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),			
		));
		$this->dbforge->add_key('tuteurId', TRUE);
		$this->dbforge->create_table('TuteurExt');
	}

	public function down() {
		$this->dbforge->drop_table('TuteurExt');
	}

}