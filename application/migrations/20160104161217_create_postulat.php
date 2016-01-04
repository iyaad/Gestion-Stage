<?php

class Migration_create_postulat extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'sujetId' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'etudiantId' => array(
				'type' => 'INT',
				'constraint' => '11',
			),
			'etat' => array(
				'type' => 'VARCHAR',
				'constraint' => '1',
			),
		));
		$this->dbforge->add_key(array("sujetId","etudiantId"), TRUE);
		$this->dbforge->create_table('Postulat');
	}

	public function down() {
		$this->dbforge->drop_table('Postulat');
	}

}