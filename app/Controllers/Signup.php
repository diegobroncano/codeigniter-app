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

		if ($model->insert($user)) {

			$this->sendActivationEmail($user);

			return redirect()->to('/')
				->with('success', ['Your account has been created successfully! Now, check your email.']);

		} else {

			return redirect()->to('/signup')
				->with('error', $model->errors())
				->withInput();
		}

	}

	public function activate($token)
	{
		if ( service('auth')->activateByToken($token) ) {
			return redirect()->to('/')
				->with('success', 'Account activated successfully! Now, you can log in.');
		} else {
			return redirect()->to('/')
				->with('error', 'That activation token is not valid.');
		}
	}

	/**
	 * Send an activation token to its user
	 *
	 * @param User $user
	 *
	 * @return bool
	 */
	protected function sendActivationEmail(User $user): bool
	{
		$email = service('email');

		$email->setTo($user->email);

		$email->setSubject('Account activation | TaskApp');

		$message = view('Signup/email_activation', [ 'token' => $user->token ]);

		$email->setMessage($message);

		return $email->send();
	}
}