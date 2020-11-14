<html>
<body>
<h2>Products</h2>
<?php
if(isset($_SESSION['token'])){
	$url = 'https://bikestore-api.herokuapp.com/gets/products';
	echo "<ol>";
	$result = apiCallGet($url);
	foreach($result as $values)
	{
			echo "<li><a href ='?p=productedit&amp;pid=".$values->product_id."'>".$values->product_name."</a></li>";
		
		}
	echo "</ol>";	
}
?>
</body>
</html>
