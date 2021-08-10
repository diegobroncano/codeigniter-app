<?php


namespace App\Controllers;

use \App\Models\TaskModel;
use \App\Entities\Task;

class Tasks extends BaseController
{
	public function index()
	{
		$model = new TaskModel;
		$data_to_view = $model->findAll();

		return view("Tasks/index", ['tasks' => $data_to_view]);
	}

	public function new()
	{
		$task = new Task;

		return view("Tasks/new", ['task' => $task]);
	}

	public function create()
	{
		$model = new TaskModel;

		$task = new Task($this->request->getPost());

		if ( $model->insert($task) ) {
			return redirect()->to('/tasks')
				->with('success', ['Task added successfully']);
		} else {
			return redirect()->to('/tasks/new')
				->with('error', $model->errors());
		}
	}

	public function show($id)
	{
		$model = new TaskModel;

		$task = $model->find($id);

		return view( "Tasks/show", ['task' => $task] );
	}

	public function update($id)
	{
		$model = new TaskModel;

		$task = new Task($this->request->getPost());

		$task->id = $id;

		if ( $model->save($task) ) {
			return redirect()->to('/tasks/show/'.$id)
				->with('success', ['Task updated successfully']);
		} else {
			return redirect()->to('/tasks/show/'.$id)
				->with('error', $model->errors())
				->withInput();
		}
	}
}