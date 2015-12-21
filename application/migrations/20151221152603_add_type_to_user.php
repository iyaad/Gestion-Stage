<?php

class Migration_add_type_to_user extends CI_Migration {

	public function up() {
		$this->dbforge->add_column('User', array(
			'role' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'NULL' => false,
			),
		));
	}

	public function down() {
		$this->dbforge->drop_column('User', 'role');
	}

}