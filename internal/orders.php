<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="layout.css">
</head>
<body>
<div id="content">
<?php
if(isset($_SESSION['token'])){
	$url = 'https://bikestore-api.herokuapp.com/gets/orders';
	$result = apiCallGet($url);
	echo "<table>
	<tr>
	<th>Order ID</th>
	<th>Customer ID</th>
	<th>Order Status</th>
	<th>Order Date</th>
	<th>Required Data</th>
	<th>Shipped Date</th>
	<th>Store ID</th>
	<th>Staff ID</th>
	</tr>";
	foreach($result as $values)
	{
			echo "<tr>";
			echo "<td><a href='index.php?p=orderlist&amp;oid=".$values->order_id."'>".$values->order_id."</a></td>";
			echo "<td><a>".$values->customer_id."</a></td>";
			echo "<td <a>".$values->order_status."</a></td>";
			echo "<td <a>".$values->order_date."</a></td>";
			echo "<td <a>".$values->required_date."</a></td>";
			echo "<td <a>".$values->shipped_date."</a></td>";
			echo "<td <a>".$values->store_id."</a></td>";
			echo "<td <a>".$values->staff_id."</a></td>";
			echo "</tr>";
		}
	echo "</table>";
}
?>
</div>