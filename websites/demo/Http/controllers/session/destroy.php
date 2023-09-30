<?php

use Core\AuthenticateUser;

$auth = new AuthenticateUser();
$auth->logout();

redirectAndDie('/');
