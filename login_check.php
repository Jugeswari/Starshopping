<?php
session_start();

$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];

include 'connection.php';

// $Sql = "SELECT * FROM `news` WHERE `category` = '".$Param['category']."' ORDER BY `id` DESC";

$phone = "SELECT * FROM `users` WHERE `phone` = '".$user_name."'  AND `password` = '".$user_password."'" ;
$p_result = $conn->query($phone);

$email = "SELECT * FROM `users` WHERE `email` = '".$user_name."' AND `password` = '".$user_password."'" ;
$e_result = $conn->query($email);



if ($p_result->num_rows > 0 || $e_result->num_rows > 0) {

	// echo 'user login successfull';

	//set session
	if ($p_result->num_rows > 0) {
		$user = $p_result->fetch_assoc();
	}else {
		$user = $e_result->fetch_assoc();

	}
	$_SESSION['msg'] = "User logged in successfyll.";
	$_SESSION['user']['id'] = $user['id'] ;


} else {
	// echo 'id and password do not  match';
	$_SESSION['msg'] = "id and password do not  match.";
}

$conn->close();

header("Location: http://localhost/starshopping")
?>


