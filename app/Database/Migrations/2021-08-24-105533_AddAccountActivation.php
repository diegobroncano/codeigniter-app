<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAccountActivation extends Migration
{
	public function up()
	{
		$this->forge->addColumn('users', [
			'activation_hash'	=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> 64,
				'unique'		=> true
			],
			'is_active'			=> [
				'type'			=> 'BOOLEAN',
				'null'			=> false,
				'default'		=> false
			]
		]);
	}

	public function down()
	{
		$this->forge->dropColumn('users', 'activation_hash');
		$this->forge->dropColumn('users', 'is_active');
	}
}
