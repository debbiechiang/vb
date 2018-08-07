<aside class="col-xs-12 col-sm-3 col-sm-offset-1 sidebar-module speaking-sidebar">
  <h2 class="module-title">Upcoming</h2>
  <ul class="sidebar__items speaker-series">
    <?php 
      $upcomingargs =  array( 
        'post_type' => 'speaking-engagement',
        'category' => 'upcoming',
        'orderby' => 'date',
        'order' => 'DESC', 
        'posts_per_page' => '3'
      );
      $upcoming = new WP_Query( $upcomingargs );?>
      <?php if ($upcoming->have_posts()): ?>
        <?php while ($upcoming->have_posts()) : $upcoming->the_post(); ?>
          <li class="sidebar__item">
            <div class="sidebar__item-img speaker-series__img">
              <?php if(class_exists('Dynamic_Featured_Image')) {
                global $dynamic_featured_image;
                global $post;
                $featured_images = $dynamic_featured_image->get_featured_images($post->ID);
              } ?>
              <?php if(!empty($featured_images)): ?>
                <img src="<?php echo $featured_images[0]['thumb']?>"/>
              <?php else: ?>
                <?php the_post_thumbnail('thumbnail'); ?>
              <?php endif ?>
            </div>
            <div class="sidebar__item-info">
              <h3 class="sidebar__item-title"><?php the_title() ?></h3>
              <p class="sidebar__item-date"><?php the_date() ?></p>
            </div>
          </li>
        <?php endwhile;?>
      <?php else: ?>
        <li class="sidebar__item no-results">
          No upcoming speaking engagements found.
        </li>
      <?php endif; ?>
  </ul>
  <a href="" class="sidebar__see-more-link">See All Speaking Engagements</a>
</aside><!-- /.homepage-sidebar -->