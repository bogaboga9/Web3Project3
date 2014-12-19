<?php
	$cookie_items="shoppingQuant";
	$cookie_cart="shoppingCart";
?>

<div id="head">
<div id="log">
	<ul>
		<li><a href="login.php">Login</a></li>
	</ul>
</div>
<h1>Carl's Music Emporium</h1>
<h2>I'll even sell to Master Shake!</h2>
<nav id="headnav" >
	<ul>
		<li id="home"><a href="index.php">Home</a></li>
		<li id="store"><a href="store.php">Store</a></li>
		<li id="testamonial"><a href="testamonial.php">Testimonials</a></li>
		<li id="aboutme"><a href="aboutme.php">About Me</a></li>
		<?php /*
		if(isset($_SESSION['cart']) || isset($_COOKIE[$cookie_cart])){
			echo '<li id="cart"><a href="cart.php?goCart=true">Shopping Cart</a></li>';
		}*/
		?>
	</ul>
</nav>
</div>