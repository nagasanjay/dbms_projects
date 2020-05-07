<html>
<head><meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="w3.css"></head>
</html>
<body><div class='w3-container w3-paddiing'>
<div class='w3-container w3-padding-large'>

<?php
if(isset($_POST['display'])){
$choice = $_POST['display'];
$conn = oci_connect('project','dbmsproject','//localhost/orcl');
if($choice == 1){
$query=oci_parse($conn,'select * from regvehicle');
?>

<table border='1' class='w3-table-all w3-hoverable w3-card-4 w3-centered'><tr><th>Reg No</th><th>owner</th><th>Type</th><th>Model</th></tr><?php
}
else if($choice == 2){
$query=oci_parse($conn,'select * from chargevehicle');
?>
<table border='1' class='w3-table-all w3-hoverable w3-card-4 w3-centered'><tr><th>Type</th><th>oneway</th><th>twoway</th></tr>
<?php
}
else if($choice == 3){
$query = oci_parse($conn,'select register.ctime, register.regno, register.trip, register.charge, regvehicle.owner,regvehicle.type, regvehicle.model from register inner join regvehicle on register.regno = regvehicle.regno');
?>
<table border='1' class='w3-table-all w3-hoverable w3-card-4 w3-centered'><tr><th>time</th><th>Reg No</th><th>trip</th><th>charge</th><th>Owner</th><th>Type</th><th>Model</th></tr>
<?php
}
else if($choice == 5){
$query = oci_parse($conn,'select register.regno,register.trip, regvehicle.owner from register inner join regvehicle on register.regno = regvehicle.regno');
?>
<table border='1' class='w3-table-all w3-hoverable w3-card-4 w3-centered'><tr><th>Regno</th><th>Trip</th><th>Owner</th></tr>
<?php
}
else if($choice == 4){
$query = oci_parse($conn,'select count(distinct regno) from register');
$query1 = oci_parse($conn,'select distinct reg.regno, rec.owner, rec.type, rec.model  from register reg inner join regvehicle rec on reg.regno = rec.regno');
?>
<table border='1' class='w3-table-all w3-hoverable w3-card-4 w3-centered'><tr><th>No. of vehicles</th></tr>
<?php
}
}
else{
$choice = $_POST['display1'];
$conn = oci_connect('project','dbmsproject','//localhost/orcl');
$query = oci_parse($conn,'select * from register where regno = : regno');
oci_bind_by_name($query,':regno',$choice);
?>
<table border='1' class='w3-table-all w3-hoverable w3-card-4 w3-centered'><tr><th>time</th><th>Reg No</th><th>trip</th><th>charge</yh></tr><?php
}
if(oci_execute($query)){
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
print "</table>";

if($choice == 4){
	echo "<br><table border='1' class='w3-table-all w3-hoverable w3-card-4 w3-centered'><tr><th>Regno</th><th>Owner</th><th>type</th><th>model</th></tr>";
	oci_execute($query1);
	$row = oci_fetch_row($query1);
	while($row){	
		echo "<tr>";
		foreach ($row as $value){
			echo "<td>";
			echo $value;
			echo "</td>";
		}
		echo "</tr>";
		$row=oci_fetch_row($query1);
	}
	print "</table>";
}
?>
<form class='w3-container' action="tollgate.html">
<br><button class='w3-input'>back</button>
</form>
<?php
}else{
	echo "error";
}
oci_close($conn);
?>
</div></div></body>
</html>