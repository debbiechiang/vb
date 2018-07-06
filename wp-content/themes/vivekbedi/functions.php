<?php 
  function wpb_add_google_fonts() {
   
  wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Merriweather+Sans:300,400|Raleway:100,400,700,800', false ); 
  }
   
  add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );
?>