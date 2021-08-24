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
			return redirect()->to( $this->getRedirectUrl() )
					->with('success', ["Welcome " . current_user()->name]);
		} else {

			if ( !session()->getFlashdata('account_activated') ) {
				return redirect()->to('/login')
				->with('error', ['Your account is not activated, please check your inbox.'])
				->withInput();
			}

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

	/**
	 * Return and unset redirect url from session.
	 *
	 * @return string Redirect url
	 */
	protected function getRedirectUrl(): string
	{
		$redirect_url = session('redirect_url') ?? site_url();
		session()->remove('redirect_url');
		return $redirect_url;
	}
}