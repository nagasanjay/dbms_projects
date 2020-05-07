<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="w3.css"></head>
</html>
<body><div class='w3-container w3-paddiing'>
<div class='w3-container w3-padding-large'>

<?php
if(isset($_POST['del']) && isset($_POST['reg'])){
$choice = $_POST['del'];
$reg = $_POST['reg'];
$conn = oci_connect('project','dbmsproject','//localhost/orcl');

if($choice == 1)
	$query = oci_parse($conn , "DELETE FROM REGVEHICLE WHERE REGNO = :reg");
else
	$query = oci_parse($conn , "DELETE FROM REGISTER WHERE REGNO = :reg");

oci_bind_by_name($query,":reg",$reg);

if(oci_execute($query))
	echo '<center><h1>deleted</h1><br><form action="tollgate.html"><br><button>back</button></form></center>';
else
	echo 'error';
oci_close($conn);
}
else{
?>
<form action=""  class='w3-container' method="post">
<input type="radio" name="del" value="1">  Delete Registered vehicle<br>
<input type="radio" name="del" value="2">  Delete the records of a vehicle<br><br>
<label>Reg no. of the vehicle </label><br><input class='w3-input' type="text" name="reg" autocomplete required><br>
<input class='w3-input' type="submit" name="submit" value="Delete">
</form>
<form action="tollgate.html">
<br><button>back</button></form>
<?php
}
?>
</div>
</div>
</body>
</html>
