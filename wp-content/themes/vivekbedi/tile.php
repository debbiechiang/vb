
<article class="tile tile__<?php echo $template_args['width']?> tile--<?php echo $template_args['bg'] ?>">
  <?php if ($template_args['width'] === '1x'): ?>
    <div class="tile__meta">
      <a href="" class="tile__category down-1"><?php the_category(' ') ?></a>
      <span class="tile__date down-1"><?php the_date(); ?></span>
    </div>
  <?php endif ?>

  <h3 class="tile__title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>

  <?php if ($template_args['width'] === '2x'): ?>
    <p class="tile__blurb"><?php the_excerpt();?></p>
    <a href="" class="tile__read-more down-1">Read More</a>
  <?php endif ?>

  <?php if ($template_args['width'] === '1x'): ?>
    <div class="tile__tags">
     <?php the_tags('<ul><li class="tile__tag"><a href="" class="tile__tag-link down-1">', '</a></li><li class="tile__tag"><a href="" class="tile__tag-link down-1">', '</a></li></ul>'); ?>
    </div>
  <?php endif ?>
</article>
