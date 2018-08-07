<?php /* Template Name: About Page */?>

<?php get_header(); ?>
 <div class="about">
  <section class="hero aboutpage" style="background-image: url('<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'full' ); ?> ');">
    <div class="hero__info">
    <h1 class="hero__title"><?php echo get_post_custom_values('about_title')[0] ?></h1>
    <div class="hero__excerpt"><?php echo get_post_custom_values('about_subtitle')[0] ?></div>
  </div>
  <div class="hero-overlay" />
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

