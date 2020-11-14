<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="layout.css">
</head>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
function Test(){
	var index = $('select[name=category]').val();
	$.post('internal/storesite.php' , {catid:index}, function(data){$('.ajax').html(data)});
}
</script>
<body>

</br>

<div class="ajax" id="content">
<?php
$catid = $_REQUEST['catid'];
//Getting the results from the db
$url ="https://bikestore-api.herokuapp.com/gets/products/category/".$catid."";
$result = apiCallGet($url);
print "<table>";
print "<tr>";
print "<th >Title</th>";
print "<th >Price</th>";
print "</tr>";
foreach($result as $values)
{
		//Filling the table with the items dynamicly
		print "<tr>";
		print "<td ><a href='index.php?p=purchase&amp;pid=".$values->product_id."'>".$values->product_name."</a></td>";
		print "<td ><a>".$values->list_price."$</a></td>";
		print "</tr>";
}
print "</table>";
?>
</div>
</body>
</html>
