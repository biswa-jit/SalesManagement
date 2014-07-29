<?php
$con=mysql_connect("127.0.0.1","root","");
if(!$con)
	die(mysql_error());

mysql_select_db("polutech") or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
?>