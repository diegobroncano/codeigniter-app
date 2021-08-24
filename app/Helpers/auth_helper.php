<?php

if ( !function_exists('current_user') ) {
	function current_user()
	{
		return service('auth')->getCurrentUser();
	}
}

if ( !function_exists('current_admin') ) {
	function current_admin()
	{
		return service('auth')->currentAdmin();
	}
}

if ( !function_exists('user_roles') ) {
	function user_roles()
	{
		return service('auth')->getRoles();
	}
}