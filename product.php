<?php
	require_once("inc/functions.php");
	$access_token = $_REQUEST['access_token'];
	$shop = "anjana-private-store";
	$query = array(
		"Content-type" => "application/json" // Tell Shopify that we're expecting a response in JSON format
	);


	// Run API call to get all products
	$products = shopify_call($access_token, $shop, "/admin/products.json", array(), 'GET');

	// Get response
	$products = $products['response'];

	print_r($products);
?>