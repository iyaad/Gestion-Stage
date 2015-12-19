<?php

class Migration_create_sujet extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'sujetId' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'titre' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 2000,
			),
			'niveau' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'filiere' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'entrepriseId' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),

		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('create_sujet');
	}

	public function down() {
		$this->dbforge->drop_table('create_sujet');
	}

}