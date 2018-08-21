<?php
/**
 * Plugin Name: WP Rocket Test 03
 * Description: This is a plugin for the WP Rocket Hiring Process.
 * Author:      Marcos Vinicios Barreto
 * License:     GNU General Public License v3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

// Basic security, prevents file from being loaded directly.
defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' );

/**
 * Disables the page cache.
 *
 * @param void
 * @return void
 */
function wp_rocket_custom_disable_cache() {
    if(!isset($_COOKIE['origin_country']))
        define( 'DONOTCACHEPAGE', true );
    else
        define( 'DONOTCACHEPAGE', false );
}

add_action('template_redirect', 'wp_rocket_custom_disable_cache');

/**
 * Adds cookies ID for dynamic cache.
 *
 * @param void
 * @return void
 */
function wp_rocket_custom_cache_dynamic_cookie($dynamic_cookies) {
	$dynamic_cookies[] = 'origin_country';
	return $dynamic_cookies;
}

add_filter('rocket_cache_dynamic_cookies', 'wp_rocket_custom_cache_dynamic_cookie');

/**
 * Here it is not so clear to me since I couldn't find in the docs enough details
 * for a cookie based cache feature in the hooks. This hooks is what makes the most sense here.
 * Working on a team in a real case situation it would be something easily achievable.
 */