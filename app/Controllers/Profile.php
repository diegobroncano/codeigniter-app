<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\UserModel;

class Profile extends BaseController
{
	protected User $user;
	protected UserModel $model;

	public function __construct()
	{
		$this->user = service('auth')->getCurrentUser();
		$this->model = new UserModel;
	}

	public function index()
	{
		return view('Profile/index', [ 'user' => $this->user ]);
	}

	public function update()
	{
		$this->user->fill($this->request->getPost());

		if ( !$this->user->hasChanged('email') && !$this->user->hasChanged('name') && !$this->user->hasChanged('last_name') ) {
			return redirect()->to('/profile')
				->with('warning', 'Nothing to update.');
		}

		if ( $this->model->save($this->user) ) {
			return redirect()->to('/profile')
				->with('success', 'Information updated.');
		} else {
			return redirect()->to('/profile')
				->with( 'error', $this->model->errors() )
				->withInput();
		}
	}

	public function updatePassword()
	{
		if ( !$this->user->verifyPassword( $this->request->getPost('curr_pass') ) ) {
			return redirect()->to('/profile')
				->with('error', 'Incorrect current password.');
		}


		$this->user->fill( $this->request->getPost() );

		if ( $this->model->save($this->user) ) {
			return redirect()->to('/profile')
				->with('success', 'Password updated.');
		} else {
			return redirect()->to('/profile')
				->with( 'error', $this->model->errors() );
		}
	}

	public function image()
	{
		return view('Profile/image');
	}
}