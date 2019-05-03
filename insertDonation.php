<?php
include('php.ini');
$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";

// Create connection
$conn = new mysqli($servername , $dbusername , $dbpassword);
mysqli_select_db($conn,'animal_shelter');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
$Animal_ID=mysqli_real_escape_string($conn,$_POST['Animal_ID']);
$Profile_ID="2";
$Donate_date="20190503";
$Donate_amount=mysqli_real_escape_string($conn,$_POST['Donate_amount']);
$Donation_ID=NULL;

//$SELECT = "SELECT email from profile where email = ? Limit 1";
$INSERT = "INSERT Into donation( Donation_ID, Profile_ID, Donate_date, Donate_amount,Animal_ID) 
values (?,?,?,?,?)";

	if(!$stmt=mysqli_prepare($conn,$INSERT)){
		echo "records inserted successfully.";
		die('mysqli_error:'.mysqli_error($conn));
		}
	
	mysqli_stmt_bind_param($stmt,"iisii",$Donation_ID,$Profile_ID,$Donate_date,$Donate_amount,$Animal_ID);
	if(!mysqli_stmt_execute($stmt)){
		die('mysqli_error:'.mysqli_stmt_error($stmt));
	}
	header("Location: Homepage.php");
mysqli_stmt_close($stmt);

mysqli_close($conn);
?>