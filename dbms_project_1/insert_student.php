<head></head><body><center>
<?php
$conn = oci_connect('nithesh','chandra96295','//localhost/orcl');
if(isset($_POST['insert'])){
	$s_id=$_POST['id'];
	$name=$_POST['name'];
	$s_no=$_POST['number'];
	$s_weight=$_POST['weight'];
   $query = oci_parse($conn,"insert into students values (:s_id,:s_name,:s_no,:s_weight)");
   oci_bind_by_name($query,':s_id',$s_id);
   oci_bind_by_name($query,':s_name',$name);
   oci_bind_by_name($query,':s_no',$s_no);
   oci_bind_by_name($query,':s_weight',$s_weight);
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
	 student name<input type='text' name='name'>
	 <br>
	 student phnumber<input type='text' name='number'>
	 <br>
	 student id<input type='text' name='id'>
	 <br>
	 student weight<input type='text' name='weight'>
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