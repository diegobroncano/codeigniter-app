<?php


namespace App\Models;


class TaskModel extends \CodeIgniter\Model
{
	protected $table = 'tasks';
	protected $primaryKey = 'id';

	protected $useAutoIncrement = true;

	protected $returnType    = 'App\Entities\Task';

	protected $allowedFields = ['description', 'user_id'];

	protected $useTimestamps = true;

	protected $validationRules    = ['description' => 'required'];
	protected $validationMessages = [
		'description' => [
			'required' => 'Your task needs a description!'
		]
	];

	/**
	 * Search in database all recorded tasks assigned to a user.
	 *
	 * @param int $id User ID
	 *
	 * @return array User's tasks
	 */
	public function getTasksByUserId(int $id): array
	{
		return $this->where('user_id', $id)
			->findAll();
	}

	public function getTaskWithUser(int $task_id, int $user_id): ?object
	{
		return $this->where('id', $task_id)
			->where('user_id', $user_id)
			->first();
	}
}