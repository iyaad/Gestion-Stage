<?php

class Migration_create_message_table extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'StageId' => array(
				'type' => 'INT',
				'constraint' => 11,
				
			),
			'messageId' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'message' => array(
				'type' => 'VARCHAR',
				'constraint' => 2000,
			),
			'expediteur' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'destinataire' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'date' => array(
				'type' => 'DATETIME',
				'NULL' => FALSE,
			),
		));
		$this->dbforge->add_key('messageId', TRUE);
		$this->dbforge->create_table('Message');
	}

	public function down() {
		$this->dbforge->drop_table('Message');
	}

}