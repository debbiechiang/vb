<aside class="col-xs-12 col-sm-3 col-sm-offset-1 sidebar-module speaking-sidebar">
  <h2 class="module-title">Upcoming</h2>
  <ul class="sidebar__items speaker-series">
    <?php 
      $upcomingargs =  array( 
        'post_type' => 'speaking-engagement',
        'tag' => 'upcoming',
        'orderby' => 'date',
        'order' => 'DESC', 
        'posts_per_page' => '3'
      );
      $upcoming = new WP_Query( $upcomingargs );?>
      <?php if ($upcoming->have_posts()): ?>
        <?php while ($upcoming->have_posts()) : $upcoming->the_post(); ?>
          <li class="sidebar__item">
            <div class="sidebar__item-img speaker-series__img">
              <img src="http://placehold.it/70x140" />
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