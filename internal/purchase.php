<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="layout.css"></head>
<body>
<div id="content">
<?php
	$pid = $_REQUEST['pid'];
	//getting the details from the db
	$result = apiCallGet("https://bikestore-api.herokuapp.com/gets/products/".$pid."");
	$value = $result[0];
	$result = apiCallGet("https://bikestore-api.herokuapp.com/gets/brands/".$value->brand_id."");
	$brandValue = $result[0];
	$result = apiCallGet("https://bikestore-api.herokuapp.com/gets/stocks/products/".$pid."");
	$storeValue = $result[0];
	$result = apiCallGet("https://bikestore-api.herokuapp.com/gets/staffs/store/".$storeValue->store_id);
	$staffValue = $result[0];
	echo "<b>".$value->product_name."</b>
	<br>
	<p>".$brandValue->brand_name."</p>
	<br>
	price : ".$value->list_price."
	<form action='index.php' method='POST'>
	<input type='hidden' name='title' value='".$value->product_name."'>
	<input type='hidden' name='id' value='".$value->product_id."'>
	<input type='hidden' name='price' value='".$value->list_price."'>
	<input type='hidden' name='store' value='".$storeValue->store_id."'>
	<input type='hidden' name='staff' value='".$staffValue->staff_id."'>
	<input type='number' name='quantity' min='1'>";
	//Posting 'Add to cart' to initialize the function
	echo "<input type='submit' name='addtocart' value='Add to cart'>";
?>
</form>
</div>
</body>
</html>
