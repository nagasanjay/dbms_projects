<html>
<head></head>
<body>
<?php 
$conn = oci_connect('goutam','ORACLE','//localhost/orcl');
$name = $_POST['book'];
$choice = $_POST['choice'];

if($choice == 1){
	
$query = oci_parse($conn,"SELECT count from books where book_name = :name");
oci_bind_by_name($query,':name',$name);
oci_execute($query);

$row = oci_fetch_assoc($query);
$var = $row['COUNT'];
if($var == 0){
	echo 'not available';
	$q = oci_parse($conn,'update books set availability = :av where book_name = :name');
	oci_bind_by_name($q,':name',$name);
	$no = 'no';
	oci_bind_by_name($q,':av',$no);
	oci_execute($q);
}else{
$var--;
$query = oci_parse($conn,'update books set count = :var where book_name = :name');
oci_bind_by_name($query,':var',$var);
oci_bind_by_name($query,':name',$name);

}
}else if($choice == 2){
$query = oci_parse($conn,"SELECT count from books where book_name = :name");
oci_bind_by_name($query,':name',$name);
oci_execute($query);

$row = oci_fetch_assoc($query);
$var = $row['COUNT'];
if($var == 0){
	$q = oci_parse($conn,'update books set availability = :av where book_name = :name');
	oci_bind_by_name($q,':name',$name);
	$yes = 'yes';
	oci_bind_by_name($q,':av',$yes);
	oci_execute($q);
}

$query = oci_parse($conn,"UPDATE books SET count = count+1 where book_name = :name");
oci_bind_by_name($query,':name',$name);
}
if($var != 0 and $choice == 1 ){
	echo 'borrowed';
}
else if(oci_execute($query)and $choice == 2 ){
	echo 'returned';
}
?>
<form action="main1.php">
<input type="submit" value="back">
</form>
<?php
oci_close($conn);
?>
</body>
</html>
