<?php

use Core\KApp;
use Core\KDatabase;

$db = KApp::container()->resolve(KDatabase::class);

$userid = 1;

$noteIdInPostRequest = $_POST['idFromTheDeleteForm'];
$note = $db->query("select * from notes where id = :thisId", [':thisId' => $noteIdInPostRequest])->findOrFail();

kauthorise($note['userid'] === $userid);

$db->query('delete from notes where id = :heyDeleteThisNoteId', [
	'heyDeleteThisNoteId' => $noteIdInPostRequest
])	;

header('location: /notes');
exit();
