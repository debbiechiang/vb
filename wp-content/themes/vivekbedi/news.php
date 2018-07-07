<?php /* Template Name: News Page */?>

<?php get_header(); ?>
 <div class="">
  <section class="hero news row">
    <h1 class="hero__title"><?php  ?></p>
  </section>
</div>
<main class="wrapper container-fluid">
  <div class="row">
    <div class="col-xs-12">
      <div class="module-header row">
        <h2 class="module-title"> News</h2>
        <a class="module-link down-1 col-xs-4" href="">See All News</a>
      </div>
    </div>
  </div>
  <section class="tile-container">
    <div class="row">
      <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
      <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
      <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
    </div>
    <div class="row">
      <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
      <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
      <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
    </div>
  </section>
</main><!-- /.container -->
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

