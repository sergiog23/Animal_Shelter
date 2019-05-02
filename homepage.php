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
<html>
<head>
<title>HOMEPAGE</title>
</head>
<h1>Welcome to Animal Shelter</h1>
<hr>
<h3>Add a new animal:</h3>
<form action="newAnimal.php" method="post">
<input type="submit" name="addA">
</form>
<h3>Make a donation:</h3>
<form action="newDonation.php" method="post">
<input type="submit" name="addD">
</form>
<h3>Adopt animal:</h3>
<form action="newAdoption.php" method="post">
<input type="submit" name="adoption">
</form>
<h3> Animals</h3>
<table>
<table border ='1'>
<hr>
<tr>
<th>Animal_ID</th>
<th>Description</th>
<th>Age</th>
<th>Type</th>
<th>Breed</th>
<th>Size</th>
<th>Color</th>
<th>Availability</th>
</tr>

<?php
$sql = 'SELECT * from animal';
$result=mysqli_query($conn,$sql);
if(!$result){
	die('Could not get data: '.mysqli_error());
} 
while($row=mysqli_fetch_assoc($result)){
	//echo "Profile_ID: {$row['Profile_ID']} <br>";
	echo "<tr>";
	echo "<td>".$row['Animal_ID']."</td>";
	echo "<td>".$row['Description']."</td>";
	echo "<td>".$row['Age']."</td>";
	echo "<td>".$row['Type']."</td>";
	echo "<td>".$row['Breed']."</td>";
	echo "<td>".$row['Size']."</td>";
	echo "<td>".$row['Color']."</td>";
	echo "<td>".$row['Availability']."</td>";
	echo "</tr>";
}
 mysqli_free_result($result);
//echo "Fetched data successfully\n";
//mysqli_close($conn);
?>

</table>


</html>

