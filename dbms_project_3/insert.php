<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="w3.css"></head>
<body><div class='w3-container w3-padding'>
<?php
if(isset($_POST['submit'])){
$conn = oci_connect('project','dbmsproject','//localhost/orcl');
$regno = $_POST['regno'];
$owner = $_POST['owner'];
$type = $_POST['type'];
$model = $_POST['model'];
$query = oci_parse($conn,"insert into regvehicle values (:regno,:owner,:type,:model)");
oci_bind_by_name($query,':regno',$regno);
oci_bind_by_name($query,':owner',$owner);
oci_bind_by_name($query,':type',$type);
oci_bind_by_name($query,':model',$model);
if(oci_execute($query))
	echo 'inserted';
else
	echo 'error';
oci_close($conn);
?>
<form class='w3-container' action="tollgate.html">
<br><button class='w3-input'>back</button>
</form>
<?php
}else{
?>
<form action='' class='w3-container' method="post">
Reg No: <input class='w3-input'type="text" name="regno"><br>
Owner : <input class='w3-input'type="text" name="owner"><br>
Type  : <input class='w3-input'type="text" name="type"><br>
Model : <input class='w3-input'type="text" name="model"><br>
<input type="submit" name='submit' value="insert">
</form>
<form action="tollgate.html">
<br><button class='w3-input'>back</button>
</form>
<?php
}
?>
</div></body>
</html>