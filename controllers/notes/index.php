<?php

$config = require('config.php');
$db = new KDatabase($config['database']);

$heading = "My Notes";

$notes = $db->query("select * from notes where userid = 1")->kfetchAll();

//dd($notes);

require "views/notes/notes.view.php";
