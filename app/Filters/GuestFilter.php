<?php

namespace App\Filters;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class GuestFilter implements \CodeIgniter\Filters\FilterInterface
{

	/**
	 * @inheritDoc
	 */
	public function before(RequestInterface $request, $arguments = null)
	{
		if ( service('auth')->isLoggedIn() ) {
			return redirect()->back()
				->with('info', ['You are already logged in!']);
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