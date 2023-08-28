<?php
/**
 * Plugin Name:       Google Sheet Link
 * Plugin URI:        https://www.rightroaddigital.com/
 * Description:       Display real time data from your google sheets on your wordpress site. Easily!
 * Version:           1.0.0
 * Requires at least: 5.9
 * Requires PHP:      7.2
 * Author:            Liam Kennedy
 * Author URI:        https://www.rightroaddigital.com/
 * Text Domain:       google-sheet-link
 * Domain Path:       /languages
 */

 if(!function_exists('add_action')) {
    echo 'Seems like you stumbled here by accident. 😝';
exit;
}
function plugin_scripts() {
	wp_enqueue_script('GSLPluginScripts', plugins_url('/assets/index-f7ceed90.js', __FILE__), array(), false, true);
    wp_script_add_data('GSLPluginScripts', 'type', 'module');
    wp_script_add_data('GSLPluginScripts', 'crossorigin', 'anonymous'); 
}

add_action('wp_enqueue_scripts', 'plugin_scripts');

function plugin_styles() {
    wp_enqueue_style('GSLPluginStyles', plugins_url('/assets/index-55a52760.css', __FILE__));
}

add_action('wp_enqueue_scripts', 'plugin_styles');

// Setup
define('GSL_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('GSL_PLUGIN_FILE', __FILE__);

// Includes
$rootFiles = glob(GSL_PLUGIN_DIR . 'includes/*.php');
$subdirectoryFiles = glob(GSL_PLUGIN_DIR . 'includes/**/*.php');
$allFiles = array_merge($rootFiles, $subdirectoryFiles);

foreach($allFiles as $filename) {
    include_once($filename);

}