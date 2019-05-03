<?php
//include('php.ini');
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
mysqli_close($conn);
?>
<html>
<head>

<title> ANIMAL SHELTER </title>
<h1> Welcome to Animal Shelter</h1>
</head>
<body background= "dog.jpg">

<form action="login.php" method="post">
		Enter your username :<input name="user" type="text"> </input><br>
		<hr>
		Enter your password :<input type="password" name="pass"></input><br>
		<input type="submit" name="enter"> </input><br>
</form>
<hr>
<h3>NEW USER? </h3>
<form action="newuser.php" method=post">
 Click here to register  <input type="submit" name "REGISTER"></input> <br>
</form>
</body>
</html>