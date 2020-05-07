<html>
<head>
</head>
<body>
<?php
if(isset($_POST['insert']))
{
	$conn=oci_connect('goutam','ORACLE','//localhost/orcl');
	$id=$_POST['id'];
$name=$_POST['name'];
$query=oci_parse($conn,'insert into department values(:id,:name)');
oci_bind_by_name($query,':id',$id);
oci_bind_by_name($query,':name',$name);
oci_execute($query);
echo 'inserted';
?>
<form action=''>
<button>back</button>
</form>
<?php
oci_close($conn);
}
else
{
	
?>

<form action='' method='POST'>
department id<input type='text' name='id'>
<br>
department name<input type='text' name='name'>
<br>
<input type='submit' name='insert'>
</form>
<?php
}
?>
