<?php /* Template Name: Speaking Page */?>

<?php get_header();  $cat_id = get_query_var('cat');?>
 <div class="speaking">
  <?php 
    $hasUpcoming = false;
    $query = new WP_Query(array(
      'post_type' => 'speaking-engagement',
      'orderby' => 'date',
      'order' => 'DESC', 
      'posts_per_page' => '1',
      'cat' => 11 // 'Upcoming' category.
    ));

    if ($query->have_posts()) : $query-> the_post(); $hasUpcoming = true; ?>
        <section class="hero speaking" style="background-image: url('<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'full' ); ?> ');">
          <div class="hero__info">
            <div class="hero__meta">
              <div class="hero__type"><?php the_category(' ');?></div>
            </div>
            <h1 class="hero__title"><?php the_title() ?></h1>
            <div class="hero__excerpt"><?php the_excerpt() ?></div>
            <a href="<?php the_permalink(); ?>" class="readmore">Read More</a>
          </div>
          <div class="hero-overlay" />
        </section>
      </div>
      <main class="content wrapper container-fluid">
        <div class="row">
          <div class="col-sm-6 col-md-8 main">
            <div class="module-header row">
              <h2 class="module-title col-xs-8 col-sm-8">Past Speaking Engagements</h2>
              <a class="module-link down-1 col-xs-4 col-sm-4" href="">See All Speaking Engagements</a>
            </div>
          </div>
        </div>

        <div class="row">
          <section class="tile-container col-sm-6 col-md-8 tile-2up ajax_posts">

    <?php endif;
      $args =  array( 
        'post_type' => 'speaking-engagement',
        'orderby' => 'date',
        'order' => 'DESC', 
        'posts_per_page' => '8',
      );
      $count = 0;
      $custom_query = new WP_Query( $args );
      while ($custom_query->have_posts()) : $custom_query->the_post();

      if(has_post_thumbnail($post->ID)) {
        $bgimg = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'medium_large' ); 
      }
       ?>
      <?php if(!$hasUpcoming && $count === 0): ?>
        <section class="hero speaking" style="background-image: url('<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'full' ); ?> ');">
          <div class="hero__info">
            <div class="hero__meta">
              <div class="hero__type"><?php the_category(' ');?></div>
            </div>
            <h1 class="hero__title"><?php the_title() ?></h1>
            <div class="hero__excerpt"><?php the_excerpt() ?></div>
            <a href="<?php the_permalink(); ?>" class="readmore">Read More</a>
          </div>
          <div class="hero-overlay" />
        </section>
      </div>
      <main class="content wrapper container-fluid">
        <div class="row">
          <div class="col-sm-6 col-md-8 main">
            <div class="module-header row">
              <h2 class="module-title col-xs-8 col-sm-8">Past Speaking Engagements</h2>
              <a class="module-link down-1 col-xs-4 col-sm-4" href="">See All Speaking Engagements</a>
            </div>
          </div>
        </div>

        <div class="row">
          <section class="tile-container col-sm-6 col-md-8 tile-2up ajax_posts">
        <?php endif; ?>

          <?php if ($count%2 == 0): ?>
            <div class="row">
          <?php endif ?>
          <?php if(has_post_thumbnail($post->ID)) {
            $bgimg = wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'medium_large' ); 
            set_query_var( 'bgimg', $bgimg );
            }
            get_template_part('speaking-engagements', get_post_format()); ?> 
          <?php if ($count%2 == 1): ?>
            </div>
          <?php endif ?>
      <?php $count++; endwhile; ?> 
    </section>

    <?php include('sidebar-speaking.php'); ?>

  </div>
  <div id="more_posts" data-category="<?php echo esc_attr($cat_id); ?>" data-perrow="2">
    <a href="#" class="readmore"><?php esc_html_e('Load More', 'vivekbedi') ?></a>
  </div>
  </main><!-- /.container -->
  <?php get_template_part('newsletter') ?>
<?php get_footer(); ?>

