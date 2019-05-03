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

$Animal_ID=mysqli_real_escape_string($conn,$_POST['Animal_ID']);
$Adoption_ID=NULL;
$Profile_ID="2";
$Adopt_date= "20190503";
$Adopt_fee= "100";

$INSERT = "INSERT Into adoption( Adoption_ID,Profile_ID,Adopt_date,Adopt_fee,Animal_ID)
values (?,?,?,?,?)";

	if(!$stmt=mysqli_prepare($conn,$INSERT)){
		echo "records inserted successfully.";
		die('mysqli_error:'.mysqli_error($conn));
		}
	//$stmt=mysqli_prepare($conn,$INSERT);

	
	mysqli_stmt_bind_param($stmt,"iisii",$Adoption_ID,$Profile_ID,$Adopt_date,$Adopt_fee,$Animal_ID);
	if(!mysqli_stmt_execute($stmt)){
		die('mysqli_error:'.mysqli_stmt_error($stmt));
	}
	mysqli_stmt_close($stmt);
	
	$UPDATE="UPDATE animal SET Availability = '0' WHERE animal.Animal_ID = $Animal_ID";
	$stmt=mysqli_prepare($conn,$UPDATE);
	mysqli_stmt_bind_param($stmt,"i",$Availability);
	mysqli_stmt_execute($stmt);
	
	header("Location: Homepage.php");

mysqli_stmt_close($stmt);
//$conn->close();
mysqli_close($conn);
?>