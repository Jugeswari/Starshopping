<?php
session_start();

$user_name = $_POST['user_name'];
$user_phone = $_POST['user_phone'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];

include 'connection.php';

$user = "SELECT * FROM `users` WHERE `email` = '".$user_email."' OR `phone` = '".$user_phone."'";

$result = $conn->query($user);

if ($result->num_rows > 0) {

	// echo 'user already exist';
	$_SESSION['msg'] = "User already exist.";

} else {

	$db_insert = "INSERT INTO users (`name`, `phone`, `email`, `password`) 
							VALUES ('".$user_name."', '".$user_phone."', '".$user_email."', '".$user_password."')";

	if ($conn->query($db_insert) === TRUE) {
	  // echo "You are registerd successfully!";
	  //set session
	$_SESSION['msg'] = "You are registerd successfully.";

	} else {
	  // echo "Error: " . $sql . "<br>" . $conn->error;
	  $_SESSION['msg'] = "Something went wrong!";
	}
}

$conn->close();

header("Location: http://localhost/starshopping");
?>
