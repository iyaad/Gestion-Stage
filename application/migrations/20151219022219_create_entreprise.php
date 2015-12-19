<?php

class Migration_create_entreprise extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'entrepriseId' => array(
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			),
			'nom'=>array(
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
			'fax'=>array(
				'type'=>'varchar',
				'constraint'=>255,
			),
		));
		$this->dbforge->add_key('entrepriseId', TRUE);
		$this->dbforge->create_table('Entreprise');
	}

	public function down() {
		$this->dbforge->drop_table('Entreprise');
	}

}