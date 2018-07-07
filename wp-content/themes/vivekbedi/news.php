<?php /* Template Name: News Page */?>

<?php get_header(); ?>
 <div class="">
  <section class="hero newspage row">
    <h1 class="hero__title"><?php  ?></p>
  </section>
</div>
<main class="wrapper container-fluid">
  <div class="row">
    <div class="col-xs-12 main">
      <div class="module-header">
        <h2 class="module-title">News</h2>

      </div>
    </div>
  </div>
  <section class="tile-container tile-3up">
    <div class="row">
      <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
      <?php hm_get_template_part('tile', ['bg' => 'grey-bg', 'width' => '1x']) ?>
      <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
    </div>
    <div class="row">
      <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
      <?php hm_get_template_part('tile', ['bg' => 'grey-bg', 'width' => '1x']) ?>
      <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
    </div>
  </section>
</main><!-- /.container -->
  <?php get_template_part('newsletter') ?>
<?php get_footer(); ?>

