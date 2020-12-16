<!-- Display tags as tag cloud -->
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
