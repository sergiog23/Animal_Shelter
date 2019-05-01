<?php
//include('login.html');
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
<head>

<title> ANIMAL SHELTER </title>
</head>
<body>
<body>
<form action="database.php" method="post">
		Enter your name<input name="name" type="text">
		<input type="submit">
</form>
</body>