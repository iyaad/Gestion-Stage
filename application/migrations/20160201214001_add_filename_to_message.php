<?php

class Migration_add_filename_to_message extends CI_Migration {

	public function up() {
		$this->dbforge->add_column('Message', array(
			'filename' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'NULL' => TRUE,
			),
		));
	}

	public function down() {
		$this->dbforge->drop_column('Message', 'filename');
	}

}