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
<head>

<title> DATABASE </title>
</head>
<body>
<table>
<h1> DATABASE TABLES  </h1>
<hr>
<table border = '1'>
<h2>Profiles</h2>
<tr>
<th>profile_id</th>
<th>fname</th>
<th>lname</th>
<th>phone</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($result)){
	//echo "Profile_ID: {$row['Profile_ID']} <br>";
	echo "<tr>";
	echo "<td>".$row['Profile_ID']."</td>";
	echo "<td>".$row['Fname']."</td>";
	echo "<td>".$row['Lname']."</td>";
	echo "<td>".$row['Phone']."</td>";
	echo "</tr>";
}
 mysqli_free_result($result);
//echo "Fetched data successfully\n";
//mysqli_close($conn);
//header("location:login.html");
?>


</table>
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
<body>
<table>
<hr>
<table>
<table border = '1'>
<h3>Adoption</h3>
<tr>
<th>Adoption_ID</th>
<th>Profile_ID</th>
<th>Adopt_date</th>
<th>Adopt_fee</th>
<th>Animal_ID</th>
</tr>
<?php
$sql = 'SELECT * from adoption';
$result=mysqli_query($conn,$sql);
if(!$result){
	die('Could not get data: '.mysqli_error());
} 
while($row=mysqli_fetch_assoc($result)){
	//echo "Profile_ID: {$row['Profile_ID']} <br>";
	echo "<tr>";
	echo "<td>".$row['Adoption_ID']."</td>";
	echo "<td>".$row['Profile_ID']."</td>";
	echo "<td>".$row['Adopt_date']."</td>";
	echo "<td>".$row['Adopt_fee']."</td>";
	echo "<td>".$row['Animal_ID']."</td>";
	//echo "<td>".$row['Size']."</td>";
	//echo "<td>".$row['Color']."</td>";
	//echo "<td>".$row['Availability']."</td>";
	echo "</tr>";
}
 mysqli_free_result($result);
//echo "Fetched data successfully\n";
//mysqli_close($conn);

?>
</table>

<body>
<table>
<hr>
<table border = '1'>
<h3>Inquiry</h3>
<tr>

<th>Inquiry_ID</th>
<th>Profile_ID</th>
<th>Admin_ID</th>
<th>Animal_ID</th>
<th>Question</th>
<th>Answer</th>
<th>Inquiry Date</th>
<th>Answer Date</th>

</tr>
<?php
$sql = 'SELECT * from inquiry';
$result=mysqli_query($conn,$sql);
if(!$result){
	die('Could not get data: '.mysqli_error());
} 
while($row=mysqli_fetch_assoc($result)){
	//echo "Profile_ID: {$row['Profile_ID']} <br>";
	echo "<tr>";
	echo "<td>".$row['Inquiry_ID']."</td>";
	echo "<td>".$row['Profile_ID']."</td>";
	echo "<td>".$row['Admin_ID']."</td>";
	echo "<td>".$row['Animal_ID']."</td>";
	echo "<td>".$row['Question']."</td>";
	echo "<td>".$row['Answer']."</td>";
	echo "<td>".$row['Inquiry_date']."</td>";
	echo "<td>".$row['Answer_date']."</td>";
	echo "</tr>";
}
 mysqli_free_result($result);
//echo "Fetched data successfully\n";
//mysqli_close($conn);

?>
</table>

<table>
<body>
<table>
<hr>
<table border = '1'>
<h3>Donation</h3>
<tr>

<th>Donation_ID</th>
<th>Profile_ID</th>
<th>Donation date</th>
<th>Donation Amount</th>
<th>Animal_ID</th>

</tr>
<?php
$sql = 'SELECT * from donation';
$result=mysqli_query($conn,$sql);
if(!$result){
	die('Could not get data: '.mysqli_error());
} 
while($row=mysqli_fetch_assoc($result)){
	//echo "Profile_ID: {$row['Profile_ID']} <br>";
	echo "<tr>";
	echo "<td>".$row['Donation_ID']."</td>";
	echo "<td>".$row['Profile_ID']."</td>";
	echo "<td>".$row['Donate_date']."</td>";
	echo "<td>".$row['Donate_amount']."</td>";
	echo "<td>".$row['Animal_ID']."</td>";
	echo "</tr>";
}
 mysqli_free_result($result);
//echo "Fetched data successfully\n";
//mysqli_close($conn);

?>


</table>
<table>
<hr>
<table border = '1'>
<h3>ADMIN</h3>
<tr>

<th>Admin_ID</th>
<th>First Name</th>
<th>Last name</th>
<th>username</th>


</tr>
<?php
$sql = 'SELECT * from admin';
$result=mysqli_query($conn,$sql);
if(!$result){
	die('Could not get data: '.mysqli_error());
} 
while($row=mysqli_fetch_assoc($result)){
	//echo "Profile_ID: {$row['Profile_ID']} <br>";
	echo "<tr>";
	echo "<td>".$row['Admin_ID']."</td>";
	echo "<td>".$row['Fname']."</td>";
	echo "<td>".$row['Lname']."</td>";
	echo "<td>".$row['Username']."</td>";
	echo "</tr>";
}
 mysqli_free_result($result);
//echo "Fetched data successfully\n";
mysqli_close($conn);
?>
</table>
</body>