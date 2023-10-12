<?php

namespace Core\Middleware;

class Guest
{
	public function handle()
	{
		if ($_SESSION['user'] ?? false) {			// a logged-in user
			redirect('/');
		}
	}

}