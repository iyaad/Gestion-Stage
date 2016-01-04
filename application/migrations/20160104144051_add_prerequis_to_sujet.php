<?php

class Migration_add_prerequis_to_sujet extends CI_Migration {

	public function up() {
		$this->dbforge->add_column('Sujet', array(
			'prerequis' => array(
				'type' => 'VARCHAR',
				'constraint' => 500,
			),
		));
	}

	public function down() {
		$this->dbforge->drop_column('Sujet', 'prerequis');
	}

}