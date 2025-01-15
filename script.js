
// cart section
var cartBtn = document.getElementById('cart-btn');
var cartSection = document.getElementById('cart-section');
var closeBtn = document.getElementById('close-cart');

// add a click event listener to the cart button
cartBtn.addEventListener('click', function() {
  // toggle the visibility of the cart section
  if (cartSection.style.display === 'none') {
    cartSection.style.display = 'block';
  } else {
    cartSection.style.display = 'none';
  }
});

closeBtn.addEventListener('click', function() {
  cartSection.style.display = 'none';
});

// // wishlist section

// var wishlistBtn = document.getElementById('wishlist-btn');
// var wishlistSection = document.getElementById('product-wishlist');
// var closeBtn = document.getElementById('close-wishlist');

// // add a click event listener to the cart button
// wishlistBtn.addEventListener('click', function() {
//   // toggle the visibility of the cart section
//   if (wishlistSection.style.display === 'none') {
//     wishlistSection.style.display = 'block';
//   } else {
//     wishlistSection.style.display = 'none';
//   }
// });

// closeBtn.addEventListener('click', function() {
//   wishlistSection.style.display = 'none';
// });

// login section

var loginBtn = document.getElementById('user-btn');
var loginSection = document.getElementById('user-login-section');
var closeBtn = document.getElementById('close-login');

// add a click event listener to the cart button
loginBtn.addEventListener('click', function() {
  // toggle the visibility of the cart section
  if (loginSection.style.display === 'none') {
    loginSection.style.display = 'block';
  } else {
    loginSection.style.display = 'none';
  }
});

closeBtn.addEventListener('click', function() {
  loginSection.style.display = 'none';
});


function deleteCartItem(id) {
  const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      // document.getElementById("txtHint").innerHTML = this.responseText;
      // alert(this.responseText);
      getCart();
    }
  xmlhttp.open("GET", "deleteCartItem.php?id=" + id);
  xmlhttp.send();
}

function getCart(){
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function() {
      document.getElementById("getCart").innerHTML = this.responseText;

    }
  xmlhttp.open("GET", "http://localhost/starshopping/getCartItems.php");
  xmlhttp.send();
}
getCart();

// close popup

function closePopup(){
    document.getElementById("placeorder-popup").style.display='none';
}