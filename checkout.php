<?php
session_start();
include 'connection.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Checkout page</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="checkout-container">
			<div class="product-detailes-container"><h2>Complete Your Order!</h2>
			<p style="text-align: center; margin-top: -10px;">Delivery Charge : Free</p>
			<hr style="margin-top: -10px;">
			<h3 style="text-align: center; margin-top: -10px; color: #19A7CE;">Your Product:</h3>
			<?php
			$user_id = $_SESSION['user']['id'];

			$sql = "SELECT products.name, products.img, products.price, cart_items.id AS cart_id, cart_items.quantity FROM cart_items INNER JOIN products ON products.id=cart_items.product_id WHERE cart_items.user_id='".$user_id."'";
			$result = $conn->query($sql);
			$total = 0;
			$productTotal = 0;
			$totalProducts = $result->num_rows;
			if ($totalProducts > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
			$productTotal = $row['price'] * $row['quantity'];
			$total += $productTotal;
			?>
			<div class="Product-detailes">
				<img width="60" src="products imgs/<?php echo $row['img']; ?>">
				<h5 class="product-name"><?php echo $row['name']; ?></h5>
				<p class="product-price">&#8377 <?php echo $row['price']; ?></p>
				<p >Quantity: <?php echo $row['quantity']; ?></p>
			</div>
			<?php
						}
						} else {
						// echo "Empty Cart";
						}
			?>
			
			<table>
				<tr>
					<th>total products</th>
					<td>&#8377 <?php echo $totalProducts; ?></td>
				</tr>
				<tr>
					<th>Shipping Fee</th>
					<td>&#8377 00.00</td>
				</tr>
				<tr>
					<th>total price</th>
					<td>&#8377 <?php echo $total; ?></td>
				</tr>
			</table></div>
				<form action="place-order.php" method="post" class="customer-detailes-container">
				<input type="hidden" name="order-total" value="<?php echo $total; ?>">
				<div class="customers-detailes">
					<h4>Enter your Detailes</h4>
					<label>Phone No:</label>
					<input type="number" name="customer-phone" placeholder="Phone no.." required>
					<label style="margin-top:-10px;">Address:</label>
					<textarea rows="3" name="customer-address"></textarea>
					<select class="payment-mode" name="payment-mode">
					<option value="" selected disabled>-Select Payment Mode-</option>
					<option value="cod">Cash On Delivery</option>
					<option value="netbanking">Net Banking</option>
					<option value="cards">Debit/Credit Card</option>
				</select>
				<input type="submit" value="Place Order">
				</div>
				
			</form>
			
		</div>
		<?php $conn->close(); ?>
	</body>
</html>