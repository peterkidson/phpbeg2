<?php

namespace Core\Middleware;

class Auth
{
	public function handle()
	{
		if (! $_SESSION['user'] ?? false) {			// no logged-in user
			header('location: /');
			exit();
		}
	}
}