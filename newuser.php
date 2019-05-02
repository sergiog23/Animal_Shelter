<?php 

include('php.ini');

?>

<html>
<head>

<title> New User </title>

<h1> Register for animal shelter </h1>
</head>

<form action="insertUser.php" method ="POST">
	<table>
	<tr>
	<td>Name: </td>
	<td><input name="Fname" type="text"></td>
	</tr>
	<tr>
	<td>Last Name:</td>	
	<td><input name="Lname" type="text"></td>
	</tr>
	<tr>
	<td>Phone:</td>
	<td><input name="Phone" type="text"></td>
	</tr>
	<tr>
	<td>Email:</td>
	<td><input name="Email" type="text"></td>
	</tr>
	<tr>
	<td>Username</td>
    <td><input name="Username" type="text"></td>
	</tr>
	<tr>
	<td>Password:</td>
	<td><input name="Password" type="text"></td>
	</tr>
	<tr>
	<td><input type="submit" value="Submit"</td>
	</tr>
	</table>

</form>


</html>