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

$Animal_ID=$_POST['Animal_ID'];
$Adoption_ID=NULL;
$Profile_ID="2";
$Adopt_date= "20190503";
$Adopt_fee= "100";

//$SELECT = "SELECT email from profile where email = ? Limit 1";
$INSERT = "INSERT Into adoption( Adoption_ID,Profile_ID,Adopt_date,Adopt_fee,Animal_ID)
values (?,?,?,?,?,?)";

	$stmt=mysqli_prepare($conn,$INSERT);
	mysqli_stmt_bind_param($stmt,"iisii",$Adoption_ID,$Profile_ID,$Adopt_date,$Adopt_fee,$Animal_ID);
	mysqli_stmt_execute($stmt);
	
	/*if(!mysqli_stmt_execute($stmt))
	{
		die('mysqli error: '.mysqli_stmt_error($stmt));
	}	
	*/
	
	header("Location:index.php");
	
}
else {
	echo "someone already regiestesf";
}
mysqli_stmt_close($stmt);
//$conn->close();
mysqli_close($conn);
?>