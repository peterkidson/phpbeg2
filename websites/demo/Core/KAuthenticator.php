<?php

namespace Core;

class KAuthenticator
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
		Session::destroy();
	}

}