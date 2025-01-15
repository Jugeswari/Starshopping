<?php
session_start();
include 'connection.php';
	// $sql = "SELECT * FROM cart_items";
	
	if(isset($_SESSION['user']['id'])){
	
	$user_id = $_SESSION['user']['id'];
	$sql = "SELECT products.name, products.img, products.price, cart_items.id AS cart_id, cart_items.quantity FROM cart_items INNER JOIN products ON products.id=cart_items.product_id WHERE cart_items.user_id='".$user_id."'";
	$result = $conn->query($sql);
	$total = 0;
	$productTotal = 0;
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		$productTotal = $row['price'] * $row['quantity'];
		$total += $productTotal;
?>
<div class="cart-item">
	<div class="cart-box">
		<img src="products imgs/<?php echo $row['img']; ?>" alt="Product image" class="cart-img">
		<div class="cart-box2">
			<h3 class="cart-item-name"><?php echo $row['name']; ?></h3>
			<p class="cart-item-price">&#8377 <?php echo $row['price']; ?></p>
			<input class="cart-item-quantity" type="number" value="<?php echo $row['quantity']; ?>">
		</div>
		<a class="cart-remove" onclick="deleteCartItem(<?php echo $row['cart_id']; ?>);"><i class="fa-solid fa-trash"></i></a>
	</div>
</div>
<?php
			}
			} else {
			echo "Empty Cart";
			}
?>
<div class="cart-total">
	<h3 class="total-title">Total</h3>
	<div class="total-price">&#8377 <?php echo $total; ?></div>
</div>
<a href="checkout.php" class="cart-buy-btn">Check Out</a>
<?php
}else{
	?>
	<h2 style="text-align: center; margin-top: 20px;">you are not logged in </h2>
	<?php
}
$conn->close();
?>