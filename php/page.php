<!-- Section -->
<!-- Display content of selected post -->
<section class="clearfix">
	<?php Theme::plugins('pageBegin') ?>
	<header>
		<h2><?php echo $page->title() ?></h2>
	</header>
	<?php echo $page->content() ?>
	<?php Theme::plugins('pageEnd') ?>
</section>
