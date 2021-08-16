<?php


namespace App\Models;


class UserModel extends \CodeIgniter\Model
{
	protected $table = 'users';
	protected $primaryKey = 'id';

	protected $useAutoIncrement = true;

	protected $returnType = 'App\Entities\User';

	protected $allowedFields = ['email', 'name', 'password'];

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

	protected $beforeInsert = ['hashPassword'];

	protected function hashPassword(array $data): array
	{
		if ( isset($data['data']['password']) ) {

			$data['data']['password_hash'] = password_hash( $data['data']['password'], PASSWORD_DEFAULT );

			unset($data['data']['password']);

		}

		return $data;
	}

	public function findByEmail(string $email): ?object
	{
		return $this->where('email', $email)
			->first();
	}
}