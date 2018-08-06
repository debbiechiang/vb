<?php get_header(); ?>
 <div class="">
  <section class="hero homepage" style="background-image: url(<?php header_image(); ?>)">
    <h1 class="hero__title"><?php echo get_bloginfo( 'description' ); ?></h1>
  </section>
</div>
<main class="wrapper container-fluid">
  <div class="row">
    <div class="col-sm-8 main">
      <div class="module-header row">
        <h2 class="module-title col-xs-8">Latest News</h2>
        <a class="module-link down-1 col-xs-4" href="/news">See All News</a>
      </div>
    </div>
  </div>

  <div class="row">
    <section class="tile-container col-sm-8 tile-2up">
      <?php 
        $args =  array( 
          'post_type' => 'post',
          'orderby' => 'date',
          'order' => 'DESC', 
          'posts_per_page' => '5'
        );
        $postitem = 0;
        $custom_query = new WP_Query( $args );
        while($custom_query->have_posts()) : $custom_query->the_post();?> 
          <?php if($postitem === 0): ?>
            <div class="row">
              <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
            <?php elseif ($postitem === 1): ?>
                <?php hm_get_template_part('tile', ['bg' => 'grey-bg', 'width' => '1x']) ?>
              </div>
              <div class="row">
            <?php elseif ($postitem === 2): ?>
              <?php hm_get_template_part('tile', ['bg' => 'grey-bg', 'width' => '2x']) ?>
              </div>
              <div class="row">
            <?php elseif ($postitem === 3): ?>
              <?php hm_get_template_part('tile', ['bg' => 'dark-bg', 'width' => '1x']) ?>
            <?php elseif ($postitem === 4): ?>
              <?php hm_get_template_part('tile', ['bg' => 'grey-bg', 'width' => '1x']) ?>
            </div>
          <?php endif?>
      <?php $postitem++; endwhile; ?>
    </section>

    <? get_sidebar(); ?>
  </div>

  </main><!-- /.container -->
  <?php get_template_part('newsletter') ?>
<?php get_footer(); ?>

