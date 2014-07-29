<?php

include 'conn.php';

if(empty($_POST['new_name'])){
	echo "<script>alert('Please enter zone name.');</script>;";
	echo "<script>window.history.back();</script>";
}

$new_name=$_POST['new_name'];
$new_status=$_POST['new_status'];
$row_no=$_COOKIE['row_no'];

$sql_update="UPDATE zone SET name='$new_name',status='$new_status' WHERE row_no='$row_no'";
mysql_query($sql_update) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

echo "<script>alert('Zone details updated');</script>";

include 'show_zone.php';

?>