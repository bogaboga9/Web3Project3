<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Carl's Music Emporium - Login</title>
		<link rel="stylesheet" href="./css/musicstore.css">
		<link href='http://fonts.googleapis.com/css?family=ABeeZee|Fredoka+One|Nunito' rel='stylesheet' type='text/css'>
	</head>
	
	<body>
	<div id="wrapper">
		<?php
			include 'header.php'; 
		?>
		<br>
		<div id="login">
			<h2>Sign In</h2>
			<form action="person.php" method="post">
				User Name: <input type="text" name="uname" autofocus required />
				Password: <input type="password" name="psw" required />
				<input type="submit" />
			</form>
			<h2>Create Account</h2>
			<form action="create.php" method="post">				
				User Name: <input type="text" name="uname" required />
				Password: <input type="password" name="psw" required />
				Confirm Password: <input type="password" name="psw" required />
				<div class="login">
					First Name: <input type="text" name="fname" required />
					Last Name: <input type="text" name="lname" required />
				</div>
					Address: <br>
					Street: <input size="64" type="text" name="astreet" required /><br>
					Street 2: <input size="64" type="text" name="astreet2" /><br>
					City: <input size="32" type="text" name="acity" required />
					<div class="login">
						State: <input size="3" type="text" maxlength="2" name="astate" required />
						Zip Code: <input size="7" type="text" maxlength="5" name="azip" required />
					</div>
					<br>
					Telephone: <input type="tel" name="utel" />
					E-mail: <input size="64" type="email" name="email" required />
				<div class="login">
					<input type="submit" />
					<input type="reset" />
				</div>
			</form>
		</div>
	</div>
	</body>
</html>