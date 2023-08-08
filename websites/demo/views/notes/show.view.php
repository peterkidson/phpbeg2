<?php require basepath("views/partials/head.php"); ?>
<?php require basepath("views/partials/nav.php"); ?>
<?php require basepath("views/partials/banner.php"); ?>

<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<p class="mb-4">
			<a href="/notes" class="text-blue-500 underline">Back</a>
		</p>

		<p>
			<?= $note['id'] ?>  <?= htmlspecialchars($note['body']) ?>
		</p>

		<footer class="mt-3">
			<a href="/note/edit">Edit</a>
		</footer>

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


	</div>
</main>

<?php require basepath("views/partials/footer.php"); ?>
