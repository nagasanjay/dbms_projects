<html>
<head><title>registeration</title>                        
</head>
<body><center>
<?php
$conn=oci_connect('nithesh','chandra96295','//localhost/orcl');
if(isset($_POST['register'])){
$s_id=$_POST['s_id'];
$t_id=$_POST['trainer'];
$fees=$_POST['fees'];
$query=oci_parse($conn,'insert into register values (:s_id,(select t_id from trainer where t_name = :t_id),current_date,:fees)');
oci_bind_by_name($query,':s_id',$s_id);
oci_bind_by_name($query,':t_id',$t_id);
oci_bind_by_name($query,':fees',$fees);
oci_execute($query);
echo 'registered';
?>
<form>
<button formaction='main.php'>back</button>
</form>
<?php
}
else{
?>
<form action='' method='post'>
student id <input type='text' name='s_id'><br>
trainer id <input list='trainer' name='trainer'>
<?php
$query=oci_parse($conn,'select * from trainer');
oci_execute($query);
print '<datalist id="trainer">';
$row=oci_fetch_row($query);
while($row){
	
	print '<option value=';echo $row[0];print'><br>';
	$row=oci_fetch_row($query);
}
print '</datalist>';
?>
<br>fees paid <input type='radio' name='fees' value='500'>500
<input type='radio' name='fees' value='1000'>1000
<br><input type='submit' name='register'>
</form>
<?php
}
oci_close($conn);
?>
<img src="gym1.jpg" height="400" width="600">
</center>
</body>
</html>