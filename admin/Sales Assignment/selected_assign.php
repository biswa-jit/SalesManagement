<?php
include 'conn.php';

$salesman=$_POST['salesman'];
$vid_array=$_POST['vid'];
$response="";

$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

$current_date=$date->format('Y-m-d');

for($i=0;$i<sizeof($vid_array);$i++){
	global $response;
	$vid=$vid_array[$i];
	$sql_assign="INSERT INTO sales_assignment VALUES('$salesman','$vid_array[$i]','$current_date')";
	$response=mysql_query($sql_assign) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$sql_update_webinfo_updating="INSERT INTO webinfo_updating (pid, vid, cust, customer_contact, customer_tel,model,area,machine_line, qty, price, date_created, decision, e_delivery, odds) SELECT pid, vid, cust, customer_contact, customer_tel,model,district,machine_line, qty, price, date_created, decision, e_delivery, odds FROM webinfo_processed_temp WHERE webinfo_processed_temp.vid='$vid'";
	mysql_query($sql_update_webinfo_updating) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$sql_update_salesman="UPDATE webinfo_updating SET salesman='$salesman' WHERE vid='$vid'";
	mysql_query($sql_update_salesman) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$sql_delete="DELETE FROM webinfo_processed_temp WHERE vid='$vid'";
	mysql_query($sql_delete) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());


}


if($response){
	echo "<script>alert('Prospects assigned to $salesman successfully.');</script>";
	include 'sales_assign_new_entries.php';

}

else {
	echo "<script>alert('Error in sales assignment.');</script>";
	die();
}









?>