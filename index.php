<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="generator" content="DarlingRosette">
	<link rel="canonical" href="https://darlingrosette.com" />

	<?php echo Theme::metaTagTitle(); # Dynamic title tag ?>

	<?php echo Theme::metaTagDescription(); # Dynamic description tag ?>

	<!-- Favicon -->
	<link rel="icon" href="https://darlingrosette.com/media/favicon.ico" type="image/x-icon">

	<?php echo Theme::cssBootstrap(); # Include CSS Bootstrap file from Bludit Core ?>

	<!-- rd2020 custom CSS -->
	<link href="https://darlingrosette.com/main.css" rel="stylesheet" type="text/css" />

	<?php Theme::plugins('siteHead'); # Load Bludit Plugins: Site head ?>
</head>

<body>
	<div class="strip"></div>

	<?php Theme::plugins('siteBodyBegin'); # Load Bludit Plugins: Site Body Begin ?>

	<div class="container">
		<h2 class="text-center"><?php echo $site->slogan() ?></h2>

		<?php require '../lib/nav.php'; # Display global navigation ?>

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

		<?php # Select php template depending on page type
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

	<?php echo Theme::jquery(); # Include Jquery file from Bludit Core ?>

	<?php echo Theme::jsBootstrap(); # Include javascript Bootstrap file from Bludit Core ?>

	<?php Theme::plugins('siteBodyEnd'); # Load Bludit Plugins: Site Body End ?>
</body>
</html>
