<?php

namespace App\Entities;

/**
 * @property string password_hash User password hash
 */
class User extends \CodeIgniter\Entity\Entity
{
	public function verifyPassword($password): bool
	{
		return password_verify($password, $this->password_hash);
	}

	public function startActivation()
	{
		$this->token = bin2hex( random_bytes(16) );
		$this->activation_hash = hash_hmac( 'sha256', $this->token, getenv('encryption.verificationKey') );
	}

	/**
	 * Change user activation status to activate.
	 * Set is_active to true and remove activation_hash.
	 */
	public function activate(): void
	{
		$this->is_active = true;
		$this->activation_hash = null;
	}
}