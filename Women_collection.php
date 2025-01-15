<?php
include 'connection.php';
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Star Shopping</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="https://kit.fontawesome.com/9fce6096a5.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include 'header.php'; ?>

		<?php
			$order_msg = isset($_SESSION['order_placed_msg']) ? $_SESSION['order_placed_msg'] : '' ;
			if( $order_msg != ''){
		?>
		<div  class="placeorder-popup" id="placeorder-popup">
			<div><span class="check">&check;</span></div>
			<div><h3><?php echo $order_msg; ?>!</h3></div>
			<span class="close" onclick="closePopup();">&times;</span>
		</div>
		<?php
							unset($_SESSION['order_placed_msg']);
						}
		?>
		<?php
			$msg = isset($_SESSION['msg']) ? $_SESSION['msg'] : '' ;
			if( $msg != ''){
		?>
		<div  class="placeorder-popup" id="placeorder-popup">
			<div><h3><?php echo $msg; ?>!</h3></div>
			<span class="close" onclick="closePopup();">&times;</span>
		</div>
		<?php
							unset($_SESSION['msg']);
						}
		?>
		
		<section class="product-section">
			<h1 class="section-heading">Women Collection</h1>
			<div class="products-container">
				<?php
				$sql = "SELECT * FROM products where category_id = 2 limit 6";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
				// echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["price"]. "<br>";
				?>
				<div class="products">
					<div class="product-content">
						<img class="product-img" src="products imgs/<?php echo $row['img'];?>">
						<h3 class="product-name"><?php echo $row["name"]; ?></h3>
						<p class="price">Price - &#8377 <?php echo $row["price"]; ?></p>
						<form action="addToCart.php" method="post" style="display: inline-block;">
							<input type="hidden" name="product_id" value="<?php echo $row["id"]; ?>">
							<input type="hidden" name="quantity" value="1">
							
							<button type="submit">Add to Cart</button>
						</form>
						<a href="buyNow.php?id=<?php echo $row['id']; ?>">Buy Now</a>
					</div>
				</div>
				<?php
							}
							} else {
							echo "0 results";
							}
				?>
								
			</div>
		</section>
		
		<section id="cart-section" style="display: none;">
			<h2 class="cart-heading">Your Cart</h2>
			
			<div id="getCart"></div>
			
			
			<div class="cart-close" id="close-cart"><i class="fa-solid fa-xmark"></i></div>
		</section>
		<footer style="height:450px; background:black;">
			<div class="footer-section">
				<div class="about">
					<h2 class="footer-headings">About Us</h2>
					<p>We are a company that sells high-quality products online. Our mission is to provide our customers with the best possible shopping experience.</p>
					<div class="footer-icons">
						<a href="#"><i class="fa-brands fa-facebook"></i></a>
						<a href="#"><i class="fa-brands fa-youtube"></i></a>
						<a href="#"><i class="fa-brands fa-instagram"></i></a>
					</div>
				</div>
				<div class="usefull-links">
					<h2 class="footer-headings">Usefull Links</h2>
					<a href="#home">Home</a>
					<a href="#Categories">Categories</a>
					<a href="#home">Our Product</a>
					<a href="#home">About Us</a>
					<a href="#home">Contact Us</a>
				</div>
				<div class="contact-us">
					<h2 class="footer-headings">Contact Us</h2>
					<label>Email</label>
					<input type="email" name="email" placeholder="Enter your email.." required>
					<label>Message</label>
					<textarea rows="3" cols="5" placeholder="Enter your message" required></textarea>
					<button class="footer-button">Send</button>
				</div>
			</div>
		</footer>
		<script type="text/javascript" src="script.js"></script>
		<?php $conn->close(); ?>
	</body>
</html>