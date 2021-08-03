<?php


namespace App\Controllers;


class Tasks extends BaseController
{
	public function index()
	{
		$model = new \App\Models\TaskModel;
		$data_to_view = $model->findAll();


		return view("Tasks/index", ['tasks' => $data_to_view]);
	}
}