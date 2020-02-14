<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
	  var getToken = localStorage.getItem('token');
	  jQuery('.product_listing').click(function(){
		$.ajax({
		  url: '/shopify-anjana/product.php',
		  type: 'POST',
		  data: 'access_token=' + getToken,
		  success: function(data) {
			jQuery('.json_response').html(data);
		  },
		  error: function(e) {
			//called when there is an error
			console.log(e.message);
		  }
		});
	   })	

		jQuery('.order_listing').click(function(){
			$.ajax({
			  url: '/shopify-anjana/order_listing.php',
			  type: 'POST',
			  data: 'access_token=' + getToken,
			  success: function(data) {
				jQuery('.json_response').html(data);
			  },
			  error: function(e) {
				//called when there is an error
				console.log(e.message);
			  }
			});
		})	
	});
	
</script>
	<title>Dashboard</title>
</head>
<body>
	<ul>
		<li><a class="product_listing" style="cursor: pointer; color: green">Product Listing</a></li>
		<li><a class="order_listing" style="cursor: pointer; color: green">Order Listing</a></li>
	</ul>

	<div class="json_response">
		<!-- Here print response of shopify -->
	</div>
</body>
</html>