<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="layout.css">
</head>
<body>
<div id="content">
<h2>Customers</h2>
<?php
if(isset($_SESSION['token'])){
	$url = 'https://bikestore-api.herokuapp.com/gets/customers';
	$result = apiCallGet($url);
	echo "<table>
	<tr>
	<th>ID</th>
	<th>Fname</th>
	<th>Lname</th>
	<th>Phone</th>
	<th>Email</th>
	<th>Street</th>
	<th>City</th>
	<th>State</th>
	<th>Zip Code</th>
	</tr>";
	
	foreach($result as $values)
		{
				echo "<tr>";
				echo "<td> <a>".$values->customer_id."</a></td>";
				echo "<td> <a>".$values->first_name."</a></td>";
				echo "<td> <a>".$values->last_name."</a></td>";
				echo "<td> <a>".$values->phone."</a></td>";
				echo "<td> <a>".$values->email."</a></td>";
				echo "<td> <a>".$values->street."</a></td>";
				echo "<td> <a>".$values->city."</a></td>";
				echo "<td> <a>".$values->state."</a></td>";
				echo "<td> <a>".$values->zip_code."</a></td>";
				echo "</tr>";
		}
	echo "</table>";
}
?>
</div>