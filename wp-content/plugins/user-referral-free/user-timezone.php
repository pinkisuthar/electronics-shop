<?php
// Set the default timezone for the entire plugin based on the saved value
function scurf_set_plugin_timezone() {
    $plugin_timezone = get_option('scurf_timezone', 'UTC'); // 'UTC' is the default value
    date_default_timezone_set($plugin_timezone);
}
add_action('plugins_loaded', 'scurf_set_plugin_timezone');
?>