<?php
session_start();
//Check to see if we actually updated the shipping
	if (!isset($_POST['cost'])){
		$thisShip = "0";
	}
	else {
		$thisShip = "1";
	}

//if no cost / checkout set, give it a 0 val
if(!isset($totalCost)) {
	$totalCost = 0;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="robots" content="noindex" />
	<title>Carl's Music Emporium - Check Out</title>
	<link rel="stylesheet" href="./css/musicstore.css">
	<link href='http://fonts.googleapis.com/css?family=ABeeZee|Fredoka+One|Nunito' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="wrapper">
	<?php
		include 'header.php';
	?>
	<div id="checkout">	
	<h2>Check Out Time</h2>
	<h3>Review Items for accuracy before submitting!</h3>
	<br>
	<table>
		<tr>
			<th>Item</th>
			<th>Description</th>
			<th>Price Per Item</th>
			<th>Quantity</th>
			<th>Sub Total</th>
		</tr>
		<?php
		$preTotal = 0;
			for($x=0;$x<count($_SESSION['cartQuant']);$x++) {
				$preTotal += $_SESSION['cartQuant'][$x] + $_SESSION['cart'][$x]['price']; 
				echo '<tr>';
					echo '<td>';
						echo $_SESSION['cart'][$x]['type'];
					echo '</td>';
					echo '<td>';
						echo 'Artist: '.$_SESSION['cart'][$x]['artist'].'<br>';
						echo 'Album: '.$_SESSION['cart'][$x]['album'].'<br>';
					echo '</td>';
					echo '<td>';
					echo '$'.$_SESSION['cart'][$x]['price'];
					echo '</td>';
					echo '<td>';
						echo $_SESSION['cartQuant'][$x];
					echo '</td>';
					echo '<td>';
						echo $_SESSION['cartQuant'][$x] + $_SESSION['cart'][$x]['price'];
					echo '</td>';
				echo '</tr>';
				
			}
			echo '<tr>';
				echo '<td colspan="3">';
					echo '<h3>Pre-Shipping Total:</h3>';
				echo '</td>';
				echo '<td colspan="2">';
					echo '<h3>$'.$preTotal.'</h3>';
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td colspan="2">';
					echo '<h3>Select Shipping Option:</h3>';
				echo '</td>';
				echo '<td colspan="3">';
				//Let's get fancy and figure out a base rate + items in the cart
				$baseSave = 2.99;
				$base5Day = 5.99;
				$base1Day = 7.50;
				$shipItems = count($_SESSION['cartQuant']);
				$saveCost = number_format($baseSave * $shipItems,$decimals = 2);
				$weekCost = number_format($base5Day * $shipItems, $decimals = 2);
				$dayCost = number_format($base1Day * $shipItems, $decimals = 2);
				
					echo '<form action="checkout.php" method="post">';
						echo '<select name="cost">';
						//Okay, some totals here and what default is selected?
						if ($thisShip ==1) {
							if($_POST['cost'] == '0') {
								$totalCost = $saveCost + $preTotal;
								echo '<option value="0" selected >Super Saver ( '.$saveCost.' )</option>';
								echo '<option value="1">Basic 5 Day( '.$weekCost.' )</option>';
								echo '<option value="2">Next Day( '.$dayCost.' )</option>'; 
							}
							elseif($_POST['cost'] == '1') {
								$totalCost = $weekCost + $preTotal;
								echo '<option value="0" >Super Saver ( '.$saveCost.' )</option>';
								echo '<option value="1" selected >Basic 5 Day( '.$weekCost.' )</option>';
								echo '<option value="2">Next Day( '.$dayCost.' )</option>';
							}
							elseif($_POST['cost'] == '2') {
								$totalCost = $dayCost + $preTotal;
								echo '<option value="0" >Super Saver ( '.$saveCost.' )</option>';
								echo '<option value="1">Basic 5 Day( '.$weekCost.' )</option>';
								echo '<option value="2" selected>Next Day( '.$dayCost.' )</option>';
							}
							else {
								$totalCost = "ERROR";
								$thisShip = "0";
							}
						}
						else {
							echo '<option value="0" >Super Saver ( '.$saveCost.' )</option>';
							echo '<option value="1">Basic 5 Day( '.$weekCost.' )</option>';
							echo '<option value="2">Next Day( '.$dayCost.' )</option>';
							}
							
						echo '</select>';
						echo '<input type="submit" value="Update Shipping" />';
					echo '</form>';
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td colspan="2">';
					echo '<h3>Total Today:</h3>';
				echo '</td>';				
				echo '<td colspan="3">';
					echo '<h3>';
	
					if($thisShip == 0) {
						echo 'Select Shipping Method';
					}
					else {					
						echo '$'.$totalCost;
					}
					echo '</h3>';
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td colspan="5">';
					echo '<form action="process.php" method="post" >';
						echo '<input type="hidden" name="totalCost" value="'.$totalCost.'">';
						if(isset($_POST['cost'])) {
							echo '<input type="hidden" name="Shipping" value="'.$_POST['cost'].'">';
						}
						if ($thisShip == 0){
							echo '<input type="submit" value="Check Out Now" onClick="return" disabled />';
						}
						else {
							echo '<input type="submit" value="Check Out Now" onClick="return confirm('."'Are you sure you want to Check Out?'".');" />';
						}
					echo '</form>';
				echo '</td>';
			echo '</tr>';
			
		?>
	
	</table>
</div>
</div>

</body>
</html>