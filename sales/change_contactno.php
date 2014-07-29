<?php
include 'conn.php';
$ses_id=$_COOKIE['ses_id'];
//echo $ses_id;
session_start($ses_id);
$email=$_SESSION['email'];

echo "<script>alert($email);</script>";




$new_contact_no=$_POST['new_contact_no'];

$sql="UPDATE salesperson_details SET contact_no='$new_contact_no' WHERE email='$email'";
$r=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

if($r){
	echo "<script>alert('Contact No updated succesfully.');</script>";
	include "account_settings_sales.php";
}

?>