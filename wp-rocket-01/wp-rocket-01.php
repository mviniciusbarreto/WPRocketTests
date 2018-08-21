<?php
/**
 * Plugin Name: WP Rocket Test 01
 * Description: This is a plugin for the WP Rocket Hiring Process.
 * Author:      Marcos Vinicios Barreto
 * License:     GNU General Public License v3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

// Basic security, prevents file from being loaded directly.
defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' );

/**
 * Disables the cache files creation.
 *
 * @param string 'do_rocket_generate_caching_file'  Hook name to hook function into
 * @param bool    $generate                         Generate or not the cache file
 */
add_filter('do_rocket_generate_caching_file', '__return_false');

/**
 * Purges the host cache system when calling the clear cache in WP Rocket.
 *
 * @param void
 */
function wp_rocket_custom_managed_clear_cache() {
    if (!function_exists('managed_clear_cache'))
        return;
    
    managed_clear_cache();
}

add_action('after_rocket_clean_cache_dir', 'wp_rocket_custom_managed_clear_cache');



