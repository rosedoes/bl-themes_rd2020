<!-- Section -->
<section class="content">
  <article class="page">
    <?php Theme::plugins('pageBegin') ?>
    <header>
      <h2><?php echo $page->title() ?></h2>
		</header>
    <?php echo $page->content() ?>
    <?php Theme::plugins('pageEnd') ?>
  </article>
</section>
