<aside class="col-xs-12 col-sm-4 sidebar-module about-sidebar">
  
  <?php if(class_exists('Dynamic_Featured_Image')) {
    global $dynamic_featured_image;
    global $post;
    $featured_images = $dynamic_featured_image->get_featured_images($post->ID);
  } ?>
  <?php if(!empty($featured_images)): ?>
    <img src="<?php echo $featured_images[0]['full']?>" class="about-sidebar__thumbnail"/>
  <?php else: ?>
    <?php the_post_thumbnail('thumbnail'); ?>
  <?php endif;?>
  <h2 class="module-title">Follow Me</h2>
  <ul class="social-links">
    <li>
      <a class="social-link" href="https://twitter.com/vivbedi" target="_blank">
       <?php get_template_part('images/inline', 'twitter.svg'); ?>
       <span class="sr-only">Twitter</span>
     </a>
    </li>
    <li>
     <a class="social-link" href="https://www.linkedin.com/in/vivekbedi" target="_blank">
       <?php get_template_part('images/inline', 'linkedin.svg'); ?>
     <span class="sr-only">LinkedIn</span></a>
   </li>
  </ul>
</aside> 