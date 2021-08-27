<?php

namespace App\Libraries;

class Token
{
	protected string $token;

	public function __construct(?string $token = null) {
		if ( is_null($token) ) {

			$this->token = bin2hex( random_bytes(16) );

		} else {

			$this->token = $token;

		}
	}

	public function getValue(): string
	{
		return $this->token;
	}

	public function getHash(): string
	{
		return hash_hmac( 'sha256', $this->token, getenv('encryption.verificationKey') );
	}
}