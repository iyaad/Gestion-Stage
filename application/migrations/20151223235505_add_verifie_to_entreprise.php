<?php

class Migration_add_verifie_to_entreprise extends CI_Migration {

	public function up() {
		$this->dbforge->add_column('Entreprise', array(
			'verifie' => array(
				'type' => 'TINYINT',
				'default' => false,
				'NULL' => true,
			)
		));
	}

	public function down() {
		$this->dbforge->drop_colum('Entreprise', 'verifie');
	}

}