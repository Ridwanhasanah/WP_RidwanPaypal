<?php
/**
 * Plugin Name: PaypalKu
 * Plugin URI: http://www.facebook.com/ridwan.hasanah3
 * Description: A simple PayPal Buy Now button plugin.
 * Version: 1.0.0
 * Author: Ridwan Hasanah
 * Author URI: http://www.facebook.com/ridwan.hasanah3
 * License: GPL-3.0+
 * License URI: http://www.facebook.com/ridwan.hasanah3
 * Domain Path: /lang
 * Text Domain: paypal-buy-now-button-shortcode
 */

//Exit if accessed directly
  if(! defined('ABSPATH')){
  	exit;
  }

  define( 'pfile', plugin_dir_path(__FILE__));

  require_once(pfile . 'admin-menu.php');
  require_once(pfile . 'button_paypal.php');

?>