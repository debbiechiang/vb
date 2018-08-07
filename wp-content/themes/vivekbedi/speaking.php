<?php /* Template Name: Speaking Page */?>

<?php get_header(); ?>
 <div class="">
  <?php 
    $args =  array( 
      'post_type' => 'speaking-engagement',
      'orderby' => 'date',
      'order' => 'DESC', 
      'posts_per_page' => '8'
    );
    $count = 0;
    $custom_query = new WP_Query( $args );
    while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
      <?php if($count === 0): ?>
        <section class="hero speaking row" style="background-image: url('<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'full' ); ?> ');">
          <div class="hero__info">
            <h1 class="hero__title"><?php the_title() ?></h1>
            <p><?php the_excerpt() ?></p>
            <a href="<?php the_permalink(); ?>" class="readmore">Read More</a>
          </div>
          <div class="hero-overlay" />
        </section>
      </div>
      <main class="wrapper container-fluid">
        <div class="row">
          <div class="col-sm-8 main">
            <div class="module-header row">
              <h2 class="module-title col-xs-8">Past Speaking Engagements</h2>
              <a class="module-link down-1 col-xs-4" href="">See All Speaking Engagements</a>
            </div>
          </div>
        </div>

        <div class="row">
          <section class="tile-container col-sm-8 tile-2up">
        <?php endif; ?>

          <?php if ($count%2 == 0): ?>
            <div class="row">
          <?php endif ?>
          <?php get_template_part('speaking-engagements', get_post_format()); ?> 
          <?php if ($count%2 == 1): ?>
            </div>
          <?php endif ?>
      <?php $count++; endwhile; ?> 
    </section>

    <?php include('sidebar-speaking.php'); ?>

  </div>

  </main><!-- /.container -->
  <?php get_template_part('newsletter') ?>
<?php get_footer(); ?>

