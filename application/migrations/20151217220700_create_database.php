<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Database extends CI_Migration {
	
	public function up()
	{
		if ($this->dbforge->create_database('stages'))
		{
			echo 'Database "stages" created!';
		}
	}

	public function down()
	{
		if ($this->dbforge->drop_database('stages'))
		{
			echo 'Database "stages" deleted!';
		}
	}
}