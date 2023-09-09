<?php

use Core\KApp;
use Core\KDatabase;

$db = KApp::container()->resolve(KDatabase::class);

$noteIdInGetRequest = $_GET['id'];
$note = $db->query("select * from notes where id = :id", [':id' => $noteIdInGetRequest])->findOrFail();

kauthorise($note['userid'] === $_SESSION['user']['user']['id']);		// Can't even view

view('notes/show.view.php', [
	'heading' => 'Note',
	'note' => $note
]);

