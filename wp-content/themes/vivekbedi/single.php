<?php get_header(); ?>
<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
 <div class="blog">
    <section class="hero blog-hero">
      <div class="hero-wrapper">
        <div class="hero__type"><?php the_category(' ');?></div>
        <div class="hero__date"><?php the_date(); ?></div>
        <h1 class="hero__title"><?php the_title(); ?></h1>
        <div class="hero__excerpt"><?php the_excerpt(); ?></div>
      </div>
    </section>
    <main class="wrapper container-fluid blog-content">
      <div class="row">
        <?php include ('sidebar-post.php') ?>
        <section class="main">
          <h2 class="module-title">Overview</h2>
          <?php the_content(); ?>
        </section>
      </div>
    </main><!-- /.container -->
  </div>
  <?php endwhile; endif; ?>
  <?php get_template_part('newsletter') ?>
<?php get_footer(); ?>

