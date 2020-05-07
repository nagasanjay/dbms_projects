<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="w3.css"></head>
<body><div class='w3-container w3-paddinig'>
<?php
$conn = oci_connect('project','dbmsproject','//localhost/orcl');
if(isset($_POST['enter'])){
	$regno = $_POST['reg'];$owner=$_POST['owner'];
	$query = oci_parse($conn,'select * from regvehicle where regno = :regno');
	oci_bind_by_name($query,':regno',$regno);
	oci_execute($query);
	$row = oci_fetch_row($query);
	?>
	old details:
	<table border='1' class='w3-table-all w3-hoverable w3-card-4 w3-centered'>
	<?php
	while($row){	
	echo "<tr>";
	foreach ($row as $value){
		echo "<td>";
		echo $value;
		echo "</td>";
	}
	echo "</tr>";
	$row=oci_fetch_row($query);
	}
	?>
	</table>
	<br>updated details:
	<table border='1' class='w3-table-all w3-hoverable w3-card-4 w3-centered'>
	<?php
	$query1 = oci_parse($conn,'update regvehicle set owner = :owner where regno = :regno');
	oci_bind_by_name($query1,':regno',$regno);
	oci_bind_by_name($query1,':owner',$owner);
	oci_execute($query1);
	oci_execute($query);
	$row = oci_fetch_row($query);
	while($row){	
	echo "<tr>";
	foreach ($row as $value){
		echo "<td>";
		echo $value;
		echo "</td>";
	}
	echo "</tr>";
	$row=oci_fetch_row($query);
	}
	?></table><br><form action="tollgate.html">
<br><button>back</button>
</form>
<?php
}else{
	?>
	
<form action='' class='w3-container' method='post'>
Enter Reg No: <input class='w3-input'type="text" name="reg"><br>
Enter new owner: <input class='w3-input'type="text" name="owner"><br>
<input type="submit" class='w3-input'name='enter' value='enter'>
</form>
<?php
}
oci_close($conn);
?></div>
</body>
</html>