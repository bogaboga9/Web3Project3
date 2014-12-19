<?php 
	session_start();
	$addItem = 0;
	//cookie variables
	$cookie_cart="shoppingCart";
	$cookie_items="shoppingQuant";
	//Database variables
	$servername = "localhost";
	$serveruser = "root";
	$serverpw = "C3Po&r2d2";
	$dbname = "musicstore";

//connect to the database
	$conn = new mysqli($servername, $serveruser, $serverpw, $dbname);

	//check the connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	
	//Get HTML data into Variables
	if (isset($_GET['cd'])){
		$dID = $_GET["cd"];
	}
	
	//get the correct album from the Database
	$sql = "SELECT * FROM album WHERE ID = '$dID'";
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	if(isset($_GET['disk'])) {
		$mediaType = "Compact Disk";
	}
	if(isset($_GET['digital'])) {
		$mediaType = "Digital MP3";
	}
	
	if (mysqli_num_rows($result)) {
		// output data for record
		while($row = mysqli_fetch_assoc($result)) {
			$data = array('rID' => $row['ID'], 'artist' => $row['Artist'], 'album' => $row['Name'],'quantity' => $row['Quant'],'price' => $row['Price']);
		}
		$data['type'] = $mediaType;
	}
	if(!isset($_SESSION['cart'])) {
		if(!isset($_COOKIE[$cookie_cart])){
			$_SESSION['cart'][]=$data;
			$_SESSION['cartQuant'][] = $_GET['itemQuant'];
		}
		else {
			$_SESSION['cart'] = json_decode($_COOKIE[$cookie_cart]);
			$_SESSION['cartQuant'] =json_decode($_COOKIE[$cookie_items]);
		}
	}
	else {
		if (!in_array($data, $_SESSION['cart'])){
			$_SESSION['cart'][] = $data;
			$_SESSION['cartQuant'][] = $_GET['itemQuant'];
		}
		else {
			// check for updated quantity, if none, set the item to 1
			$_SESSION['cartQuant'][intval($_GET['cartItem'])] = $_GET['itemQuant'];
		}	
	}
			
	// If for some reason, the itemQuant wasn't passed, assume it is 1:
	if (!isset($_GET['itemQuant'])){
		$itemQuant = 1;
	}
	
	//remove an item from the cart
	if(isset($_GET['deleteItem'])){
		if($_GET['itemQuant'] == 0){
			array_splice($_SESSION['cart'],$_GET['cartItem'],1);
			array_splice($_SESSION['cartQuant'],$_GET['cartItem'],1);
		}
	}
	
//mmm... Time to craft the Cookie. Is it chocolate chip?
	// Make a cookie from our Cart
setcookie($cookie_cart, json_encode($_SESSION['cart']), time() + (86400 * 30), "/");
setcookie($cookie_items, json_encode($_SESSION['cartQuant']), time() + (86400 * 30), "/");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Carl's Music Emporium - Home</title>
		<link rel="stylesheet" href="./css/musicstore.css">
		<link href='http://fonts.googleapis.com/css?family=ABeeZee|Fredoka+One|Nunito' rel='stylesheet' type='text/css'>
	</head>
	
	<body>
	<div id="wrapper">
		<?php
			include 'header.php'; 
		?>
		<div id="cart">
			<h2>Your Shopping Cart</h2>
			<hr />
			<img src="./images/Cart.png" alt="" class="fltleft">
			<table class='cart'>
		<?php
			$totalPrice = 0;
			
			if(count($_SESSION['cart']) > 0) {	
				for ($x=0;$x < count($_SESSION['cart']);$x++)	{
					$subTotal = $_SESSION['cart'][$x]['price'] * $_SESSION['cartQuant'][$x];
					$totalPrice += $subTotal; 
					echo '<tr>';
						echo '<td height="10">';
							echo 'Item '.($x+1).' : ';
							echo $_SESSION['cart'][$x]['type'].'<br />';
							echo 'Artist :'. $_SESSION['cart'][$x]['artist'].'<br />';
							echo 'Album :'. $_SESSION['cart'][$x]['album'].'<br />';
							echo 'Price :$'. $_SESSION['cart'][$x]['price'].'<br />';
							echo 'Quanity selected: '. $_SESSION['cartQuant'][$x].'<br />';
							echo 'Sub-Total: $'.$subTotal;
						echo '</td>';
						echo '<td>';
							echo 'Quantity:';
								echo '<form>';
									echo '<input type="hidden" name="cd" value="'.$_SESSION['cart'][$x]['rID'].'"/>';
									if($_SESSION['cart'][$x]['type'] == 'Compact Disk') {
										echo '<input type="hidden" name="disk" value="true" />';
									}
									else {
										echo '<input type="hidden" name="digital" value="true" />';
									}
									echo '<input type="hidden" name="cartItem" value="'.$x.'"/>';
									echo '<input name="itemQuant" type="number" min="0" max="20" value="'.$_SESSION['cartQuant'][$x].'" />';
									echo '<input type="submit" value="Update">';
								echo '</form>';
								echo '<form>'; 
									echo '<input type="hidden" name="cd" value="'.$_SESSION['cart'][$x]['rID'].'"/>';
										if($_SESSION['cart'][$x]['type'] == 'Compact Disk') {
											echo '<input type="hidden" name="disk" value="true" />';
										}
										else {
											echo '<input type="hidden" name="digital" value="true" />';
										}
									echo '<input type="hidden" name="cartItem" value="'.$x.'"/>';
									echo '<input name="itemQuant" type="hidden" value="0" />';
									echo '<input name="deleteItem" type="hidden" value="true"/>';
									echo '<input type="submit" value="Delete" />';
								echo '</form>';
						echo '</td>';
					echo '</tr>';						
				}
				echo '<tr>';
					echo '<td>';
						echo 'Total Pre-Shipping: ';
					echo '</td>';
					echo '<td>';
						 echo '$'.$totalPrice;
					echo '</td>';
				echo '</tr>';
				echo '<tr><td colspan="2">';
					 
					echo '<form action="checkout.php">';
					echo '<input type="hidden" name="checkOut" value="false" />';
					echo '<input type="hidden" name="shipping" value="default" />';
					echo '<input type="submit" value="Check Out" />';
				echo '</form></td></tr>';
			 }
			else {
				echo 'Your Cart is Empty, Please click on the Store to shop.';
			}
		?>	
		
		</table>
		</div>
	</div>
	</body>
</html>