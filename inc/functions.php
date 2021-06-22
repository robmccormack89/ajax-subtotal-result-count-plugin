<?php

function cart_result_subtotal() {
  echo '<span class="header-cart-count">';
  echo WC()->cart->get_cart_contents_count();
  echo '</span>';
  echo '<span class="subtotal-cart">';
  echo WC()->cart->get_cart_subtotal();
  echo '</span>';
}