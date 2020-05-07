<?php

$query = oci_parse($conn,"SELECT count from books where book_name = :name");
oci_bind_by_name($query,':name',$name);
oci_execute($query);

$row = oci_fetch_assoc($query);
$var = $row['count'];

$var--;

$query = oci_parse($conn,'update books set count = :var where book_name = :name');
oci_bind_by_name($query,':var',$var);
oci_bind_by_name($query,':name',$name);
oci_execute($query);
