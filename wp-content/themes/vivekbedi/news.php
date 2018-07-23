<?php /* Template Name: News Page */?>

<?php get_header(); ?>
 <div class="">
  <section class="hero newspage row">
    <h1 class="hero__title"><?php  ?></p>
  </section>
</div>
<main class="wrapper container-fluid">
  <div class="row">
    <div class="col-xs-12 main">
      <div class="module-header">
        <h2 class="module-title">News</h2>
      </div>
    </div>
  </div>
  <section class="tile-container tile-3up">
    <?php 
      $args =  array( 
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC', 
        'posts_per_page' => '9'
      );
      $postitem = 0;
      $custom_query = new WP_Query( $args );
      while($custom_query->have_posts()) : $custom_query->the_post();?>
        <?php if($postitem%3 == 0): ?>
          <div class="row">
        <?php endif ?>
        <article class="tile tile__1x tile--<?php if($postitem%2 == 0) { echo "dark-bg";} else {echo "grey-bg"; } ?>">
            <div class="tile__meta"> 
              <div class="tile__category down-1"><?php the_category(' ') ?></div>
              <div class="tile__date down-1"><?php the_date() ?></div>
            </div>
            <h3 class="tile__title"><a href=""><?php the_title() ?></a></h3>
            <div class="tile__tags"><?php the_tags('<ul><li class="tile__tag"><a href="" class="tile__tag-link down-1">', '</a></li><li class="tile__tag"><a href="" class="tile__tag-link down-1">', '</a></li></ul>'); ?>
            </div>
        </article>

        <?php if($postitem%3 == 2): ?>
          </div>
        <?php endif ?>

    <?php $postitem++; endwhile; ?>
  </section>
</main><!-- /.container -->
  <?php get_template_part('newsletter') ?>
<?php get_footer(); ?>

