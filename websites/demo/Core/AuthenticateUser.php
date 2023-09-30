<?php

namespace Core;

class AuthenticateUser
{
	public function attempt($email,$password)
	{
		$db = KApp::container()->resolve(KDatabase::class);

		$user = $db->query('select * from users where email = :xemail', ['xemail' => $email])->find();

		if ($user) {
			if (password_verify($password,$user['password'])) {
				$this->login($user);
				return true;
			}
		}

		return false;
	}


	public function login($user)
	{
		$_SESSION['logged_in']	= true;
		$_SESSION['user']			= ['user' => $user];

		session_regenerate_id(true);
	}

	public function logout()
	{
		$_SESSION= [];

		session_destroy();

		$params = session_get_cookie_params();

		setcookie('PHPSESSID', '', time()-60, $params['path'], $params['domain']);
	}

}