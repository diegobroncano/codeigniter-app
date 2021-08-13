<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
{
	public function up()
	{
		$this->forge->addField(array(
			'id'	=> [
				'type'				=> 'INT',
				'constraint'		=> 5,
				'unsigned'			=> true,
				'auto_increment'	=> true
			],
			'email'	=> [
				'type'				=> 'VARCHAR',
				'constraint'		=> 255,
				'unique'			=> true,
				'null'				=> false
			],
			'password_hash' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 255,
				'null'				=> false
			],
			'name' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 100
			],
			'last_name' => [
				'type'				=> 'VARCHAR',
				'constraint'		=> 255,
				'null'				=> true
			],
			'created_at' => [
				'type'				=> 'DATETIME'
			],
			'updated_at' => [
				'type'				=> 'DATETIME'
			]
		));

		$this->forge->addPrimaryKey('id');

		$this->forge->createTable('users');

		// Add CURRENT_TIMESTAMP as default value
		$this->db->query("ALTER TABLE `users` MODIFY `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL");
		$this->db->query("ALTER TABLE `users` MODIFY `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL");
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
