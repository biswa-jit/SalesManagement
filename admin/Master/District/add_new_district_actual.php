<?php

include 'conn.php';
if(isset($_POST['name'])){
$name=$_POST['name'];
$zone=$_POST['zone'];




$sql="INSERT INTO district(name,zone) VALUES('$name','$zone')";
$r=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
if($r)
	echo "<script>alert('District $name added succesfully.');</script>";

include 'add_new_district.php';
}
else if(!isset($_POST['name'])){
	echo "<script>alert('Please enter district.');</script>";
	echo "<script>window.history.back();</script>";
	die();
}
else ;
?>