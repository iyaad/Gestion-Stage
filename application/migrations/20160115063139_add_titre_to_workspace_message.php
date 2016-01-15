<?php

class Migration_add_titre_to_workspace_message extends CI_Migration {

	public function up() {
		$this->dbforge->add_column('Message', array(
			'titre' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'NULL' => false,
			),
		));
	}

	public function down() {
		$this->dbforge->drop_column('Message', 'titre');
	}

}