<?php

class Migration_add_tuteurId_to_sujet extends CI_Migration {

	public function up() {
		$this->dbforge->add_column('Sujet', array(
			'tuteurId' => array(
				'type' => 'INT',
				'constraint' => 11,
				'NULL' => FALSE,
			),
		));
	}

	public function down() {
		$this->dbforge->drop_column('Sujet', 'tuteurId');
	}

}