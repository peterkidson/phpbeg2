<?php

use Core\KApp;
use Core\KDatabase;

$db = KApp::container()->resolve(KDatabase::class);

$noteIdInPostRequest = $_POST['idFromTheDeleteForm'];
$note = $db->query("select * from notes where id = :thisId", [':thisId' => $noteIdInPostRequest])->findOrFail();

kauthorise($note['userid'] === $_SESSION['user']['user']['id']);

$db->query('delete from notes where id = :heyDeleteThisNoteId', [
	'heyDeleteThisNoteId' => $noteIdInPostRequest
])	;

header('location: /notes');
exit();
