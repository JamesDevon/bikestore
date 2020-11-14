<?php
// QUERY
		if(isset($_SESSION['token'])){
			$url = 'https://bikestore-api.herokuapp.com/gets/categories';
			$result = apiCallGet($url);

			echo "<ul class='nav flex-column nav-pills'>";
			echo "<h2><a class='nav-link active' href='#' style='color:navy; font-size:28px; top:3px;'>Products Menu</a></h2>";
			// echo DATA
			foreach($result as $values)
			{
					echo "<li><a class='nav-link' href='index.php?p=bookstoredb&amp;catid=".$values->category_id."' id='a2'>".$values->category_name."</a></li>";
			}
			echo "</ul>";
		}
		
	
?>
