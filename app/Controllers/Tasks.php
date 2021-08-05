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

	public function show($id)
	{
		$model = new TaskModel;

		$task = $model->find($id);

		return view( "Tasks/show", ['task' => $task] );
	}

	public function new()
	{
		return view("Tasks/new");
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
}