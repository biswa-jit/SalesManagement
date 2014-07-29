<?php
include 'conn.php';
$ses_id=$_COOKIE['ses_id'];
session_start($ses_id);
$vid=$_SESSION['vid'];


$brand=$_POST['brand'];
$comp_model=$_POST['comp_model'];
$qty=$_POST['qty'];
$price=$_POST['price'];
$area=$_POST['area'];
$category=$_POST['category'];
$model=$_POST['model'];
$loss_date=$_POST['loss_date'];
$reason=$_POST['reason'];

$sql="INSERT INTO lost_entry_info VALUES('$brand','$comp_model','$qty','$price','$area','$category','$model','$loss_date','$reason','$vid')";
mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

echo "<script>alert('Updated successfully');</script>";






?>