<?php
/**
 * Plugin Name: WP Rocket Test 02
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
 * @param void
 * @return void
 */
function wp_rocket_custom_disable_user_cache() {
    if (is_user_logged_in()) { 
        $current_user = wp_get_current_user();
        if ($current_user->has_cap('administrator'))
            define( 'DONOTCACHEPAGE', true );
        else
            define( 'DONOTCACHEPAGE', false );
    }
}

add_action('template_redirect', 'wp_rocket_custom_disable_user_cache');

/**
 * On a real case here we could improve the plugin with the init action, 
 * also it would be possible to also disable the cache common file creations
 * using the rocket_common_cache_logged_users filter provided by WP Rocket
 * to disable it for administrator as well.
 */