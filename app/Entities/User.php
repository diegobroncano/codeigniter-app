<?php

namespace App\Entities;

use App\Libraries\Token;

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
		$token = new Token;
		$this->token = $token->getValue();
		$this->activation_hash = $token->getHash();
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

	/**
	 * Set user password reset hash and expire time.
	 */
	public function startPasswordReset(): Token
	{
		$token = new Token;

		$this->reset_hash = $token->getHash();
		$this->reset_expires_at = date( 'Y-m-d H:i:s', time() + 7200 ); // Expire in 2 hours

		return $token;
	}
}