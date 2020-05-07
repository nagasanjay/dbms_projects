<html>
<head><title>Tollgate</title><meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="w3.css"></head>
<body><div class='w3-container w3-padding-large'>

<?php
$conn = oci_connect("project","dbmsproject","//localhost/orcl");

if(!$conn) {
	$m = oci_error();
	echo $m['message'],"\n";
	exit;
}

if(isset($_POST["charge"])){
$reg = $_POST["reg"];
$choice = $_POST["path"];

if($choice == 1){	
$query = oci_parse($conn,"insert into register values (current_date,:reg,'oneway',(select oneway from chargevehicle where type = (select type from regvehicle where regno = :reg)))");
$query2 = oci_parse($conn,"select oneway from chargevehicle where type = (select type from regvehicle where regno = :reg)");
}else if($choice == 2){
$query = oci_parse($conn,"insert into register values (current_date,:reg,'twoway',(select twoway from chargevehicle where type = (select type from regvehicle where regno = :reg)))");
$query2 = oci_parse($conn,"select twoway from chargevehicle where type = (select type from regvehicle where regno = :reg)");
}

oci_bind_by_name($query,':reg',$reg);
oci_execute($query);
oci_bind_by_name($query2,':reg',$reg);
oci_execute($query2);

$cost = oci_fetch_row($query2);

echo "<center><h1>charged Rs.".$cost[0]."</h1></center><br>";

?>

<form class='w3-container' action="tollgate.html">
<button class='w3-input'type="submit">back</button>
</form>

<?php
}
else{
	
$reg = $_GET["regno"];

$query = oci_parse($conn,"SELECT * from regvehicle where regno = :reg");
oci_bind_by_name($query,':reg',$reg);
oci_execute($query);

$row = oci_fetch_row($query);
$row!=NULL?$found=1:$found=0;

if($found){
	
?>


<table border='1' class='w3-table-all w3-hoverable w3-card-4 w3-centered'><tr><td>Reg No</td><td>Owner</td><td>Vehicle Type</td><td>Vehicle model</td></tr>
<tr><td><?php echo $row[0]; ?></td><td><?php echo $row[1];?></td><td><?php echo $row[2];?></td><td><?php echo $row[3];?></td></tr>
</table>

<div class='w3-container'>
<form action=""  method="post">
<input type="radio" name="reg" value="<?php echo $reg?>" checked hidden><br>
<input type="radio" name="path" value="1"><label> oneway </label>
<input type="radio" name="path" value="2"> <label>twoway</label><br><br>
<input class='w3-input' type="submit" name="charge" value="charge">
</form>
</div>

<?php
}
else{
?>

<p> not found </p>
<form class='w3-container'action ="tollgate.html">
<button class='w3-input'type="submit">back</button>
</form>
</div>

<?php
}
}
oci_close($conn);
?>
