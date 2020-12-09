<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://testhardik.ml/about/
 * @since             1.0.0
 * @package           Calculate_Bmr
 *
 * @wordpress-plugin
 * Plugin Name:       Calculate BMR
 * Plugin URI:        https://testhardik.ml/
 * Description:       This is a Plugin for Calculating BMR.
 * Version:           1.0.0
 * Author:            Hardik Chavada
 * Author URI:        https://testhardik.ml/about/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       calculate-bmr
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CALCULATE_BMR_VERSION', '1.0.0' );

//desine plugin url
define( 'CALCULATE_BMR_PLUGIN_URL',  plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-calculate-bmr-activator.php
 */
function activate_calculate_bmr() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-calculate-bmr-activator.php';
	Calculate_Bmr_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-calculate-bmr-deactivator.php
 */
function deactivate_calculate_bmr() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-calculate-bmr-deactivator.php';
	Calculate_Bmr_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_calculate_bmr' );
register_deactivation_hook( __FILE__, 'deactivate_calculate_bmr' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-calculate-bmr.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_calculate_bmr() {

	$plugin = new Calculate_Bmr();
	$plugin->run();

}
run_calculate_bmr();


//Register constants
define("BMR_DIR_PATH", plugin_dir_path(__FILE__)); 
define("BMR_PLUGIN_URL", plugins_url()."/calculate-bmr");

function add_bmr_shortcode(){
	wp_enqueue_style( 'my_bmr_style', plugin_dir_url( __FILE__ ) . '/admin/css/my-bmr-style.css', array());

	include_once plugin_dir_path(__FILE__)."/admin/partials/calculate-bmr-admin-display.php";

	wp_enqueue_script( 'my_bmr_js', plugin_dir_url( __FILE__ ) . '/admin/js/my-bmr-script.js', array(), true );
}
add_shortcode('bmr_shortcode', 'add_bmr_shortcode');