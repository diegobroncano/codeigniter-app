<?php


namespace App\Controllers;

use \App\Models\TaskModel;
use \App\Entities\Task;
use CodeIgniter\HTTP\RedirectResponse;

class Tasks extends BaseController
{
	private TaskModel $model;

	public function __construct()
	{
		$this->model = new TaskModel;
	}

	public function index(): string
	{
		$data_to_view = $this->model->findAll();

		return view("Tasks/index", ['tasks' => $data_to_view]);
	}

	public function new(): string
	{
		$task = new Task;

		return view("Tasks/new", ['task' => $task]);
	}

	public function create(): RedirectResponse
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

	public function show($id): string
	{
		$task = $this->getTaskOr404($id);

		return view( "Tasks/show", ['task' => $task] );
	}

	public function update($id): RedirectResponse
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

	public function delete($id): RedirectResponse|string
	{
		$task = $this->getTaskOr404($id);

		// If deletion is already confirmed, execute it and redirect to index
		if ( $this->request->getMethod() === 'post' && $this->request->getPost()['confirmation'] === 'Yes') {

			$this->model->delete($id);
			return redirect()->to('/tasks')
				->with('success', ['Task deleted successfully']);
		}

		return view("Tasks/delete", ['task' => $task]);
	}

	protected function getTaskOr404($id): object
	{
		$task = $this->model->find($id);

		if ( is_null($task) ) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Task with id $id not found.");
		}

		return $task;
	}
}