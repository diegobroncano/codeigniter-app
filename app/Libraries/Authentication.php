<?php

namespace App\Libraries;

use App\Entities\User;
use App\Models\UserModel;

class Authentication
{
	private ?object $user = null;

	private array $roles;

	public function __construct()
	{
		$this->roles = array(
			'admin' => 'Administrator',
			'subscriber' => 'Subscriber'
		);
	}

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

		if ( !$user->verifyPassword($password) ) {
			return false;
		}

		if ( !$user->is_active ) {
			session()->setFlashdata('account_activated', false);
			return false;
		}

		$session = session();
		$session->regenerate();
		$session->user_id = $user->id;

		return true;
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
		if ( !session()->has('user_id') ) {
			return null;
		}

		if ( !isset($this->user) ) {

			$model = new UserModel();
			$user = $model->find( session()->get('user_id') );

			// Check if user is active to save it.
			if ($user && $user->is_active) {
				$this->user = $user;
			}

		}

		return $this->user;
	}

	public function isLoggedIn(): bool
	{
		return !is_null( $this->getCurrentUser() );
	}

	/**
	 * Check if current user has an admin role.
	 *
	 * @return bool
	 */
	public function currentAdmin(): bool
	{
		if ( $this->isLoggedIn() ) {
			return $this->getCurrentUser()->role === 'admin';
		}
		return false;
 	}

 	public function getRoles(): array
	{
		return $this->roles;
	}

	/**
	 * Activate an account by its token.
	 *
	 * @param string $token Activation token
	 *
	 * @return bool
	 */
	public function activateByToken(string $token): bool
	{
		$token_hash = hash_hmac( 'sha256', $token, getenv('encryption.verificationKey') );

		$model = new UserModel();
		$user = $model->where('activation_hash', $token_hash)
			->first();

		if ($user) {
			$user->activate();
			return $model->protect(false)
				->save($user);
		}
		return false;
	}
}