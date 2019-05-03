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
$Age=$_POST['Age'];
$Type= mysqli_real_escape_string($conn,$_POST['Type']);
$Breed= mysqli_real_escape_string($conn,$_POST['Breed']);
$Size= mysqli_real_escape_string($conn,$_POST['Size']);
$Color= mysqli_real_escape_string($conn,$_POST['Color']);
$Animal_ID=NULL;
$Posted_Date="2019-05-03";
$Availability='1';

//$SELECT = "SELECT email from profile where email = ? Limit 1";
$INSERT = "INSERT Into animal( Animal_ID, Description, Age, Name, Type,
Breed, Size, Color,Availability, Posted_date) values (?,?,?,?,?,?,?,?,?,?)";
/*
/*$stmt=mysqli_prepare($conn,$SELECT);
mysqli_stmt_bind_param($stmt,"s",$Email);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt,$Email);
mysqli_stmt_store_result($stmt);
$rnum=mysqli_stmt_num_rows($stmt);

if($rnum==0)
{
	mysqli_stmt_close($stmt);
	
	$stmt=mysqli_prepare($conn,$INSERT);
	if ( !$stmt ) {
  die('mysqli error: '.mysqli_error($conn);
	*/
	if($stmt=mysqli_prepare($conn,$INSERT)){
	
	mysqli_stmt_bind_param($stmt,"isisssssis",$Animal_ID,$Description,$Age,$Name,$Type,$Breed,
	$Size,$Color,$Availability,$Posted_date);
	if(mysqli_stmt_execute($stmt)){
		echo "records inserted successfully."
		header("Location:index.php");
	} else {
		"ERROR: Could not execute query $INSERT.".mysqli_error($conn);
	}}
	else {
		echo "Error: could not prepare query $INSERT.".mysqli_error($conn);
	}
	/*
	if(!mysqli_stmt_execute($stmt))
	{
		die('mysqli error: '.mysqli_stmt_error($stmt));
	}	
	
	
	header("Location:index.php");
	
}
else {
	echo "someone already regiestered";
}*/

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>