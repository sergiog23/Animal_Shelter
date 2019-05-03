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
?>

<html>
<head>

<title>Inquire abount Animal </title>

<h1>Enter Animal ID and Question for which animal you want to inquire  about! </h1>
</head>

<form action="insertInquiry.php" method ="POST">
	<table>
	<tr>
	<td>Animal_ID: </td>
	<td><input name="Animal_ID" type="number"></td>
	<tr></tr>
	<td>Question: </td>
	<td><input name="Question" type="text"</td>
	<tr></tr>
	<td><input type="submit" value="Submit"</td>
	</tr>
	
	</table>


</form>
<hr>
<table>
<table border = '1'>
<h3>Animals</h3>
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
$sql = 'SELECT * from animal where Availability = 1';
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

</html>