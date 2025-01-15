<?php
session_start();

include 'connection.php';

$user_id = $_SESSION['user']['id'];

$user_address = $_POST['customer-address'];
$customer_phone = $_POST['customer-phone'];

$payment_mode = $_POST['payment-mode'];
$order_total = $_POST['order-total'];
$product_id = $_POST['product-id'];

$order = "INSERT INTO orders (user_id, phone, user_address, total)
					VALUES ('".$user_id."', $customer_phone, '".$user_address."', $order_total)";

if ($conn->query($order) === TRUE) {

	$last_id = $conn->insert_id;


	$order_items = "INSERT INTO order_items (orders_id, product_id, quantity)
								VALUES ($last_id, $product_id, 1)";

	if($conn->query($order_items) === TRUE){
		$_SESSION['order_placed_msg'] = "Order Placed Successfully!";
	}
	else
	{
		$_SESSION['order_placed_msg'] = "Something Weng Wrong!";
	}


}
else
{
	$_SESSION['order_placed_msg'] = "Something Weng Wrong!";

}

$conn->close();

header("Location: http://localhost/starshopping");

?>