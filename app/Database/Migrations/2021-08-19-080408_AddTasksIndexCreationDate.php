<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTasksIndexCreationDate extends Migration
{
	public function up()
	{
		$this->db->query('ALTER TABLE tasks ADD INDEX (created_at)');
	}

	public function down()
	{
		$this->db->query('ALTER TABLE tasks DROP INDEX created_at');
	}
}
