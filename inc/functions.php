<?php

function cart_result_subtotal() {
  return '<span class="header-cart-count">'.WC()->cart->get_cart_contents_count().'</span><span class="subtotal-cart">'.WC()->cart->get_cart_subtotal().'</span>';
}