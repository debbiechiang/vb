<?php get_header(); ?>
 <div class="news">
  <?php if ( have_posts() ): $postitem = 0; ?>
   <?php while ( have_posts() ) : the_post(); ?>
      <?php if($postitem === 0): ?> 
        <section class="hero newspage" style="background-image: url('<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'full' ); ?> '); ">
          <div class="hero__info">
            <h1 class="hero__title"><?php the_title(); ?></h1>
            <div class="hero__excerpt"><?php the_excerpt() ?></div>
            <a href="<?php the_permalink(); ?>" class="readmore">Read More</a>
          </div>
            <div class="hero-overlay" />
        </section>

      </div>
      <main class="content wrapper container-fluid">
        <div class="row">
          <div class="col-xs-12 main">
            <div class="module-header">
              <h2 class="module-title">News</h2>
              <?php include('filters.php'); ?>
            </div>
          </div>
        </div>

        
        <section class="tile-container tile-3up">
        <?php endif; ?>

        <?php if($postitem%3 == 0): ?>
          <div class="row">
        <?php endif ?>
        <article class="tile tile__1x tile--<?php if($postitem%2 == 0) { echo "dark-bg";} else {echo "grey-bg"; } ?>">
            <div class="tile__meta"> 
              <div class="tile__category down-1"><?php the_category(' ') ?></div>
              <div class="tile__date down-1"><?php the_date() ?></div>
            </div>
            <h3 class="tile__title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
            <div class="tile__tags"><?php the_tags('<ul><li class="tile__tag"><a href="" class="tile__tag-link down-1">', '</a></li><li class="tile__tag"><a href="" class="tile__tag-link down-1">', '</a></li></ul>'); ?>
            </div>
        </article>

        <?php if($postitem%3 == 2): ?>
          </div>
        <?php endif ?>

    <?php $postitem++; endwhile; endif; ?>
  </section>
</main><!-- /.container -->
  <?php get_template_part('newsletter') ?>
<?php get_footer(); ?>

