<?php
include 'conn.php';



$model=$_POST['model_no'];

$sql="INSERT INTO model(model_no) VALUES('$model')";
$r=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
if($r)
	echo "<script>alert('Model $model added succesfully.');</script>";

include 'add_new_model.html';

?>