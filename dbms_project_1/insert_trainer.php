<head></head><body><center>
<?php
$conn = oci_connect('nithesh','chandra96295','//localhost/orcl');
if(isset($_POST['insert'])){
	$s_id=$_POST['id'];
	$name=$_POST['name'];
   $query = oci_parse($conn,"insert into trainer values (:s_id,:s_name)");
   oci_bind_by_name($query,':s_id',$name);
   oci_bind_by_name($query,':s_name',$s_id);
   oci_execute($query);
   echo 'inserted';
?>
<form>
<button formaction='main.php'>back</button>
</form>
<?php
}
else{
?>
<form action ='' method='POST'>
	 trainer name<input type='text' name='name'>
	 <br>
	 trainer id<input type='text' name='id'>
	 <br>
	 <input type='submit' name="insert">
</form>
<?php
}
oci_close($conn);
?>
<img src="gym1.jpg" height="400" width="600">
</center>
</body>
</html>