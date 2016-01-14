<?php

class Migration_create_stage extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'stageId' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'etudiantId' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'sujetId' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'tuteurId' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'tuteurExtId'=>array(
				'type' => 'INT',
				'constraint' => 11,
			),			
			'dateDebut' => array(
				'type' => 'DATE',
				),
			'periode' => array(
				'type' => 'INT',
				'constraint' => 11,
				),
		));
		$this->dbforge->add_key('stageId', TRUE);
		$this->dbforge->create_table('Stage');
	}

	public function down() {
		$this->dbforge->drop_table('Stage');
	}

}