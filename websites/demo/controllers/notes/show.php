<?php

use Core\App;
use Core\KDatabase;

$db = App::container()->resolve(KDatabase::class);

$userid = 1;

$noteIdInGetRequest = $_GET['id'];
$note = $db->query("select * from notes where id = :id", [':id' => $noteIdInGetRequest])->findOrFail();

kauthorise($note['userid'] === $userid);		// Can't even view

view('notes/show.view.php', [
	'heading' => 'Note',
	'note' => $note
]);

