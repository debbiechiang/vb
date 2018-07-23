<?php /* Template Name: About Page */?>

<?php get_header(); ?>
 <div class="">
  <section class="hero aboutpage row">
    <h1 class="hero__title"><?php  ?></p>
  </section>
</div>
<main class="wrapper container-fluid">
  <div class="row">
    <?php include ('sidebar-about.php') ?>
    <div class="col-xs-12 col-sm-7 col-sm-offset-1 about-main main">
      <?php if (have_posts()) : while(have_posts()) : the_post(); 
        the_content();
      endwhile; endif;
      ?>
    </div>
  </div>
</main><!-- /.container -->
  <?php get_template_part('newsletter') ?>
<?php get_footer(); ?>

