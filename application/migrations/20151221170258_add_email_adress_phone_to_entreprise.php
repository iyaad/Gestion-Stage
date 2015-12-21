<?php

class Migration_add_email_adress_phone_to_entreprise extends CI_Migration {

	public function up() {
		$this->dbforge->add_column('Entreprise', array(
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'NULL' => false,
			),
			'adresse' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'NULL' => false,
			),
			'numTel' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'NULL' => false,
			),
		));
	}

	public function down() {
		$this->dbforge->drop_column('Entreprise', 'email');
		$this->dbforge->drop_column('Entreprise', 'adresse');
		$this->dbforge->drop_column('Entreprise', 'numTel');
	}

}