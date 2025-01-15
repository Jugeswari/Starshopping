<?php
// Start the session
session_start();
include 'connection.php';

if(isset($_SESSION['user']['id'])){

	$product_id = $_POST['product_id'];
	$quantity = $_POST['quantity'];

	$user_id = $_SESSION['user']['id'];

	$sql = "SELECT * FROM cart_items WHERE product_id = $product_id AND user_id = '".$user_id."'";

	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$quantity = $row['quantity'] + 1;
		$id = $row['id'];
	 $sql= "Update cart_items set quantity = $quantity WHERE id = $id";
	 if ($conn->query($sql) === TRUE) {
	  echo "Record updated successfully";
	} else {
	  echo "Error updating record: " . $conn->error;
	}

	}else{
		$sql = "INSERT INTO cart_items (user_id, product_id, quantity)
		VALUES ('".$user_id."', $product_id, $quantity)";

		if ($conn->query($sql) === TRUE) {
		  echo "New record created successfully";
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
else{
	$_SESSION['msg'] = 'You are not logged in, Login to add to cart.';
}

$conn->close();

header("Location: http://localhost/starshopping")
?>
