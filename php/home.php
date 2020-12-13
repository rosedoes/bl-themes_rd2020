<!-- Section -->
<section class="card-columns">
  <?php foreach ($content as $page): ?>
    <article class="page card">
      <?php Theme::plugins('pageBegin') ?>

			<?php if( $page->coverImage() ) { ?>
				<img class="card-img-top" src="<?php echo $page->coverImage() ?>" alt="<?php echo $page->slug() ?>" />
			<?php } ?>

			<div class="card-body">
				<h4 class="card-title">
					<a href="<?php echo $page->permalink() ?>">
	          <?php echo $page->title() ?>
	        </a>
				</h4>

				<p class="card-text"><?php echo $page->contentBreak() ?></p>
				<p class="card-text">
					<?php if ($page->readMore() ) { ?>
	        <div class="readmore">
	          <a href="<?php echo $page->permalink() ?>">
	            <i class="icon-arrow-down"></i> <?php echo $language->get('Keep reading >>') ?>
	          </a>
	        </div>
	        <?php } ?>
				</p>
			</div>

      <?php Theme::plugins('pageEnd') ?>
    </article>
  <?php endforeach ?>
</section>

<!-- Pagination -->
<ul class="pagination justify-content-center">
	<?php
	if (Paginator::showPrev()) {
	  echo '<li class="page-item"><a class="page-link" href="'.Paginator::previousPageUrl().'" aria-label="Previous">'.$language->get('Previous page').'</a></li>';
	}
	if (Paginator::showNext()) {
	  echo '<li class="page-item"><a class="page-link" href="'.Paginator::nextPageUrl().'" aria-label="Next">'.$language->get('Next page').'</a></li>';
	}
	?>
</ul>
