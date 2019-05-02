<?
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
//mysqli_close($conn);
mysqli_select_db($conn,'animal_shelter');
$inputuser = mysql_real_escape_string($_POST['user']);
$inputpass = mysql_real_escapte_string($_POST['pass']);

$query="SELECT * from `profile` WHERE `Username` ='$inputuser' AND `password	`='$inputpass'";


$result=mysqli_query($conn,$query);

if(mysql_num_rows($result)==1){
	header('Location: database.php');
	die();
}
else {
	header('Location: fail.php');
}

/*$row=mysqli_fetch_array($result);
$rowpass=mysqli_fetch_array($resultpass);

$serveruser=$row["username"];
$serverpass=$row["password"];

if($serveruser && $serverpass){
	if(!$result){
		die("Username or password is invalid");
	}
	
	echo "<br><center> Database output</b></center><br><br>";
	echo $inputpass;
	echo $serverpass;
}
if($inputpass==$serverpass){
	header('Location: database.php');
}
else {
	//header ('Location: fail.php');
}
//header('Location:fail.php');

mysqli_close($conn);
/*if( $user== "sergiogee" && $pass=="dallas"){
	echo "welcome"."\n".$user;
	header("Location:database.php");
}

else {
	echo "incorrect login";
	header("Location:fail.php");
}*/
mysqli_close($conn);
?>