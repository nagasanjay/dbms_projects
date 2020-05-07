<html>
<head><title>display</title><meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="w3.css"></head>
<body><div class='w3-container w3-padding'>
<form class="w3-container" action="display1.php"  method="post">
<input type="radio" name="display" value="1">  Display all Registered vehicles<br>
<input type="radio" name="display" value="2">  Display the charges for all type of vehicles<br>
<input type="radio" name="display" value="4">  Total number of vehicles that crossed this tollgate<br>
<input type="radio" name="display" value="5">  Display Reg.no,trip and owner for the vehicles entered the tolls<br>
<input type="radio" name="display" value="3">  Display all records<br><br>
Enter the reg no of the vehicle to display its records
<input class='w3-input' type="text" name="display1" ><br>
<input class='w3-input' type="submit" name="submit" value="display">
</form>
<form action="tollgate.html">
<br><button>back</button></form></div>
</body></html>