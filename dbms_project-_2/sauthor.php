<html>
<head>
</head>
<body>
<?php
$conn=oci_connect('goutam','ORACLE','//localhost/orcl');
if(isset($_POST['borrow']))
{
	$name=$_POST['book'];
	$query1=oci_parse($conn,'SELECT count FROM book where name=:name');
	$name=$_POST['book'];
	oci_bind_by_name($query1,':name',$name);
	oci_execute($query1);
	if($query1>0)
	{
		$query1--;
		$query=oci_parse($conn,'UPDATE books SET count=:query where name=:name');
		oci_bind_by_name($query,':name',$name);
		oci_execute($query);
	}
    else
	{
		echo 'Unavailable';
	}
}
else if(isset($_POST['auth']))
{
	
?>
<form action='' method='post'>
<br>
<input list='books' name='book'>
<datalist id='book'>
<?php
$name=$_POST['auth'];
echo $name;
$query=oci_parse($conn,'SELECT name FROM books WHERE aid=(SELECT id FROM author WHERE name=:name)');
oci_bind_by_name($query,':name',$name);
oci_execute($query);
$row=oci_fetch_row($query);
echo $row[0];
while($row)
{
?>
<option value='<?php echo $row[0];?>'><br>

<?php
$row=oci_fetch_row($query);
}
?>
</datalist>
<input type='submit' name='borrow' value='borrow'>
</form>
<?php
}
oci_close($conn);
?>
</body>
</html>