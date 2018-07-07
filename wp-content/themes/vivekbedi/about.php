<?php /* Template Name: About Page */?>

<?php get_header(); ?>
 <div class="">
  <section class="hero homepage row">
    <h1 class="hero__title"><?php echo get_pageinfo( 'description' ); ?></p>
  </section>
</div>
<div class="wrapper container-fluid">
  <div class="row">
    <main class="col-sm-8 main">

      ABOUT. 
     </main><!-- /.blog-main -->

      <? get_sidebar(); ?>

     </div><!-- /.row -->
  </div><!-- /.container -->
  <section class="full-module newsletter-signup">
    <div class="wrapper container-fluid">
        <div class="row">
          <div class="">
            Newsletter signup
          </div>
      </div>
     </div>
 </section>

<?php get_footer(); ?>

