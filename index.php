<?php
/**
 * AV Coming Soon
 *
 * @package   av-coming-soon
 * @link      https://avthemes.com/plugin/wordpress-coming-soon
 * @author    AV Themes <https://avthemes.com>
 * @copyright 2020 AV Themes
 * @license   GPL v2 or later
 *
 * 
 * Plugin Name: AV Coming Soon
 * Plugin URI: https://avthemes.com/plugin/wordpress-coming-soon
 * Description: Add a coming soon page to your WordPress site with customizable layout and widgets.
 * Version: 1.0
 * Author: AV Themes
 * Author URI: https://avthemes.com
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: av-coming-soon
 * Domain Path: /languages
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
*/

// Security check if plugin is being loaded via WP or not
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Environment Setup
define( 'AV_CS_DEV_MODE', 1 );
define( 'AV_CS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'AV_CS_PLUGIN_URL', __FILE__ );
define( 'AV_CS_PLUGIN_SETTING_PAGE', 'AV_CS_plugin_options' );
define( 'AV_CS_PID', 200 );
define( 'AV_CS_PLUGIN_NAME', 'AV Coming Soon' );
define( 'AV_CS_GFONTS', "Rubik|Notable|Anton|Bitter|Kanit|Arvo|Asap|Maven+Pro|Exo|BioRhyme" );

/*
 * Require plugin.php
 */
if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
	
	require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
}

// Plugin File Includes
include( AV_CS_PLUGIN_PATH . 'includes/activate.php' );
include( AV_CS_PLUGIN_PATH . 'includes/deactivate.php' );
include( AV_CS_PLUGIN_PATH . 'includes/uninstall.php' );
include( AV_CS_PLUGIN_PATH . 'includes/utilities.php' );
include( AV_CS_PLUGIN_PATH . 'includes/front/coming-soon.php' );
include( AV_CS_PLUGIN_PATH . 'includes/admin/init.php' );
include( AV_CS_PLUGIN_PATH . 'includes/admin/menus.php' );
include( AV_CS_PLUGIN_PATH . 'includes/admin/options-page.php' );
include( AV_CS_PLUGIN_PATH . 'includes/admin/process.php' );

/**
 * Localization
*/
load_plugin_textdomain( 'av-coming-soon', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

// Plugin Hooks
register_activation_hook( __FILE__, 'AV_CS_activate_plugin' ); // activate the plugin
register_deactivation_hook( __FILE__, 'AV_CS_deactivate_plugin' );
register_uninstall_hook( __FILE__, 'AV_CS_uninstall_pugin' ); // uninstall the plugin
add_action( 'get_header', 'AV_CS_maintenance_mode' ); // activate / off maintenance mode
add_action( 'admin_init', 'AV_CS_admin_init' );
add_action( 'admin_menu', 'AV_CS_admin_menus' ); // add plugin admin menu page
add_action( 'admin_notices', 'AV_CS_activation_admin_notices' ); // add admin notices

// Plugin Filters
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'AV_CS_plugin_settings_link'); // add settings link for plugin