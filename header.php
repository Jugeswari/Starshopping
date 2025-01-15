<header>
	<nav class="nav1">
		<div class="logo"><img src="logo.png"></div>
		<ul class="menu">
			<li class="menu-Items"><a href="/starshopping">Home</a></li>
			<li class="menu-Items dropdown"><a href="#categories">Categories</a>
			<ul class="submenu">
				<li class="submenu-items"><a href="Men_collection.php">Men</a></li>
				<li class="submenu-items"><a href="Women_collection.php">Women</a></li>
				<li class="submenu-items"><a href="Kids_collection.php">Kids</a></li>
			</ul>
		</li>
		<li class="menu-Items"><a href="http://localhost/starshopping/#about-us">About</a></li>
		<li class="menu-Items"><a href="#Contact-us">Contact Us</a></li>
	</ul>
	<div class="search-bar">
		<input class="searchterm" type="text" name="searchbar" placeholder="Search products...">
		<button type="submit" class="searchbutton">
		<i class="fa-solid fa-magnifying-glass"></i>
		</button>
	</div>
	<div class="menu-icons">
		<a href="#cart" id="cart-btn"><i class='fas fa-shopping-cart'></i></a>
		<!-- <a href="#wishlist" id="wishlist-btn"><i class='far fa-heart'></i></a> -->
		<?php
		
		if(isset($_SESSION['user']['id'])){
			?>
			<div style="display: none" id="user-btn"></div>
			<a href="logout.php">Logout </a>
			<?php
		}
		else{
		?>
		<a href="#user" id="user-btn"><i class="fa-solid fa-user"></i></a>
		<?php
					}
		?>
		
	</div>
</nav>
</header>
<section class="user-login-section" id="user-login-section" style="display: none;">
<div style="text-align: center;">
	<div class="loginform-logo"><i class="fa-solid fa-user"></i></div>
</div>
<form class="userlogin-form" action="login_check.php" method="post">
	
	<label class="mobile-no">Email id / Mobile No:</label>
	<input type="text" name="user_name" placeholder="Enter your email / phone no">
	<!-- <label>Email:</label>
	<input type="email" name="user_email" placeholder="Enter your email.."> -->
	<label>Password:</label>
	<input type="Password" name="user_password" placeholder="password.." rows="5"></input>
	<input type="submit" name="login" value="Login">
	<a href="register.php" class="register-btn">Don’t have an account? Register</a>
</form>
<div class="login-close" id="close-login"><i class="fa-solid fa-xmark"></i></div>
</section>

