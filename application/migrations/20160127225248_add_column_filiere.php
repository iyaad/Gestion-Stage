<?php

class Migration_add_column_filiere extends CI_Migration {

	public function up() {
		$this->dbforge->add_column('Filiere', array(
			'filiereId' => array(
				'type' => 'INT',
				'constraint' => 11,
				'NULL' => false,
				'auto_increment' => TRUE
			),
		));
		$this->dbforge->add_key("FiliereId", TRUE);
	}

	public function down() {
		$this->dbforge->drop_column('Filiere', 'FiliereId');
	}

}