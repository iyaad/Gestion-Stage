<?php

class Migration_add_description_to_entreprise extends CI_Migration {

	public function up() {
		$this->dbforge->add_column('Entreprise', array(
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
		));
	}

	public function down() {
		$this->dbforge->drop_column('Entreprise', 'description');
	}

}