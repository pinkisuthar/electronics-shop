<?php
// Add stylesheet to plugin
function scurf_enqueue_styles() {
    wp_enqueue_style( 'scurf-style', plugins_url( '../assets/css/style.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'scurf_enqueue_styles' );

// Get stylesheet //
scurf_enqueue_styles();
?>