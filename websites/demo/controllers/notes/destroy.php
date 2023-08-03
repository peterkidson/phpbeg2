<?php

use Core\KDatabase;

$config = require basepath('config.php');
$db = new KDatabase($config['database']);

$userid = 1;

$noteIdInPostRequest = $_POST['idFromTheDeleteForm'];
$note = $db->kquery("select * from notes where id = :thisId", [':thisId' => $noteIdInPostRequest])->kfindOrFail();

kauthorise($note['userid'] === $userid);

$db->kquery('delete from notes where id = :heyDeleteThisNoteId', [
	'heyDeleteThisNoteId' => $noteIdInPostRequest
])	;

header('location: /notes');
exit();
