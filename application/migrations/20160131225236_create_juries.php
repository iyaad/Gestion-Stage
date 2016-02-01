<?php

class Migration_create_juries extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'juryId' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'tuteur1Id' => array(
				'type' => 'INT',
				'constraint' => 11,
				
			),
			'tuteur2Id' => array(
				'type' => 'INT',
				'constraint' => 11,
				
			),
			'tuteur3Id' => array(
				'type' => 'INT',
				'constraint' => 11,
				
			),
		));
		$this->dbforge->add_key('juryId', TRUE);
		$this->dbforge->create_table('Jury');
	}

	public function down() {
		$this->dbforge->drop_table('Jury');
	}

}