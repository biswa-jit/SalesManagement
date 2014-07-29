<?php
include 'conn.php';



$name=$_POST['name'];

$sql="INSERT INTO financer(name) VALUES('$name')";
$r=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
if($r)
	echo "<script>alert('Financer $name added succesfully.');</script>";

include 'add_new_financer.html';

?>