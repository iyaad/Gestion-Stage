<?php

class Migration_add_location_to_etudiant extends CI_Migration {

	public function up() {
		$this->dbforge->add_column('Etudiant', array(
			'ville' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
			'pays' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
		));
	}

	public function down() {
		$this->dbforge->drop_column('Etudiant', 'ville');
		$this->dbforge->drop_column('Etudiant', 'pays');
	}

}