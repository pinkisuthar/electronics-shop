<?php
// Add javascript to plugin
function scurf_enqueue_scripts() {
    wp_enqueue_script( 'scurf-script', plugins_url( '../assets/js/script.js', __FILE__ ), array( 'jquery' ), '3.0', true );
}
add_action( 'wp_enqueue_scripts', 'scurf_enqueue_scripts' );
?>