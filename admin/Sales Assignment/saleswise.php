<?php

include 'conn.php';

$salesman_from=$_POST['salesman_from'];
$salesman_to=$_POST['salesman_to'];




$sql="UPDATE webinfo_updating SET salesman='$salesman_to' WHERE salesman='$salesman_from'";
$r=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

if($r){
  echo "<script>alert('Prospects from $salesman_from are assigned to $salesman_to successfully.');</script>";
	include 'change_sales_assignment.html';
}
else {
  echo "<script>alert('Failure');</script>";
	include 'change_sales_assignment.html';
}
?>