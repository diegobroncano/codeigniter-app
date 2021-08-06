<?php


namespace App\Controllers;

use \App\Models\TaskModel;

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
		$task = new \App\Entities\Task;

		return view("Tasks/new", ['task' => $task]);
	}

	public function create()
	{
		$model = new TaskModel;

		$result = $model->insert( ['description' => $this->request->getPost('description')] );

		if ($result) {
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

		$result = $model->update( $id, ['description' => $this->request->getPost('description')] );

		if ($result) {
			return redirect()->to('/tasks/show/'.$id)
				->with('success', ['Task updated successfully']);
		} else {
			return redirect()->to('/tasks/show/'.$id)
				->with('error', $model->errors())
				->withInput();
		}
	}
}