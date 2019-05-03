<?php 

include('php.ini');

?>

<html>
<head>

<title>Insert Animal </title>

<h1>Add Animal</h1>
</head>

<form action="insertAnimal.php" method ="POST">
	<table>
	<tr>
	<td>Name: </td>
	<td><input name="Name" type="text"></td>
	</tr>
	<tr>
	<td>Age: </td>
	<td><input name="Age" type="number"></td>
	</tr>
	<tr>
	<td>Description:</td>	
	<td><input name="Description" type="text"></td>
	</tr>
	<tr>
	<td>Type:</td>
	<td><input name="Type" type="text"></td>
	</tr>
	<tr>
	<td>Breed:</td>
	<td><input name="Breed" type="text"></td>
	</tr>
	<tr>
	<td>Size:</td>
    <td><input name="Size" type="text"></td>
	</tr>
	<tr>
	<td>Color:</td>
	<td><input name="Color" type="text"></td>
	</tr>
	<tr>
	<td><input type="submit" value="Submit"</td>
	</tr>
	</table>

</form>


</html>