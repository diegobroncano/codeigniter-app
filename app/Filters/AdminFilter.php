<?php

namespace App\Filters;

use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements \CodeIgniter\Filters\FilterInterface
{
	/**
	 * @inheritDoc
	 */
	public function before(RequestInterface $request, $arguments = null)
	{
		if ( !service('auth')->currentAdmin() ) {

			return redirect()->back()
				->with('error', 'You do not have permission to see that.');

		}
	}

	/**
	 * @inheritDoc
	 */
	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{

	}
}