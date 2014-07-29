<?php

include 'conn.php';

if(empty($_POST['new_name'])){
	echo "<script>alert('Please enter name.');</script>;";
	echo "<script>window.history.back();</script>";
}


if(empty($_POST['new_email'])){
	echo "<script>alert('Please enter email.');</script>;";
	echo "<script>window.history.back();</script>";
}

if(empty($_POST['new_password'])){
	echo "<script>alert('Please enter password.');</script>;";
	echo "<script>window.history.back();</script>";
}

if(empty($_POST['new_contact_no'])){
	echo "<script>alert('Please enter Contact no.');</script>;";
	echo "<script>window.history.back();</script>";
}


$new_name=$_POST['new_name'];
$new_email=$_POST['new_email'];
$new_password=$_POST['new_password'];
$new_contact_no=$_POST['new_contact_no'];
$new_status=$_POST['new_status'];
$row_no=$_COOKIE['row_no'];

$sql_update="UPDATE salesperson_details SET name='$new_name',email='$new_email',password='$new_password',contact_no='$new_contact_no',status='$new_status' WHERE row_no='$row_no'";
mysql_query($sql_update) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

echo "<script>alert('Sales details updated');</script>";

include 'show_sales_details.php';

?>