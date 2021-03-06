<?php


namespace App\Models;


use App\Entities\User;
use App\Libraries\Token;

class UserModel extends \CodeIgniter\Model
{
	protected $table = 'users';
	protected $primaryKey = 'id';

	protected $useAutoIncrement = true;

	protected $returnType = 'App\Entities\User';

	protected $allowedFields = ['email', 'name', 'password', 'last_name', 'role', 'activation_hash'];

	protected $useTimestamps = true;

	protected $validationRules = [
		'email'			=> 'required|valid_email|is_unique[users.email]',
		'name'			=> 'required',
		'password'		=> 'required|min_length[6]',
		'pass_confirm'	=> 'required_with[password]|matches[password]'
	];
	protected $validationMessages = [
		'email' => [
			'required'		=> 'You must enter an email.',
			'valid_email'	=> 'That email does not seem valid.',
			'is_unique'		=> 'That email is already registered, try logging in!'
		],
		'name' => [
			'required'		=> 'You must enter your name.'
		],
		'password' => [
			'required'		=> 'You must enter a password.',
			'min_length'	=> 'The password has to be at least 6 characters long.'
		],
		'pass_confirm'		=> [
			'required_with'	=> 'Please, type your password twice to confirm it.',
			'matches'		=> 'The passwords are not the same.'
		]
	];

	protected $beforeInsert = ['hashPassword', 'checkRole', 'cleanFields'];
	protected $beforeUpdate = ['hashPassword', 'checkRole', 'cleanFields'];

	protected function hashPassword(array $data): array
	{
		if ( isset($data['data']['password']) ) {

			$data['data']['password_hash'] = password_hash( $data['data']['password'], PASSWORD_DEFAULT );

			unset($data['data']['password']);

		}

		return $data;
	}

	/**
	 * Check if user can modify roles and validate it.
	 *
	 * @param array $data
	 *
	 * @return array
	 */
	protected function checkRole(array $data): array
	{
		if ( isset($data['data']['role']) ) {

			// Check if current user can edit roles.
			if ( service('auth')->currentAdmin() ) {

				// Validate role
				if ( !array_key_exists( $data['data']['role'], service('auth')->getRoles() ) ) {
					unset($data['data']['role']);
				}

			} else {

				unset($data['data']['role']);

			}

		}

		return $data;
	}

	/**
	 * Prevent mysqli exceptions, cleaning data that cannot be recorded in the db.
	 * Checks every data provided and compare to column names.
	 *
	 * @param array $data
	 *
	 * @return array
	 */
	protected function cleanFields(array $data): array
	{
		$fields = $this->db->getFieldNames('users');

		foreach ($data['data'] as $data_key => $new_data) {
			if ( !in_array( $data_key, $fields ) ) {
				unset($data['data'][$data_key]);
			}
		}

		return $data;
	}

	public function findByEmail(string $email): ?object
	{
		return $this->where('email', $email)
			->first();
	}

	public function findByResetToken(string $token): ?object
	{
		$token = new Token($token);

		$user = $this->where( 'reset_hash', $token->getHash() )
			->first();

		if ( $user && strtotime($user->reset_expires_at) > time() ) {
			return $user;
		}
		return null;
	}

	public function updateWithoutPassword(User $user): bool
	{
		// Remove password validation
		$previous_rules = $this->validationRules;
		unset($this->validationRules['password']);

		// Execute unprotected update if user is admin
		if ( service('auth')->currentAdmin() ) {
			unset($user->save);
			$return = $this->protect(false)
				->save($user);
		} else {
			$return = $this->save($user);
		}

		// Recover password validation
		$this->validationRules = $previous_rules;

		// Return query result
		return $return;
	}
}