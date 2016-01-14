<?php

class Migration_add_date_and_period_to_sujet extends CI_Migration {

	public function up() {
		$this->dbforge->add_column('Sujet', array(
			'dateDebut' => array(
				'type' => 'DATE',
				'NULL' => FALSE,
			),
			'periode' => array(
				'type' => 'INT',
				'constraint' => 11,
				'NULL' => FALSE,
			),
		));
	}

	public function down() {
		$this->dbforge->drop_column('Sujet', 'dateDebut');
		$this->dbforge->drop_column('Sujet', 'periode');
	}

}