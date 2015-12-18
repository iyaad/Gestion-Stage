<?php

class Migration_create_etudiants extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'etudiantId' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'cne' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'nom' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'prenom' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'filiere' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'niveau' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'dateNaissance' => array(
				'type' => 'DATE',
			),
			'createdAt' => array(
				'type' => 'DATETIME',
			),
			'updatedAt' => array(
				'type' => 'DATETIME',
			),
		));
		$this->dbforge->add_key('etudiantId', TRUE);
		$this->dbforge->create_table('Etudiant');
	}

	public function down() {
		$this->dbforge->drop_table('Etudiant');
	}

}