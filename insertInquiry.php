<?php
include('php.ini');
$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";

// Create connection
$conn = new mysqli($servername , $dbusername , $dbpassword);
mysqli_select_db($conn,'animal_shelter');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}

$Inquiry_ID=NULL;
$Profile_ID="2";
$Admin_ID="100";
$Animal_ID=mysqli_real_escape_string($conn,$_POST['Animal_ID']);
$Question= mysqli_real_escape_string($conn,$_POST['Question']);
$Answer=NULL;
$Inquiry_date="20190503";
$Answer_date="20190503";


//$SELECT = "SELECT email from profile where email = ? Limit 1";
$INSERT = "INSERT Into inquiry(Inquiry_ID,Profile_ID,Admin_ID,Animal_ID,Question,Answer,
Inquiry_date,Answer_date) values (?,?,?,?,?,?,?,?)";


	$stmt=mysqli_prepare($conn,$INSERT);
	
	mysqli_stmt_bind_param($stmt,"iiiissss",$Inquiry_ID,$Profile_ID,$Admin_ID,$Animal_ID,$Question,$Answer,$Inquiry_date,
	$Answer_date);
	if(!mysqli_stmt_execute($stmt)){
		echo "error";
		die('mysqli_error:'.mysqli_stmt_error($stmt));
			}
	
	header("Location:homepage.php");
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>