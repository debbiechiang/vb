<?php get_header(); ?>
<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
 <div class="blog">
    <section class="hero blog-hero" style="background-image: url('<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'full' ); ?> '); ">
      <div class="hero-wrapper wrapper">
        <div class="hero__info">
          <div class="hero__meta">
            <div class="hero__type"><?php the_category(' ');?></div>
            <div class="hero__date"><?php the_date(); ?></div>
          </div>
          <h1 class="hero__title"><?php the_title(); ?></h1>
          <div class="hero__excerpt"><?php if(has_excerpt()) { the_excerpt(); } ?></div>
        </div>
      </div>
      <div class="hero-overlay" />
    </section>
    <main class="wrapper container-fluid blog-content">
      <div class="row">
        <section class="main">
          <?php include ('sidebar-post.php') ?>
          <div class="col-sm-9 col-sm-offset-3">
            <?php the_content(); ?>
          </div>
        </section>
      </div>
    </main><!-- /.container -->
  </div>
  <?php endwhile; endif; ?>
  <?php get_template_part('newsletter') ?>
<?php get_footer(); ?>

