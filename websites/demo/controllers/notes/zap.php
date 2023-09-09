<?php

use Core\KApp;
use Core\KDatabase;

$db = KApp::container()->resolve(KDatabase::class);

$noteIdInGetRequest = $_GET['id'];
$note = $db->query("select * from notes where id = :thisId", [':thisId' => $noteIdInGetRequest])->findOrFail();

kauthorise($note['userid'] === $_SESSION['user']['user']['id']);

$db->query('delete from notes where id = :heyDeleteThisNoteId', [
	'heyDeleteThisNoteId' => $noteIdInGetRequest
])	;

header('location: /notes');
exit();
