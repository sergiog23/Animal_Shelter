<?php
include('php.ini');
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
//mysqli_close($conn);
mysqli_select_db($conn,'animal_shelter');

$inputuser = mysqli_real_escape_string($conn, $_POST["user"]);
$inputpass = mysqli_real_escape_string($conn, $_POST["pass"]);

$sql = "SELECT profile_id FROM profile WHERE username = '$inputuser' and password = '$inputpass'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$active = $row['active'];

$count = mysqli_num_rows($result);
if($count == 1)
{
	header("location: database.php");
}
else
{
	header("location: fail.php");
}

mysqli_close($conn);
?>