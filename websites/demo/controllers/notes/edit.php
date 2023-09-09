<?php

use Core\KApp;
use Core\KDatabase;

$db = KApp::container()->resolve(KDatabase::class);

$noteIdInGetRequest = $_GET['id'];
$note = $db->query("select * from notes where id = :id", [':id' => $noteIdInGetRequest])->findOrFail();

kauthorise($note['userid'] === $_SESSION['user']['user']['id']);		// Can't even view

view('notes/edit.view.php', [
	'heading'	=> 'Edit Note',
	'errors'		=> [],
	'note' 		=> $note
]);



/***
<!--		<form class="mt-3" method="post">-->
<!--			<div class="shadow sm:overflow-hidden sm:rounded-md">-->
<!--				<input type="hidden" name="_pseudoMethod" value="DELETE">-->
<!--				<input type="hidden" name="idFromTheDeleteForm" value="--><?php //= $note['id']; ?><!--">-->
<!--				<button type="submit"-->
<!--						  class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white-->
<!--										shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">-->
<!--					Delete from form-->
<!--				</button>-->
<!--			</div>-->
<!--		</form>-->
<!---->
<!--
		<p class="mt-6 text-sm text-red-500">
			<here ?php $ref="/zap?id=".$note['id']; ?>
			<a href=<?= $ref ?>>Delete from link</a>
		</p>
-->
***/