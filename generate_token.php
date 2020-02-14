<?php
// Get our helper functions
require_once("inc/functions.php");

// Set variables for our request
$api_key = "7f3fe01b380b1e55cdf2e2879f8823c9";
$shared_secret = "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";
$params = $_GET; // Retrieve all request parameters
$hmac = $_GET['hmac']; // Retrieve HMAC request parameter


$code = $_REQUEST['code'];

$params = array_diff_key($params, array('hmac' => '')); // Remove hmac from params
ksort($params); // Sort params lexographically

$computed_hmac = hash_hmac('sha256', http_build_query($params), $shared_secret);

// Use hmac data to check that the response is from Shopify or not
if (hash_equals($hmac, $computed_hmac)) {

	// Set variables for our request
	$query = array(
		"client_id" => $api_key, // Your API key
		"client_secret" => $shared_secret, // Your app credentials (secret key)
		"code" => $params['code'] // Grab the access key from the URL
	);

	// Generate access token URL
	$access_token_url = "https://" . $params['shop'] . "/admin/oauth/access_token";

	// Configure curl client and execute request
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $access_token_url);
	curl_setopt($ch, CURLOPT_POST, count($query));
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($query));
	$result = curl_exec($ch);
	curl_close($ch);

	// Store the access token
	$result = json_decode($result, true);
	$access_token = $result['access_token'];

	// Show the access token (don't do this in production!)
	?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script type="text/javascript">
			jQuery(window).on('load', function(){	
				var token = '<?php echo $access_token?>';
				var setToken = localStorage.setItem('token', token);
				window.location.replace("https://shopify-anjana.herokuapp.com/dashboard.php");
			});
		</script>
	<?php
} else {
	// Someone is trying to be shady!
	die('This request is NOT from Shopify!');
}