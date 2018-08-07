<aside class="col-xs-12 col-sm-5 col-md-3 col-sm-offset-1 sidebar-module homepage-sidebar">
  <h2 class="module-title">Speaking Engagements</h2>
  <ul class="sidebar__items speaker-series">
  <?php 
    $args =  array( 
      'post_type' => 'speaking-engagement',
      'orderby' => 'date',
      'order' => 'DESC', 
      'posts_per_page' => '3'
    );
    $custom_query = new WP_Query( $args );
    while($custom_query->have_posts()) : $custom_query->the_post();?>
    <li class="sidebar__item">
      <?php if(class_exists('Dynamic_Featured_Image')) {
        global $dynamic_featured_image;
        global $post;
        $featured_images = $dynamic_featured_image->get_featured_images($post->ID);
      } ?>
        <?php if(!empty($featured_images)): ?>
          <img src="<?php echo $featured_images[0]['thumb']?>" class="sidebar__item-img speaker-series__img" />
        <?php else: ?>
          <?php the_post_thumbnail('thumbnail', ['class' => 'sidebar__item-img speaker-series__img']); ?>
        <?php endif ?>
        <h3 class="sidebar__item-title speaker-series__title">
         <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      </li>
    <?php endwhile; ?>
  </ul>
  <a href="/speaking" class="sidebar__see-more-link">See All Speaking Engagements</a>
</aside><!-- /.homepage-sidebar -->
