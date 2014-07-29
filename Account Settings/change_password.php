<?php
include 'conn.php';
$ses_id=$_COOKIE['ses_id'];
echo $ses_id;
session_start($ses_id);
$email=$_SESSION['email'];

//echo "<script>alert($email);</script>";




$new_password=$_POST['new_password'];

$sql="UPDATE salesperson_details SET password='$new_password' WHERE email='$email'";
$r=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

if($r){
	echo "<script>alert('Password updated succesfully.');</script>";
	include "account_settings_sales.php";
}

?>