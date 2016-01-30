<?php

class Migration_delete_column_filiere extends CI_Migration {

	public function up() {
		$this->dbforge->drop_column('Tuteur', 'filiere');


	}

	public function down() {
		$this->dbforge->add_column('Tuteur', array(
			'filiere' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'NULL' => false,
			),
		));
	}

}