<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Login extends BaseController
{

	public function index(): string
	{
		return view('Login/index');
	}

	public function create(): RedirectResponse
	{
		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');

		if ( service('auth')->login($email, $password) ) {
			return redirect()->to('/')
					->with('success', ["Welcome " . current_user()->name]);
		} else {
			return redirect()->to('/login')
				->with('error', ['Email and password combination don\'t match.'])
				->withInput();
		}
	}

	public function delete(): RedirectResponse
	{
		service('auth')->logout();
		return redirect()->to('/login/after-delete');
	}

	public function after_delete(): RedirectResponse
	{
		return redirect()->to('/')
			->with('info', ['You have logged out.']);
	}
}