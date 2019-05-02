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

$Fname= mysqli_real_escape_string($conn,$_POST['Fname']);
$Lname= mysqli_real_escape_string($conn,$_POST['Lname']);
$Phone= mysqli_real_escape_string($conn,$_POST['Phone']);
$Email= mysqli_real_escape_string($conn,$_POST['Email']);
$Username= mysqli_real_escape_string($conn,$_POST['Username']);
$Password= mysqli_real_escape_string($conn,$_POST['Password']);
$Profile_ID=NULL;
$Join_Date="20190502";


$SELECT = "SELECT email from profile where email = ? Limit 1";
$INSERT = "INSERT Into profile( Profile_ID, Fname, Lname, Phone, Email,
Username, Password,Join_date) values (?,?,?,?,?,?,?,?)";

$stmt=mysqli_prepare($conn,$SELECT);
mysqli_stmt_bind_param($stmt,"s",$Email);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt,$Email);
mysqli_stmt_store_result($stmt);
$rnum=mysqli_stmt_num_rows($stmt);

if($rnum==0)
{
	mysqli_stmt_close($stmt);
	
	$stmt=mysqli_prepare($conn,$INSERT);
	/*if ( !$stmt ) {
  die('mysqli error: '.mysqli_error($conn);
}*/
	mysqli_stmt_bind_param($stmt,"isssssss",$Profile_ID,$Fname,$Lname,$Phone,$Email,$Username,
	$Password,$Join_Date);
	
	if(!mysqli_stmt_execute($stmt))
	{
		die('mysqli error: '.mysqli_stmt_error($stmt));
	}	
	
	
	header("Location:index.php");
	
}
else {
	echo "someone already regiestesf";
}
mysqli_stmt_close($stmt);
//$conn->close();

mysqli_close($conn);
?>