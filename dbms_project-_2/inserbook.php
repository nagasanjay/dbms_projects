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
$aid=$_POST['aid'];
$did=$_POST['did'];
$ava=$_POST['ava'];
$count=$_POST['count'];
$query=oci_parse($conn,'insert into books values(:id,:name,:aid,:did,:ava,:count)');
oci_bind_by_name($query,':id',$id);
oci_bind_by_name($query,':name',$name);
oci_bind_by_name($query,':aid',$aid);
oci_bind_by_name($query,':did',$did);
oci_bind_by_name($query,':ava',$ava);
oci_bind_by_name($query,':count',$count);
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
book id<input type='text' name='id'>
<br>
book name<input type='text' name='name'>
<br>
author id<input type='text' name='aid'>
<br>
department id<input type='text' name='did'>
<br>
availability<input type='text' name='ava'>
<br>
count<input type='text' name='count'>
<br>
<input type='submit' name='insert'>
</form>
<?php
}
?>
