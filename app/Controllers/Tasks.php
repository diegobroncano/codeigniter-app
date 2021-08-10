<?php


namespace App\Controllers;

use \App\Entities\Task;

class Tasks extends BaseController
{
	private $model;

	public function __construct()
	{
		$this->model = new \App\Models\TaskModel;
	}

	public function index()
	{
		$data_to_view = $this->model->findAll();

		return view("Tasks/index", ['tasks' => $data_to_view]);
	}

	public function new()
	{
		$task = new Task;

		return view("Tasks/new", ['task' => $task]);
	}

	public function create()
	{
		$task = new Task($this->request->getPost());

		if ( $this->model->insert($task) ) {
			return redirect()->to('/tasks')
				->with('success', ['Task added successfully']);
		} else {
			return redirect()->to('/tasks/new')
				->with('error', $this->model->errors());
		}
	}

	public function show($id)
	{
		$task = $this->model->find($id);

		if ( is_null($task) ) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Task with id $id not found.");
		}

		return view( "Tasks/show", ['task' => $task] );
	}

	public function update($id)
	{
		$task = new Task($this->request->getPost());

		$task->id = $id;

		if ( $this->model->save($task) ) {
			return redirect()->to('/tasks/show/'.$id)
				->with('success', ['Task updated successfully']);
		} else {
			return redirect()->to('/tasks/show/'.$id)
				->with('error', $this->model->errors())
				->withInput();
		}
	}
}