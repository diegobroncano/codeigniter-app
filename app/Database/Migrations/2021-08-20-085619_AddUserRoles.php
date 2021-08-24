<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserRoles extends Migration
{
	public function up()
	{
		$this->forge->addColumn( 'users', [
			'role' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> 100,
				'null'			=> false,
				'default'		=> 'subscriber'
			]
		] );
	}

	public function down()
	{
		$this->forge->dropColumn('users', 'role');
	}
}
