<?php
// Start the session
session_start();
// Set session variables
// $_SESSION["cart"][$_POST['product_id']] = array (
// 	"id" => $_POST['product_id'], 
// 	"quantity" => $_POST['quantity']
// );
// echo "Session variables are set.";


include 'connection.php';

$id = $_GET['id'];
// sql to delete a record
$sql = "DELETE FROM cart_items WHERE id= $id";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}


$conn->close();
?>