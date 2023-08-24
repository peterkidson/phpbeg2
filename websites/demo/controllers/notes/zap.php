<?php

use Core\App;
use Core\KDatabase;

$db = App::container()->resolve(KDatabase::class);

$userid = 1;

$noteIdInGetRequest = $_GET['id'];
$note = $db->query("select * from notes where id = :thisId", [':thisId' => $noteIdInGetRequest])->findOrFail();

kauthorise($note['userid'] === $userid);

$db->query('delete from notes where id = :heyDeleteThisNoteId', [
	'heyDeleteThisNoteId' => $noteIdInGetRequest
])	;

header('location: /notes');
exit();
