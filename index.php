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
			<p class="d-inline sr-only">blog tags / </p>
			<?php
			// Tag cloud config
			// Increasing will make words bigger;
			// Decreasing will do reverse
			$factor = 0.1;

			// Smallest font size possible
			$starting_font_size = 10;

			// Create array with all tags
			$tags = getTags();
			$max_count = count($tags); // Total number of tags

			// Iterate through tags
			foreach ($tags as $tag) {
				$x = round((count($tag->pages()) * 100) / $max_count) * $factor;
				$font_size = $starting_font_size + $x.'px';
				echo '<li style="font-size:'.$font_size.';" class="list-inline-item">';
				if ($tag->key()==$url->slug()) {
					echo '<a class="active-tag" href="'.$tag->permalink().'">'.$tag->name().'</a></li>';
				} else {
					echo '<a href="'.$tag->permalink().'">'.$tag->name().'</a></li>';
				}
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

	<div class="container d-block navbar py-4 mt-md-5 pt-md-5">
		<?php require '../lib/nav.php'; ?>
	</div>

	<!-- Include Jquery file from Bludit Core -->
	<?php echo Theme::jquery(); ?>

	<!-- Include javascript Bootstrap file from Bludit Core -->
	<?php echo Theme::jsBootstrap(); ?>

	<!-- Load Bludit Plugins: Site Body End -->
	<?php Theme::plugins('siteBodyEnd'); ?>
</body>
</html>
