<html>
<head><title>display</title></head>
 <body><center>
 <?php
 if(isset($_POST['show'])){
	 $choice=$_POST['display'];
	 $conn=oci_connect('nithesh','chandra96295','//localhost/orcl');
	 if($choice==1){
		 $query=oci_parse($conn,'select * from students');
		 
	 }
	 else if($choice==2){
		 $query=oci_parse($conn,'select * from trainer');
	 }
	else if($choice==3){
	      $query=oci_parse($conn,'select * from register');
		  
	}
	oci_execute($query);
	$row=oci_fetch_row($query);
	print '<table border="1">';
	while($row){
	      print '<tr>';
		  foreach ($row as $value){
		     print '<td>';
			 echo $value;
			 print '</td>';
			 
		  }
		  print '</tr>';
		  $row=oci_fetch_row($query);
	}
	print '</table>';
	oci_close($conn);
	?>
	<form action='main.php'>
	<input type='submit' value='back'>
	</form>
	<?php
 }
 else{
	 ?>
 
<form action='' method='post'>
<input type='radio' name='display' value='1'>students details
<br>
<input type='radio' name='display' value='2'>trainer details
<br>
<input type='radio' name='display' value='3'>registration details
<br>
<input type='submit' name='show' value='show'>
</form>
 <?php
 }
 ?>
 <img src="gym1.jpg" height="400" width="600">

 
 </center>
 </body>
 </html>