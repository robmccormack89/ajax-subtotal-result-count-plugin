<?php
/*
Plugin Name: Ajax Subtotal & Result Count for Woocommerce by RMcC
Plugin URI: #
Description: Add the cart result count & subtotal amount to your website using the shortcode [cart_result_subtotal]. Works with ajax.
Version: 1.0.0
Author: robmccormack89
Author URI: #
Version: 1.0.0
License: GNU General Public License v2 or later
License URI: LICENSE
Text Domain: ajax-subtotal-result-count
Domain Path: /languages/
*/

// don't run if someone access this file directly
defined('ABSPATH') || exit;

// define some constants
if (!defined('AJAX_SUBTOTAL_RESULT_PATH')) define('AJAX_SUBTOTAL_RESULT_PATH', plugin_dir_path( __FILE__ ));
if (!defined('AJAX_SUBTOTAL_RESULT_URL')) define('AJAX_SUBTOTAL_RESULT_URL', plugin_dir_url( __FILE__ ));

// require the composer autoloader
if (file_exists($composer_autoload = __DIR__.'/vendor/autoload.php')) require_once $composer_autoload;

// then require the main plugin class. this class extends Timber/Timber which is required via composer
new Rmcc\AjaxSubtotalResult;

// require action functions 
require_once('inc/functions.php');