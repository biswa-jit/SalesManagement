<?php

include 'conn.php';



$sql_del_old_rows="DELETE FROM webinfo_updating WHERE vid IN(SELECT vid FROM webinfo)";
mysql_query($sql_del_old_rows) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());


$sql_insert_updated_rows="INSERT INTO webinfo_updating SELECT * FROM webinfo";
mysql_query($sql_insert_updated_rows) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
if($sql_insert_updated_rows)
	echo "Jobs assigned succesfully.";


$sql_del_vid="DELETE FROM webinfo WHERE vid IN(SELECT vid FROM last_updated)";
mysql_query($sql_del_vid) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

$sql_insert="INSERT INTO last_updated(vid) SELECT vid FROM webinfo";
mysql_query($sql_insert) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());



/*$sql_del_duplicates="CREATE TABLE temp AS SELECT * FROM webinfo_updating WHERE 1 GROUP BY vid"; 
mysql_query($sql_del_duplicates) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

$sql_del_temp="DROP TABLE webinfo_updating";
mysql_query($sql_del_temp) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

$sql_rename="RENAME TABLE temp TO webinfo_updating";
mysql_query($sql_rename) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
*/


/*
//Delete duplicates from won

$sql_webinfo_won="INSERT INTO won SELECT * FROM webinfo WHERE odds='won'";
mysql_query($sql_webinfo_won) or die(mysql_error());

$sql_del_won="DELETE FROM webinfo_updating WHERE odds='won'";
mysql_query($sql_del_won) or die(mysql_error());

$sql_del_duplicates_won="CREATE TABLE temp AS SELECT * FROM won WHERE 1 GROUP BY vid";
mysql_query($sql_del_duplicates_won) or die(mysql_error());

$sql_del_temp="DROP TABLE won";
mysql_query($sql_del_temp) or die(mysql_error());

$sql_rename="RENAME TABLE temp TO won";
mysql_query($sql_rename) or die(mysql_error());




//Delete duplicates from lost

$sql_webinfo_lost="INSERT INTO lost SELECT * FROM webinfo WHERE odds='lost'";
mysql_query($sql_webinfo_lost) or die(mysql_error());

$sql_del_lost="DELETE FROM webinfo_updating WHERE odds='lost'";
mysql_query($sql_del_lost) or die(mysql_error());

$sql_del_duplicates_lost="CREATE TABLE temp AS SELECT * FROM lost WHERE 1 GROUP BY vid";
mysql_query($sql_del_duplicates_won) or die(mysql_error());

$sql_del_temp="DROP TABLE lost";
mysql_query($sql_del_temp) or die(mysql_error());

$sql_rename="RENAME TABLE temp TO lost";
mysql_query($sql_rename) or die(mysql_error());







//Delete duplicates from abandoned




$sql_webinfo_abandoned="INSERT INTO abandoned SELECT * FROM webinfo WHERE odds='abandoned'";
mysql_query($sql_webinfo_abandoned) or die(mysql_error());

$sql_del_abandoned="DELETE FROM webinfo_updating WHERE odds='abandoned'";
mysql_query($sql_del_won) or die(mysql_error());

$sql_del_duplicates_abandoned="CREATE TABLE temp AS SELECT * FROM abandoned WHERE 1 GROUP BY vid";
mysql_query($sql_del_duplicates_abandoned) or die(mysql_error());

$sql_del_temp="DROP TABLE abandoned";
mysql_query($sql_del_temp) or die(mysql_error());

$sql_rename="RENAME TABLE temp TO abandoned";
mysql_query($sql_rename) or die(mysql_error());

*/














//$sql_webinfo_updating="INSERT INTO webinfo_updating SELECT * FROM sales_assignment";
//mysql_query($sql_webinfo_updating) or die(mysql_error());

?>