<?php

class Migration_add_nbplaces_to_sujet extends CI_Migration {

	public function up() {
		$this->dbforge->add_column('Sujet', array(
			'nbPlaces' => array(
				'type' => 'INT',
				'constraint' => 11,
				'NULL' => false,
			)
		));
	}

	public function down() {
		$this->dbforge->drop_column('Sujet', 'nbPlaces');
	}

}