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
}