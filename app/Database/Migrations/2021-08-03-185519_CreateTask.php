<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTask extends Migration
{
	public function up()
	{
		$this->forge->addField( array(
			'id' => array(
				'type'				=> 'INT',
				'constraint'		=> 5,
				'unsigned'			=> true,
				'auto_increment'	=> true
			),
			'description' => array(
				'type'	=> 'TEXT'
			)
		) );

		$this->forge->addPrimaryKey('id');

		$this->forge->createTable('tasks');
	}

	public function down()
	{
		$this->forge->dropTable('tasks');
	}
}
