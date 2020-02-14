<?php

// Set variables for our request
$shop = "anjana-private-store.myshopify.com";
$api_key = "7f3fe01b380b1e55cdf2e2879f8823c9";
$scopes = "read_orders,write_products";
$redirect_uri = "https://shopify-anjana.herokuapp.com/generate_token.php";

// $redirect_uri = "http://localhost:5000/login-success";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . "/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();

