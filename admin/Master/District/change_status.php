<?php

include 'conn.php';

$row_no=$_GET['row_no'];

$sql="SELECT status FROM district WHERE row_no='$row_no'";
$result=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
while($row=mysql_fetch_array($result))
	$status=$row['status'];

if($status=='activated'){
	$sql_update_status="UPDATE district SET status='deactivated' WHERE row_no='$row_no'";
	$r=mysql_query($sql_update_status) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
	if($r)
		echo "<script>alert('District deactivated');</script>";
	include 'activate_district.php';
}

if($status=='deactivated'){
	$sql_update_status="UPDATE district SET status='activated' WHERE row_no='$row_no'";
	$r=mysql_query($sql_update_status) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
	if($r)
		echo "<script>alert('District activated');</script>";
	include 'activate_district.php';
}






?>