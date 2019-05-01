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
	
mysqli_select_db($conn,'animal_shelter');
$sql = 'SELECT * from profile';
$result=mysqli_query($conn,$sql);
if(!$result){
	die('Could not get data: '.mysqli_error());
} 
?>
<head>

<title> ANIMAL SHELTER </title>
</head>
<body>
<table>
<h1> Profile</h1>
<hr>
<table border = '1'>
<tr>
<th>profile_id</th>
<th>fname</th>
<th>lname</th>
<th>phone</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result)){
	//echo "Profile_ID: {$row['Profile_ID']} <br>";
	echo "<tr>";
	echo "<td>".$row['Profile_ID']."</td>";
	echo "<td>".$row['Fname']."</td>";
	echo "<td>".$row['Lname']."</td>";
	echo "<td>".$row['Phone']."</td>";
	echo "</tr>";
}

mysqli_free_result($result);
//echo "Fetched data successfully\n";
mysqli_close($conn);
//header("location:login.html");
?>
</table>
<body>
<form action="login.html" method="post">
		Enter your name<input name="name" type="text">
		<input type="submit">
</form>
</body>