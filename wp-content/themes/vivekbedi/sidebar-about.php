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
      <a href="#" target="_blank">Facebook</a>
    </li>
    <li>
      <a href="#" target="_blank">Twitter</a>
    </li>
    <li>
      <a href="#" target="_blank">Instagram</a>
    </li>
    <li>
     <a href="#" target="_blank">LinkedIn</a>
   </li>
   <li>
      <a href="#" target="_blank">Google Plus</a>
    </li>
  </ul>
</aside> 