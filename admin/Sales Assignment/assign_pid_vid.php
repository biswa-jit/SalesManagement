<?php

$a=$_GET['value'];

$myArray = explode(',', $a);

$pid=$myArray[0];
$vid=$myArray[1];
$row_no=$myArray[2];//row_no of those entries whose PID & VID are updated

include 'conn.php';




$sql_update_processed="INSERT INTO webinfo_processed SELECT * FROM new_entries_temp WHERE new_entries_temp.row_no='$row_no'";//Enter those entries to 'webinfo_processed' whose PID and VID are entered
$result=mysql_query($sql_update_processed) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
	


$sql_update_processed_temp="INSERT INTO webinfo_processed_temp SELECT * FROM new_entries_temp WHERE new_entries_temp.row_no='$row_no'";
$result1=mysql_query($sql_update_processed_temp)  or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

/*$sql_update_webinfo_updating="INSERT INTO webinfo_updating SELECT   FROM webinfo_processed WHERE vid='$vid'";
$result1=mysql_query($sql_update_webinfo_updating)  or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());*/

//$sql_update_pid_vid="UPDATE webinfo_processed_temp SET pid="


$sql_insert_pid_vid="UPDATE webinfo_processed SET pid='$pid',vid='$vid' WHERE row_no='$row_no'";
$response=mysql_query($sql_insert_pid_vid) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());//Update PID & VID in 'webinfo_processed'


$sql_update_pid_vid="UPDATE webinfo_processed_temp SET pid='$pid',vid='$vid' WHERE row_no='$row_no'";
mysql_query($sql_update_pid_vid) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

/*$sql_webinfo_processed_updating="INSERT INTO webinfo_processed_updating SELECT * FROM  webinfo_processed WHERE row_no='$row_no'";
mysql_query($sql_webinfo_processed_updating) or die(mysql_error());//Copy the updated entries from 'webinfo_processed' 																							      to 'webinfo_processed_updating'*/

$sql_update_new_entries_temp="DELETE FROM new_entries_temp WHERE row_no='$row_no'";
$reply=mysql_query($sql_update_new_entries_temp) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());//Delete those records from 'new_entries_temp' whose PID & VID 																					are entered
echo "<script>alert('PID and VID entered successfully');</script>";

include 'show_new_entry.php';



?>