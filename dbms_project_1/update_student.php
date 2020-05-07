<head></head><body><center>
<?php
$conn = oci_connect('nithesh','chandra96295','//localhost/orcl');
if(isset($_POST['insert'])){
	$s_id=$_POST['id'];
	$s_no=$_POST['number'];
	$s_weight=$_POST['weight'];
   $query = oci_parse($conn,"update students set s_num = :s_no where (s_id = :s_id)");
   
   oci_bind_by_name($query,':s_id',$s_id);
   oci_bind_by_name($query,':s_no',$s_no);
   $query1=oci_parse($conn,"update students set s_weight = :s_weight where s_id=:s_id");
   oci_bind_by_name($query1,':s_weight',$s_weight);
   oci_bind_by_name($query1,':s_id',$s_id);
   oci_execute($query);
   oci_execute($query1);
   echo 'updated';
?>
<form>
<button formaction='main.php'>back</button>
</form>
<?php
}
else{
?>
<form action ='' method='POST'>
	 student id<input type='text' name='id'>
	 <br>
	 student phonenumber<input type='text' name='number'>
	 <br>
	 student weight<input type='text' name='weight'>
	 <br>
	 <input type='submit' name="insert" value='update'>
</form>
<?php
}
oci_close($conn);
?>
<img src="gym1.jpg" height="400" width="600">
</center>
</body>
</html>