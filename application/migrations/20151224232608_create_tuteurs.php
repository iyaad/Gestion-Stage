<?php

class Migration_create_tuteurs extends CI_Migration {

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
			'filiere' => array(
				'type' => 'VARCHAR',
				'constraint' => 4,
			),
			'departement' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'NULL' => TRUE,
			),
			'chefId' => array(
				'type' => 'INT',
				'constraint' => 11,
				'NULL' => TRUE,
			),
		));
		$this->dbforge->add_key('tuteurId', TRUE);
		$this->dbforge->create_table('Tuteur');
	}

	public function down() {
		$this->dbforge->drop_table('Tuteur');
	}

}