<?php require "views/partials/head.php"; ?>
<?php require "views/partials/nav.php"; ?>
<?php require "views/partials/banner.php"; ?>

<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		<p class="mb-4">
			<a href="/notes" class="text-blue-500 underline">Back</a>
		</p>
		<p>
			<?= $note['id'] ?>  <?= htmlspecialchars($note['body']) ?>
		</p>
	</div>
</main>

<?php require "views/partials/footer.php"; ?>
