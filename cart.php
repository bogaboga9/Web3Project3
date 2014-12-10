<?php
//Database variables
	$servername = "localhost";
	$serveruser = "root";
	$serverpw = "";
	$dbname = "musicstore";

//connect to the database
	$conn = new mysqli($servername, $serveruser, $serverpw, $dbname);

	//check the connection
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	
	//Get HTML data into Variables
	$dID = $_GET["cd"];
	
	//get the correct album from the Database
	$sql = "SELECT * FROM album WHERE ID = '$dID'";
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	if (mysqli_num_rows($result)) {
		// output data for record
		while($row = mysqli_fetch_assoc($result)) {
			$data = array('rID' => $row['ID'], 'artist' => $row['Artist'], 'album' => $row['Name'],'quantity' => $row['Quant'],'price' => $row['Price']);
			$album[] = $data; 
		}
	}
	if(isset($_GET['disk'])) {
		$mediaType = "Compact Disk";
	}
	if(isset($_GET['digital'])) {
		$mediaType = "Mp3 Files";
	}
	
	
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
			<img src="./images/Cart.png" alt="" class="fltleft">
		<?php
			echo '<form action="">';
			echo 'Item: <input type="text" disabled="true" value="'.$mediaType.'"><br>';
			echo 'Artist: <input type="text" disabled ="true" value="'.$album[0]['artist'].'"/><br>';
			echo 'Album: <input type="text" disabled="true" value="'.$album[0]['album'].'"/><br>';
			
			
			echo '</form>';
		?>	
		</div>
	</div>
	</body>
</html>