<html>
<head><title>display</title></head>
 <body>
 <?php
 if(isset($_POST['show'])){
	 $choice=$_POST['display'];
	 $conn=oci_connect('goutam','ORACLE','//localhost/orcl');
	 if($choice==1){
		 $query=oci_parse($conn,'select * from books');
		 
	 }
	 else if($choice==2){
		 $query=oci_parse($conn,'select * from author');
	 }
	else if($choice==3){
	      $query=oci_parse($conn,'select * from department');
		  
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
	<form action='main1.php'>
	<input type='submit' value='back'>
	</form>
	<?php
 }
 else{
	 ?>
 
<form action='' method='post'>
<input type='radio' name='display' value='1'>book details
<br>
<input type='radio' name='display' value='2'>author details
<br>
<input type='radio' name='display' value='3'>department details
<br>
<input type='submit' name='show' value='show'>
</form>
 <?php
 }
 ?>
 
 
 
 </body>
 </html>