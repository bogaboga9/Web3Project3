<?php
session_start();
//Database variables
	$servername = "localhost";
	$serveruser = "iaflqjwd_music";
	$serverpw = "666Music666";
	$dbname = "iaflqjwd_musicstore";

//connect to the database
	$conn = new mysqli($servername, $serveruser, $serverpw, $dbname);

//check the connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
//Lets do some databasing!
//Remove the proper Quantity from the Affected Records
for($x=0;$x<count($_SESSION['cart']);$x++) {
	$updateQuantity = $_SESSION['cart'][$x]['quantity'] - $_SESSION['cartQuant'][$x];

	$rID = $_SESSION['cart'][$x]['rID'];
	$sql = "UPDATE album SET Quant = '$updateQuantity' WHERE ID = '$rID'";
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
}	
//NOM NOM, EMPTY THE CART
$cookie_cart="shoppingCart";
$cookie_items="shoppingQuant";
unset($_COOKIE[$cookie_cart]);
unset($_COOKIE[$cookie_items]);
setcookie($cookie_cart, " ", time () -3600);
setcookie($cookie_items," ",time () -3600);
unset ($_SESSION['cart']);
unset ($_SESSION['cartQuant']); 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
<<<<<<< HEAD
<meta name="robots" content="noindex" />
		<title>Carl's Music Emporium - CC Process</title>
		<link rel="stylesheet" href="./css/musicstore.css">
		<link href='http://fonts.googleapis.com/css?family=ABeeZee|Fredoka+One|Nunito' rel='stylesheet' type='text/css'>
	</head>
	<body>
		At This point, the cart would process a Credit card and various payments, etc.
		<br>
		<a href="index.php">You could click here to go home</a>
	</body>
</html>