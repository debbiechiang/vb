<?php get_header(); ?>
 <div class="">
  <section class="hero homepage row">
    <h1 class="hero__title"><?php echo get_bloginfo( 'description' ); ?></p>
  </section>
</div>
<div class="wrapper container-fluid">
  <div class="row">
    <main class="col-sm-8 main">
      <div class="module-header row">
        <h2 class="module-title col-xs-8">Latest News</h2>
        <a class="module-link down-1 col-xs-4" href="">See All News</a>
      </div>
      <section class="tile-container">
        <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
        <?php hm_get_template_part('tile', ['bg' => 'grey-bg', 'width' => '1x']) ?>
        <?php hm_get_template_part('tile', ['bg' => 'grey-bg', 'width' => '2x']) ?>
        <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
        <?php hm_get_template_part('tile', ['bg' => 'grey-bg', 'width' => '1x']) ?>
       </section>

       </main><!-- /.blog-main -->

      <? get_sidebar(); ?>

     </div><!-- /.row -->
  </div><!-- /.container -->
  <section class="full-module newsletter-signup">
    <div class="wrapper container-fluid">
        <div class="row">
          <div class="">
            Newsletter signup
          </div>
      </div>
     </div>
 </section>

<?php get_footer(); ?>

