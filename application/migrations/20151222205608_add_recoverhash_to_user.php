<?php

class Migration_add_recoverhash_to_user extends CI_Migration {

	public function up() {
		$this->dbforge->add_column('User', array(
			'recoverHash' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
			),
		));
	}

	public function down() {
		$this->dbforge->drop_column('User', 'recoverHash');
	}

}