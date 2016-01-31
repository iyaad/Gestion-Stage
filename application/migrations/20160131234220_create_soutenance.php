<?php

class Migration_create_soutenance extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'soutenanceId' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'juryId' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'stageId' => array(
				'type' => 'INT',
				'constraint' => 11,
			)
		));
		$this->dbforge->add_key('soutenanceId', TRUE);
		$this->dbforge->create_table('Soutenance');
	}

	public function down() {
		$this->dbforge->drop_table('Soutenance');
	}

}