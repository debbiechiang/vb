<form id="tag-select" class="filter-dropdown tag-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">

  <?php
  $args = array(
    'show_option_none' => __( 'Tags' ),
    'show_count'       => 1,
    'orderby'          => 'name',
    'name'             => 'tag',
    'id'              => 'tag',
    'taxonomy'         => 'post_tag',
    'echo'             => 0,
    'value_field'     => 'slug'
  );
  ?>

  <?php $select  = wp_dropdown_categories( $args ); ?>
  <?php $replace = "<select$1 onchange='return this.form.submit()'>"; ?>
  <?php $select  = preg_replace( '#<select([^>]*)>#', $replace, $select ); ?>

  <?php echo $select; ?>

  <noscript>
    <input type="submit" value="View" />
  </noscript>

</form>

<form id="category-select" class="filter-dropdown category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">

  <?php
  $args = array(
    'show_option_none' => __( 'Content Type' ),
    'show_count'       => 1,
    'orderby'          => 'name',
    'echo'             => 0,
  );
  ?>

  <?php $select  = wp_dropdown_categories( $args ); ?>
  <?php $replace = "<select$1 onchange='return this.form.submit()'>"; ?>
  <?php $select  = preg_replace( '#<select([^>]*)>#', $replace, $select ); ?>

  <?php echo $select; ?>

  <noscript>
    <input type="submit" value="View" />
  </noscript>

</form>

<form id="date-select" class="filter-dropdown date-select">
  <select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
    <option value=""><?php echo esc_attr( __( 'Date' ) ); ?></option> 
    <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
  </select>
</form>