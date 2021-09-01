<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageToUser extends Migration
{
	public function up()
	{
		$this->forge->addColumn('users', [
			'profile_image'	=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 128,
				'null'			=> true,
				'default'		=> null
			]
		]);
	}

	public function down()
	{
		$this->forge->dropColumn('users', 'profile_image');
	}
}
