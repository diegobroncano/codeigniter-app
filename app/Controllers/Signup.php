<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\UserModel;

class Signup extends BaseController
{
	public function index()
	{
		return view('Signup/index');
	}

	public function create()
	{
		$user = new User($this->request->getPost());
		$user->startActivation();

		$model = new UserModel();

		if ( $model->insert($user) ) {
			return redirect()->to('/')
				->with('success', ['Your account has been created successfully!']);
		} else {
			return redirect()->to('/signup')
				->with('error', $model->errors())
				->withInput();
		}

	}
}