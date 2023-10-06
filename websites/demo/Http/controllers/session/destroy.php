<?php

use Core\KAuthenticator;

$auth = new KAuthenticator();
$auth->logout();

redirectAndDie('/');
