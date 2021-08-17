<?php

namespace App\Filters;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LoginFilter implements \CodeIgniter\Filters\FilterInterface
{
	/**
	 * @inheritDoc
	 */
	public function before(RequestInterface $request, $arguments = null)
	{
		if ( !service('auth')->isLoggedIn() ) {

			session()->set( 'redirect_url', current_url() );

			return redirect()->to('/login')
				->with('error', ['You must be logged in.']);
		}
		return true;
	}

	/**
	 * @inheritDoc
	 */
	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{

	}
}