<?php

include 'conn.php';

if(empty($_POST['new_name'])){
	echo "<script>alert('Please enter name.');</script>;";
	echo "<script>window.history.back();</script>";
}



$new_brand=$_POST['new_brand'];
$new_name=$_POST['new_name'];
$new_status=$_POST['new_status'];
$row_no=$_COOKIE['row_no'];

$sql_update="UPDATE comp_model SET brand='$new_brand',model_no='$new_name',status='$new_status' WHERE row_no='$row_no'";
mysql_query($sql_update) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

echo "<script>alert('Model details updated');</script>";

include 'show_comp_models.php';

?>