<?php /* Template Name: About Page */?>

<?php get_header(); ?>
 <div class="">
  <section class="hero aboutpage row">
    <h1 class="hero__title"><?php  ?></p>
  </section>
</div>
<main class="wrapper container-fluid">
  <div class="row">
    <?php
      global $php_query;
      $postid = $wp_query->post->ID;
      $sidebar = get_post_meta($postid, "sidebar", true);
      get_sidebar($sidebar);
      wp_reset_query();
     ?>
    <div class="col-xs-12 col-sm-7 col-sm-offset-1 about-main main">
      <p>I am a passionate product manager that loves building and innovating. I have over 15+ years of experience in driving innovation in technology, product, operations, and marketing areas. I worked in big company and start-up cultures and have vast amounts of experience leading organizations through culture change.</p>

      <p>When I am not obsessing about clients in the product space I am also a dad, husband, and part time photographer! You will see loads of photos, articles, and things I am interested in. If you like what you see drop me a note. Always looking to connect with others.</p>

      <p>Press/Conference Inquiries</p>
      <p>If you would like to inquire about press or are interested in seeing me speak, please email me at:</p>
      <p><a href="">vivekbedi@gmail.com</a></p>
    </div>
  </div>
</main><!-- /.container -->
  <?php get_template_part('newsletter') ?>
<?php get_footer(); ?>

