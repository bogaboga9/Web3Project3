<?php
session_start();

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
	
var_dump($_SESSION['cartQuant']);
echo '<br>';
var_dump($_SESSION['cart']);
echo '<br><br>';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
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
			echo '</tr>'
		?>
		</tr>
	
	</table>
</div>
</div>
<?php
$sql = "SELECT * FROM album WHERE ID = '$dID'";
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>
</body>
</html>