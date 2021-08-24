<?php

namespace App\Controllers\Admin;

use App\Entities\User;
use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class Users extends \App\Controllers\BaseController
{
	private $model;

	public function __construct()
	{
		$this->model = new UserModel();
	}

	public function index(): string
	{
		$users = $this->model->orderBy('id')
			->paginate(5);

		return view('Admin/Users/index', [
			'users'	=> $users,
			'pager'	=> $this->model->pager
		]);
	}

	public function show($id): string
	{
		$user = $this->getUserOr404($id);

		return view( "Admin/Users/show", ['user' => $user] );
	}

	protected function getUserOr404($id): User
	{
		$user = $this->model->where('id', $id)
			->first();

		if ( is_null($user) ) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Task with id $id not found.");
		}

		return $user;
	}

	public function new(): string
	{
		$user = new User();

		return view("Admin/Users/new", ['user' => $user]);
	}

	public function create(): RedirectResponse
	{
		$user = new User($this->request->getPost());

		if ( $this->model->insert($user) ) {
			return redirect()->to('/admin/users')
				->with('success', ['User added successfully']);
		} else {
			return redirect()->to('/admin/users/new')
				->with('error', $this->model->errors())
				->withInput();
		}
	}

	public function update($id): RedirectResponse
	{
		$user = $this->getUserOr404($id);

		$user->fill( $this->request->getPost() );

		if ( !$user->hasChanged('email') && !$user->hasChanged('name') && !$user->hasChanged('last_name') && !$user->hasChanged('role') ) {
			return redirect()->to('admin/users/show/'.$id)
				->with('warning', 'Nothing to update.');
		}

		if ( $this->model->updateWithoutPassword($user) ) {
			return redirect()->to('/admin/users/show/'.$id)
				->with('success', ['User updated successfully']);
		} else {
			return redirect()->to('/admin/users/show/'.$id)
				->with('error', $this->model->errors())
				->withInput();
		}
	}

	public function updatePassword($id): RedirectResponse
	{
		$user = $this->getUserOr404($id);

		$user->fill( $this->request->getPost() );

		if ( $this->model->save($user) ) {
			return redirect()->to('/admin/users/show/'.$id)
				->with('success', ['User password updated successfully']);
		} else {
			return redirect()->to('/admin/users/show/'.$id)
				->with('error', $this->model->errors())
				->withInput();
		}
	}

	public function delete($id): RedirectResponse|string
	{
		$user = $this->getUserOr404($id);

		// If deletion is already confirmed, execute it and redirect to index
		if ( $this->request->getMethod() === 'post' && $this->request->getPost()['confirmation'] === 'Yes') {

			$this->model->delete($id);
			return redirect()->to('/admin/users')
				->with('success', ['User deleted successfully.']);
		}

		return view("Admin/Users/delete", ['user' => $user]);
	}
}