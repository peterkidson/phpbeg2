<?php

require('KResponse.php');
$config = require('config.php');
$db = new KDatabase($config['database']);

$heading = "Note";

$noteIdInUrl = $_GET['id'];

$note = $db->query("select * from notes where id = :id", [ ':id' => $noteIdInUrl])->kfindOrFail();

$userid = 1;

authorise($note['userid'] === $userid);

require "views/notes/show.view.php";
