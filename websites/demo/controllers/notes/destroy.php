<?php

use Core\KDatabase;

$config = require basepath('config.php');
$db = new KDatabase($config['database']);

$userid = 1;

$noteIdInPostRequest = $_POST['idFromTheDeleteForm'];  // (=== $_GET['id'] as it happens)
$note = $db->kquery("select * from notes where id = :thisId", [':thisId' => $noteIdInPostRequest])->kfindOrFail();
kauthorise($note['userid'] === $userid);

$db->kquery('delete from notes where id = :deleteThisNoteId', [
	'deleteThisNoteId' => $noteIdInPostRequest
])	;

header('location: /notes');
exit();
