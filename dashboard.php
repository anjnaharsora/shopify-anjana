<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
	  var getToken = localStorage.getItem('token');

	  jQuery('.product_listing').click(function(){
		$.ajax({
		  url: '/product.php',
		  type: 'POST',
		  data: 'access_token=' + getToken,
		  success: function(data) {
			jQuery('.text').html(data);
		  },
		  error: function(e) {
			//called when there is an error
			console.log(e.message);
		  }
		});
	   })	

		jQuery('.order_listing').click(function(){
			$.ajax({
			  url: '/order_listing.php',
			  type: 'POST',
			  data: 'access_token=' + getToken,
			  success: function(data) {
				jQuery('.text').html(data);
			  },
			  error: function(e) {
				//called when there is an error
				console.log(e.message);
			  }
			});
		})	

		jQuery('.customer_listing').click(function(){
			$.ajax({
			  url: '/customer_listing.php',
			  type: 'POST',
			  data: 'access_token=' + getToken,
			  success: function(data) {
				jQuery('.text').html(data);
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
	<style type="text/css">
	ul {
		padding-left: 0;
	}
	ul li {
		list-style: none;
		border-radius: 5px;
		background: #333;
		max-width: 130px;	
		line-height: 30px;
		padding: 0 15px;
		margin-bottom: 15px;

	}
		.json_response {
		    padding: 15px;
		    background: #ddd;
		    overflow: hidden;
		    max-width: 700px;
		    margin: 0 auto;
		}
		.text {
			    display: flex;
			    width: 100%;
			    overflow: auto;
		}
		.product_listing {
			margin-bottom: 15px;
		}
	</style>
</head>
<body>
	<ul>
		<li><a class="product_listing" style="cursor: pointer; color: white">Product Listing</a></li>
		<li><a class="order_listing" style="cursor: pointer; color: white">Order Listing</a></li>
		<li><a class="customer_listing" style="cursor: pointer; color: white">Customer Listing</a></li>
	</ul>

	<div class="json_response">
		<span class="text"></span><!-- Here print response of shopify -->
	</div>
</body>
</html>