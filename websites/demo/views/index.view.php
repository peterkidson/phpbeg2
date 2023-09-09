<?php require "partials/head.php"; ?>
<?php require "partials/nav.php"; ?>
<?php require "partials/banner.php"; ?>

<?php echo "hello"; ?>
<main>
	<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
		Hello <i><?= $_SESSION['user']['email'] ?? 'Guest' ?></i>
	</div>
</main>

<?php require "partials/footer.php"; ?>
