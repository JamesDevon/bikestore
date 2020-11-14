<?php
	date_default_timezone_set("Europe/Athens");
	if(isset($_SESSION['username']))
	{
		$url = 'https://bikestore-api.herokuapp.com/posts/placeOrder';
		$ch = curl_init($url);
		$data = array(
			'customer_id' => 5,
			'order_status' => 1,
			'order_date' => date("Y-m-d"),
			'required_date' => date("Y-m-d"),
			'shipped_date'=> null,
			'store_id' => 1,
			'staff_id' => 1);
		$result = json_encode(apiCallPost($url , $data) , JSON_NUMERIC_CHECK );
		$order_id = substr($result , 5 , 4 );

		$url = 'https://bikestore-api.herokuapp.com/posts/insertOrderItem';
		$countItems =1;
		foreach($_SESSION['cart'] as $cartItem){
			if(is_null($cartItem)){
				continue;
			}else{
				$data = array(
					'order_id' => $order_id,
					'item_id' => $countItems,
					'product_id' => $cartItem['item_id'],
					'quantity' => $cartItem['item_quantity'],
					'list_price'=> $cartItem['item_price'],
					'discount' => 0.10);
					$result1 = apiCallPost($url , $data);
					$countItems++;

			}
		}

		unset($_SESSION['cart']);
		echo ('<script>alert("Your order has been placed")</script>');
	}else{
		echo ('<script>alert("You need to login first")</script>');
	}
?>
