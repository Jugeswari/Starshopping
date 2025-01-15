<?php
session_start();


include 'connection.php';

$user_id = $_SESSION['user']['id'];

$user_address = $_POST['customer-address'];
$customer_phone = $_POST['customer-phone'];

$payment_mode = $_POST['payment-mode'];
$order_total = $_POST['order-total'];

$order = "INSERT INTO orders (user_id, phone, user_address, total)
					VALUES ('".$user_id."', $customer_phone, '".$user_address."', $order_total)";

if ($conn->query($order) === TRUE) {

	$last_id = $conn->insert_id;
	$cart = "SELECT * FROM cart_items WHERE user_id = '".$user_id."'";
	$result = $conn->query($cart);

	while($row = $result->fetch_assoc()) {
		$product_id = $row['product_id'];
		$quantity = $row['quantity'];

		$order_items = "INSERT INTO order_items (orders_id, product_id, quantity)
									VALUES ($last_id, $product_id, $quantity)";
		$conn->query($order_items);
	}

	$remove_cart = "DELETE FROM cart_items WHERE user_id = '".$user_id."'";
	$conn->query($remove_cart);

	//set session
	$_SESSION['order_placed_msg'] = "Order Placed Successfully!";

}

$conn->close();

header("Location: http://localhost/starshopping");

?>