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

		<form class="mt-3" method="post">
			<input type="hidden" name="_pseudoMethod" value="DELETE">
			<input type="hidden" name="id2del" value="<?= $note['id']; ?>">
			<button class="text-sm text-red-500">Delete</button>
		</form>

	</div>
</main>

<?php require basepath("views/partials/footer.php"); ?>
