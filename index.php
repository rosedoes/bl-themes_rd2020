<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="generator" content="DarlingRosette">
	<link rel="canonical" href="https://darlingrosette.com" />

	<!-- Dynamic title tag -->
	<?php echo Theme::metaTagTitle(); ?>

	<!-- Dynamic description tag -->
	<?php echo Theme::metaTagDescription(); ?>

	<!-- Favicon -->
	<link rel="icon" href="https://darlingrosette.com/media/favicon.ico" type="image/x-icon">

	<!-- Include CSS Bootstrap file from Bludit Core -->
	<?php echo Theme::cssBootstrap(); ?>

	<!-- rd2020 custom CSS -->
	<link href="https://darlingrosette.com/main.css" rel="stylesheet" type="text/css" />

	<!-- Load Bludit Plugins: Site head -->
	<?php Theme::plugins('siteHead'); ?>
</head>

<body>
	<div class="strip"></div>

	<!-- Load Bludit Plugins: Site Body Begin -->
	<?php Theme::plugins('siteBodyBegin'); ?>

	<div class="container">
		<h2 class="text-center"><?php echo $site->slogan() ?></h2>

		<!-- Display global navigation -->
		<?php require '../lib/nav.php'; ?>

		<hr class="w-50" />

		<!-- Display tags -->
		<ul class="list-inline text-center">
			<p class="d-inline">blog tags </p>
			<?php
			// Create array with all tags
			$tags = getTags();
			echo '/ ';

			// Iterate through tags
			foreach ($tags as $tag) {
				echo '<li class="list-inline-item"><a class="" href="'.$tag->permalink().'" rel="'.count($tag->pages()).'">'.$tag->name().'</a></li>';
			}
			?>
		</ul>

		<!-- Select php template depending on page type -->
		<?php
		if ($WHERE_AM_I=='page') {
			include(THEME_DIR_PHP.'page.php');
		} else {
			include(THEME_DIR_PHP.'home.php');
		}
		?>
	</div>

	<footer class="navbar navbar-expand-sm navbar-light bg-light py-4 mt-md-5 pt-md-5 border-top">
		<div class="container d-block">
			<?php require '../lib/nav.php'; ?>
		</div>
	</footer>

	<!-- Include Jquery file from Bludit Core -->
	<?php echo Theme::jquery(); ?>

	<!-- Include javascript Bootstrap file from Bludit Core -->
	<?php echo Theme::jsBootstrap(); ?>

	<!-- Load Bludit Plugins: Site Body End -->
	<?php Theme::plugins('siteBodyEnd'); ?>
</body>
</html>
