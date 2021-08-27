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
}