<?php


namespace App\Controllers;


class Tasks extends BaseController
{
	public function index() {
		$data_to_view = array(
			['id' => 1, 'description' => 'First task'],
			['id' => 2, 'description' => 'Second example task']
		);

		return view("Tasks/index", ['tasks' => $data_to_view]);
	}
}