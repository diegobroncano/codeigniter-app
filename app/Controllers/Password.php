<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\UserModel;

class Password extends BaseController
{
	public function forgot()
	{
		return view("Password/forgot");
	}

	public function processForgot()
	{
		$model = new UserModel();
		$user = $model->findByEmail( $this->request->getPost('email') );

		if ($user && $user->is_active) {

			$token = $user->startPasswordReset();
			$model->protect(false)->save($user);

			$this->sendResetEmail( $user, $token->getValue() );

			return redirect()->to('/')
				->with('success', 'We have sent a password reset link to your email.');
		} else {
			return redirect()->to('/password/forgot')
				->with('error', 'No active user found with that email.')
				->withInput();
		}
	}


	/**
	 * Send a password reset token to its user
	 *
	 * @param User $user
	 * @param string $token Reset token
	 *
	 * @return bool
	 */
	protected function sendResetEmail(User $user, string $token): bool
	{
		$email = service('email');

		$email->setTo($user->email);

		$email->setSubject('Password reset | TaskApp');

		$message = view('Password/email_reset', [ 'token' => $token ]);

		$email->setMessage($message);

		return $email->send();
	}
}