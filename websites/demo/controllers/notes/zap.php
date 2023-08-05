<?php

use Core\KDatabase;

$config = require basepath('config.php');
$db = new KDatabase($config['database']);

$userid = 1;

$noteIdInGetRequest = $_GET['id'];
$note = $db->kquery("select * from notes where id = :thisId", [':thisId' => $noteIdInGetRequest])->kfindOrFail();

kauthorise($note['userid'] === $userid);

$db->kquery('delete from notes where id = :heyDeleteThisNoteId', [
	'heyDeleteThisNoteId' => $noteIdInGetRequest
])	;

header('location: /notes');
exit();
