<?php
include 'conn.php';


$brand=$_POST['brand'];
$model=$_POST['model_no'];

$sql="INSERT INTO comp_model(brand,model_no) VALUES('$brand','$model')";
$r=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
if($r)
	echo "<script>alert('Model $model added succesfully.');</script>";

include 'add_new_comp_model.html';

?>