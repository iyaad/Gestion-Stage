<?php

class Migration_create_entreprise extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'entrepriseId' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'nomEntreprise'=>array(
				'type'=>'varchar',
				'constraint'=>255,
			),
			'pays'=>array(
				'type'=>'varchar',
				'constraint'=>30,
			),
			'ville'=>array(
				'type'=>'varchar',
				'constraint'=>30,
			),
			'adresse'=>array(
				'type'=>'varchar',
				'constraint'=>255,
			),
			'telephone'=>array(
				'type'=>'varchar',
				'constraint'=>10,
			),
			'Fax'=>array(
				'type'=>'varchar',
				'constraint'=>255,
			),

		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('create_entreprise');
	}

	public function down() {
		$this->dbforge->drop_table('create_entreprise');
	}

}