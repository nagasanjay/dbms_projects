<html>
<head>
</head>
<body>
<?php
$conn=oci_connect('goutam','ORACLE','//localhost/orcl');

if($_POST['dept']!='null')
{
$name=$_POST['dept'];
echo $name;

$query=oci_parse($conn,'SELECT book_name FROM books WHERE dept_id=(SELECT dept_id FROM department WHERE dept_name=:name)');
oci_bind_by_name($query,':name',$name);
oci_execute($query);
$row=oci_fetch_row($query);

?><form action='borrow.php' method='post'> books:<br>
<?php

while($row){
	?><input type='radio' name='book' value='<?php echo $row[0];?>'><?php echo $row[0];?><br>
	<?php $row = oci_fetch_row($query);
}?>
<input type="radio" name="choice" value="1">Borrow<input type="radio" name="choice" value="2">Return<br>
<input type='submit' name='borrow' value='submit'>
</form>
<?php
}




else if($_POST['auth']!='null')
{
$name=$_POST['auth'];
$query=oci_parse($conn,'SELECT book_name FROM books WHERE author_id=(SELECT author_id FROM author WHERE author_name=:name)');
oci_bind_by_name($query,':name',$name);
oci_execute($query);
$row=oci_fetch_row($query);
?>
<form action='borrow.php' method='post'>
books:<br>
<?php
while($row){
	?><input type='radio' name='book' value='<?php echo $row[0];?>'><?php echo $row[0];?><br>
	<?php $row = oci_fetch_row($query);
}?>
<input type='submit' name='borrow' value='borrow'>
</form>
<?php
}





else if($_POST['bok']!='null'){
	echo "Do you want to borrow";
	echo $_POST['book']."?";
	?>
	<form action = "borrow.php" method="post">
	<input type="radio" name="book" value="<?php $_POST['book']?>" hidden>
	<input type="submit" value="borrow">
	</form>
	<?php
}

oci_close($conn);
?>
</body>
</html>