<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="layout.css">
</head>
<body>
<div id="content">
<?php
if(isset($_SESSION['token'])){
	if(isset($_REQUEST['oid']))
	{
		$oid = $_REQUEST['oid'];
		$url = 'https://bikestore-api.herokuapp.com/gets/order_items/order_id/'.$oid.'';
		$result = apiCallGet($url);
		echo '<h2>Order ID : '.$oid.'</h2>';
		echo "<table>";
		echo "<tr>";
		echo "<th>Item</th>";
		echo "<th>Product ID</th>";
		echo "<th>Quantity</th>";
		echo "<th>List price</th>";
		echo '<th>Discount</th>';
		echo "</tr>";
		foreach($result as $values)
			{
				echo "<tr>";
				echo "<td><a>".$values->item_id."</a></td>";
				echo "<td><a>".$values->product_id."</a></td>";
				echo "<td><a>".$values->quantity."</a></td>";
				echo "<td><a>".$values->list_price."</a></td>";
				echo "<td><a>".$values->discount."</a></td>";
				echo "</tr>";
		}
		echo "</table>";
	}
}
?>
</div>