<?php


namespace App\Models;


class TaskModel extends \CodeIgniter\Model
{
	protected $table = 'tasks';
	protected $primaryKey = 'id';

	protected $useAutoIncrement = true;

	protected $returnType    = 'App\Entities\Task';

	protected $allowedFields = ['description'];

	protected $validationRules    = ['description' => 'required'];
	protected $validationMessages = [
		'description' => [
			'required' => 'Your task needs a description!'
		]
	];
}