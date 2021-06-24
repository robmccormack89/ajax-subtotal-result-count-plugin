<?php
namespace Rmcc;

class AjaxSubtotalResult {

  public function __construct() {
    add_action('wp_enqueue_scripts', array($this, 'plugin_enqueue_assets'));
    
    add_filter('woocommerce_add_to_cart_fragments', array($this, 'header_cart_count_fragments'), 10, 1);
    
    add_shortcode('rmcc_header_result_subtotal', 'cart_result_subtotal'); // see inc/functions.php
  }
  
  public function header_cart_count_fragments($fragments) {
    $fragments['span.header-cart-count'] = '<span class="header-cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
    $fragments['span.subtotal-cart'] = '<span class="subtotal-cart">' . WC()->cart->get_cart_subtotal() . '</span>';
    return $fragments;
  }
  
  public function plugin_enqueue_assets() {
    wp_enqueue_style(
      'ajax-subtotal-result-count',
      AJAX_SUBTOTAL_RESULT_URL . 'public/css/ajax-subtotal-result-count.css'
    );
  }
}