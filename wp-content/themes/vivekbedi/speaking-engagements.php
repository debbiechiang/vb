<article class="tile tile__1x tile--dark-bg" 
style="<?php echo 'background-image: url('. $bgimg .'?>);'?>">
    <div class="tile__meta">
      <div class="tile__category down-1"><?php the_category(' ') ?></div>
      <div class="tile__date down-1"><?php the_date() ?></div>
    </div>
  <h3 class="tile__title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
    <div class="tile__tags"><?php the_tags('<ul><li class="tile__tag"><a href="" class="tile__tag-link down-1">', '</a></li><li class="tile__tag"><a href="" class="tile__tag-link down-1">', '</a></li></ul>'); ?>
    </div>
</article>