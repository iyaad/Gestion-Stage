<?php

class Migration_add_timestamps_to_users_table extends CI_Migration {

	public function up() {
		$this->dbforge->add_column('User', array(
			'createdAt' => array(
				'type' => 'DATETIME',
				'NULL' => FALSE,
				),
			'updatedAt' => array(
				'type' => 'DATETIME',
				'NULL' => FALSE,
				),
		));
	}

	public function down() {
		$this->dbforge->drop_column('User', 'createdAt');
		$this->dbforge->drop_column('User', 'updatedAt');
	}

}