<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  <link rel="stylesheet" href="layout.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<script src='http://code.jquery.com/jquery-1.9.1.js'></script>
<form method='post'>
  <table>
    <?php
      $pid=$_GET['pid'];
      $url = 'https://bikestore-api.herokuapp.com/gets/products/'.$pid;
      $result = apiCallGet($url);
      
      $url= 'https://bikestore-api.herokuapp.com/gets/categories/';
      $categories = apiCallGet($url);
      foreach($result as $product)
      echo "<tr><td>ID : ".$pid."</td></tr>";
      echo "<tr><td>Title : <input type='text' name='title' value='".$product->product_name."'></tr></td>";
      echo "<tr><td>Price : <input type='text' name='price' value='".$product->list_price."'></tr></td>";
      echo "<tr><td>Category :  --><select name='category'>";
      foreach($categories as $category){
        echo "<option value='".$category->category_id."'>".$category->category_id."- ".$category->category_name."</option>";
      }
      echo " </select></tr></td>";
      echo "<input type='hidden' name='pid' value='".$pid."'>";
    ?>
  </table>
  <input type="submit" value="Post" onclick="return aj()">
</form>
<p id='msg'></p>

<?php
if(isset($_POST["title"]))
{
  if(isset($_SESSION['token'])){
    $url = 'https://bikestore-api.herokuapp.com/posts/updateItem';
    $data = array('product_id' => $_POST['pid'],
                  'product_name' =>  $_POST['title'],
                  'category_id' => $_POST['category'],
                  'list_price' => $_POST['price']);
    $result = apiCallPost($url, $data );
    echo ('<script>alert("item updated")</script>');
  }
    unset($_POST['title']);
  }

?>
<body>
</body>
</html>
