<?php

class Migration_create_users extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'userId' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'numTel' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
			'adresse' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
		));
		$this->dbforge->add_key('userId', TRUE);
		$this->dbforge->create_table('User');
	}

	public function down() {
		$this->dbforge->drop_table('User');
	}

}