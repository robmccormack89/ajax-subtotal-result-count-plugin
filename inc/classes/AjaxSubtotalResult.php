<?php
namespace Rmcc;
use Timber\Timber;

class AjaxSubtotalResult extends Timber {

  public function __construct() {
    parent::__construct();
    
    // timber stuff. the usual stuff
    add_filter('timber/twig', array($this, 'add_to_twig'));
    add_filter('timber/context', array($this, 'add_to_context'));
    
    // enqueue plugin assets
    add_action('wp_enqueue_scripts', array($this, 'cart_result_subtotal_assets'));
    
    // shortcode for the markup
    add_shortcode('rmcc_header_result_subtotal', 'cart_result_subtotal'); // see inc/functions.php
    
    // filter to make it ajax
    add_filter('woocommerce_add_to_cart_fragments', array($this, 'header_cart_count_fragments'), 10, 1);
  }
  
  public function cart_result_subtotal_assets() {
    wp_enqueue_style(
      'ajax-subtotal-result-count',
      AJAX_SUBTOTAL_RESULT_URL . 'public/css/ajax-subtotal-result-count.css'
    );
  }
  
  function header_cart_count_fragments($fragments) {
    $fragments['span.header-cart-count'] = '<span class="header-cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
    $fragments['span.subtotal-cart'] = '<span class="subtotal-cart">' . WC()->cart->get_cart_subtotal() . '</span>';
    return $fragments;
  }
  
  public function add_to_twig($twig) { 
    $twig->addExtension(new \Twig_Extension_StringLoader());
    return $twig;
  }

  public function add_to_context($context) {
    return $context;    
  }

}