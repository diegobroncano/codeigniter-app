<?php

namespace App\Libraries;

use App\Entities\User;
use App\Models\UserModel;

class Authentication
{
	private object $user;

	/**
	 * Log user into app given its credentials.
	 *
	 * @param $email string User email
	 * @param $password string User Password
	 * @return bool If logging was successful
	 */
	public function login(string $email, string $password): bool
	{
		$model = new UserModel();
		$user = $model->findByEmail($email);

		if ( is_null($user) ) {
			return false;
		}

		if ( $user->verifyPassword($password) ) {
			$session = session();
			$session->regenerate();
			$session->user_id = $user->id;

			return true;
		} else {
			return false;
		}
	}

	/**
	 * Log out from app.
	 *
	 * @return void
	 */
	public function logout(): void
	{
		session()->destroy();
	}

	/**
	 * Return current user entity.
	 *
	 * @return object|null Current user or null if there is not.
	 */
	public function getCurrentUser(): ?object
	{
		if ( !$this->isLoggedIn() ) {
			return null;
		}

		if ( !isset($this->user) ) {
			$model = new UserModel();
			$this->user = $model->find( session()->get('user_id') );
		}

		return $this->user;
	}

	public function isLoggedIn(): bool
	{
		return session()->has('user_id');
	}
}