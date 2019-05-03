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

$Name= mysqli_real_escape_string($conn,$_POST['Name']);
$Description= mysqli_real_escape_string($conn,$_POST['Description']);
$Age=mysqli_real_escape_string($conn,$_POST['Age']);
$Type= mysqli_real_escape_string($conn,$_POST['Type']);
$Breed= mysqli_real_escape_string($conn,$_POST['Breed']);
$Size= mysqli_real_escape_string($conn,$_POST['Size']);
$Color= mysqli_real_escape_string($conn,$_POST['Color']);
$Animal_ID=NULL;
$Posted_Date="20190503";
$Availability="1";

//$SELECT = "SELECT email from profile where email = ? Limit 1";
$INSERT = "INSERT Into animal( Animal_ID, Description, Age, Name, Type,
Breed, Size, Color,Availability, Posted_date) values (?,?,?,?,?,?,?,?,?,?)";



	
	if(!$stmt=mysqli_prepare($conn,$INSERT)){
		echo "records inserted successfully.";
		die('mysqli_error:'.mysqli_error($conn));
		}
	//$stmt=mysqli_prepare($conn,$INSERT);

	
	mysqli_stmt_bind_param($stmt,"isisssssis",$Animal_ID,$Description,$Age,$Name,$Type,$Breed,
	$Size,$Color,$Availability,$Posted_Date);
	if(!mysqli_stmt_execute($stmt)){
		die('mysqli_error:'.mysqli_stmt_error($stmt));
	}
	header("Location: Homepage.php");
	/*
	if(!mysqli_stmt_execute($stmt)){
		echo "records inserted successfully."
		die('mysqli_error:'.mysqli_stmt_error($stmt));
		//header("Location:homepage.php");
	}*/
mysqli_stmt_close($stmt);

mysqli_close($conn);
?>