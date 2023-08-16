<?php

session_start();

$_SESSION['name'] = 'Peter';

view('index.view.php', ['heading' => 'Home']);
