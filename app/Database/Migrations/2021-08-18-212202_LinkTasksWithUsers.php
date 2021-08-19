<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LinkTasksWithUsers extends Migration
{
	public function up()
	{
		$this->forge->addColumn('tasks', [
			'user_id' => [
				'type'			=> 'INT',
				'constraint'	=> 5,
				'unsigned'		=> true,
				'after'			=> 'id'
			],
			'CONSTRAINT tasks_user_id_fk FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE'
		]);
	}

	public function down()
	{
		$this->forge->dropColumn( 'tasks', 'user_id' );
	}
}
