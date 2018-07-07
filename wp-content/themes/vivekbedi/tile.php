
<article class="tile tile__<?php echo $template_args['width']?> tile--<?php echo $template_args['bg'] ?>">
  <?php if ($template_args['width'] === '1x'): ?>
    <div class="tile__meta">
      <a href="" class="tile__category down-1">Blog</a>
      <span class="tile__date down-1">April 2, 2018</span>
    </div>
  <?php endif ?>

  <h3 class="tile__title"><a href="">The User-Obsessed PM</a></h3>

  <?php if ($template_args['width'] === '2x'): ?>
    <p class="tile__blurb">I had a great time discussing the importance of bridging the gap between user needs and building amazing experiences. I had a great time discussing the importance of bridging the gap between user needs and building amazing experiences.</p>
    <a href="" class="tile__read-more down-1">Read More</a>
  <?php endif ?>

  <?php if ($template_args['width'] === '1x'): ?>
    <div class="tile__tags">
      <ul>
        <li class="tile__tag">
          <a href="" class="tile__tag-link down-1">Lectures</a>
        </li>
        <li class="tile__tag">
          <a href="" class="tile__tag-link down-1">Career</a>
        </li>
        <li class="tile__tag">
          <a href="" class="tile__tag-link down-1">Talks</a>
        </li>
        <li class="tile__tag">
          <a href="" class="tile__tag-link down-1">Product</a>
        </li>
      </ul>
    </div>
  <?php endif ?>
</article>
