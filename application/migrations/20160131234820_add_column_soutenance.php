<?php

class Migration_add_column_soutenance extends CI_Migration {

	public function up() {
		$this->dbforge->add_column('Soutenance',array(
			'dateSoutenance' => array(
				'type' => 'DATE',
				'NULL' => false,
			),
		));
	}

	public function down() {
		$this->dbforge->drop_column('Soutenance', 'dateSoutenance');
	}

}