<html>
<head><title>attendance</title>
</head>
<body><center>
<?php
if(isset($_POST['submit'])){
$conn=oci_connect('nithesh','chandra96295','//localhost/orcl');
$id=$_POST['id'];
$query=oci_parse($conn,"insert into attendance values(current_date,:s_id)");
oci_bind_by_name($query,':s_id',$id);
if(oci_execute($query)){
	echo 'welcome'.$id;
}
else{
echo 'not identified';
}
oci_close($conn);
?>
<form>
<button formaction='main.php'>back</button>
</form>
<?php
}
else{
	?>

<form action='' method='POST'>
student id <input type='text' name='id'>
<input type='submit' name='submit' value='submit'>
</form>
<?php
}
?>
<img src="gym1.jpg" height="400" width="600">
</center>
</body>


</html>
