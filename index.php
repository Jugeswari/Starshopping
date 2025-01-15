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
		
		<section class="slider-container1">
			<div class="slider-container">
				<div class="navigation-buttons">
					<div class="previous-nav-btn"><i class="fa-solid fa-chevron-left"></i></div>
					<div class="next-nav-btn"><i class="fa-solid fa-chevron-right"></i></div>
				</div>
				<div class="slider">
					<div class="slides show" style="background-image: url('img1.jpg'); background-position-y: -50px;"></div>
					<div class="slides" style="background-image: url('img2.jpg');"></div>
					<div class="slides" style="background-image: url('img3.jpg');"></div>
				</div>
			</div>
		</section>
		<section class="product-section">
			<h1 class="section-heading">Our products</h1>
			<div class="products-container">
				<?php
				$sql = "SELECT * FROM products limit 6";
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
		<section class="Aboutus-section" id="about-us">
			<div class="aboutus-content">
				<h1>ABOUT US</h1>
				<hr>
				<p>We are a company that sells high-quality products online. Our mission is to provide our customers with the best possible shopping experience.</p>
				<p><strong>Address:</strong> Khariar,Dist-Nuapada,Odisha</p>
				<p><strong>Phone:</strong> 7991000945</p>
				<p><strong>Email:</strong> starshopping@gmail.com</p>
			</div>
		</section>
		<section class="Contactus-section" id="Contact-us">
			<h1 class="section-heading">Contact Us</h1>
			<p>Fill out the form below to send us a message</p>
			<div class="contact-form">
				<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14969.078978267195!2d82.7549233289542!3d20.28909895888057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a25af2f14fb4a8d%3A0xd070a13b44e41cc8!2sKhariar%2C%20Odisha!5e0!3m2!1sen!2sin!4v1679753491037!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
				<div class="contact-inputs">
					<label>Name:</label>
					<input type="text" name="user_name" placeholder="Enter your name...">
					<label>Email:</label>
					<input type="email" name="user_email" placeholder="Enter your email..">
					<label>Message:</label>
					<textarea name="user_message" placeholder="write your message.." rows="5"></textarea>
					<input type="submit" name="submit" value="Send">
				</div>
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
		<script type="text/javascript">
			const previous = document.querySelector('.previous-nav-btn');
const next = document.querySelector('.next-nav-btn');
const images = document.querySelector('.slider').children;
const totalImages = images.length;
let currentIndex = 0;

setInterval(() => {
    nextImage();
}, 4000);


// Event Listeners to previous and next buttons
previous.addEventListener('click', () => {
    previousImage()
})

next.addEventListener('click', () => {
    nextImage();
})


// Function to go to next Image
function nextImage() {

    images[currentIndex].classList.remove('show');
    if (currentIndex == totalImages - 1) {
        currentIndex = 0;
    } else {
        currentIndex++;
    }

    images[currentIndex].classList.add('show');

}

// Function to go to previous Image
function previousImage() {

    images[currentIndex].classList.remove('show');
    if (currentIndex == 0) {
        currentIndex = totalImages - 1;
    } else {
        currentIndex--;
    }

    images[currentIndex].classList.add('show');

}
		</script>
	</body>
</html>