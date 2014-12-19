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
	
	//Proccess Data for the Login
	$hash = "";
	$uname = $_POST['uname'];
	$upsw = $_POST['psw'];

	//get the user from the DB and run some check to see if they can log in
	$sql = "SELECT * FROM uapg WHERE ua = '$uname'";
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	// if the user exists, get their password hash/	
	if (mysqli_num_rows($result)) {
    	// output data of each row
    	while($row = mysqli_fetch_assoc($result)) {
      	  $hash = $row["up"];
    	}
	}
	else {
		echo 'No such User <br>';
	}
	if (password_verify($upsw, $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>