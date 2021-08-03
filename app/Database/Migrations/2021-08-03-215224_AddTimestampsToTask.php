<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimestampsToTask extends Migration
{
	public function up()
	{
		$this->forge->addColumn( 'tasks', array(
			'created_at' => array(
				'type'		=> 'DATETIME',
				'null'		=> true,
				'after'		=> 'description'
			),
			'updated_at' => array(
				'type'		=> 'DATETIME',
				'null'		=> true,
				'after'		=> 'created_at'
			)
		) );

		// Add CURRENT_TIMESTAMP as default value
		$this->db->query("ALTER TABLE `tasks` MODIFY `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL");
		$this->db->query("ALTER TABLE `tasks` MODIFY `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL");
	}

	public function down()
	{
		$this->forge->dropColumn('tasks', 'created_at');
		$this->forge->dropColumn('tasks', 'updated_at');
	}
}
