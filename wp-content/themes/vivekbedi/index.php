<?php get_header(); ?>
 <div class="">
  <section class="hero homepage row">
    <h1 class="hero__title"><?php echo get_bloginfo( 'description' ); ?></p>
  </section>
</div>
<main class="wrapper container-fluid">
  <div class="row">
    <div class="col-sm-8 main">
      <div class="module-header row">
        <h2 class="module-title col-xs-8">Latest News</h2>
        <a class="module-link down-1 col-xs-4" href="">See All News</a>
      </div>
    </div>
  </div>

  <div class="row">
    <section class="tile-container col-sm-8 tile-2up">
      <div class="row">
        <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
        <?php hm_get_template_part('tile', ['bg' => 'grey-bg', 'width' => '1x']) ?>
      </div>
      <div class="row">
        <?php hm_get_template_part('tile', ['bg' => 'grey-bg', 'width' => '2x']) ?>
      </div>
      <div class="row">
        <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
        <?php hm_get_template_part('tile', ['bg' => 'grey-bg', 'width' => '1x']) ?>
      </div>
    </section>

    <? get_sidebar(); ?>
  </div>

  </main><!-- /.container -->
  <?php get_template_part('newsletter') ?>
<?php get_footer(); ?>

