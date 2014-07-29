<?php
include 'conn.php';
$vid_array=$_POST['vid'];

for($i=0;$i<sizeof($vid_array);$i++){
	$vid=$vid_array[$i];
	$sql="DELETE FROM last_updated_temp WHERE vid='$vid'";
	mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
}

include 'last_updated_prospects.html';

?>