<?php

include 'conn.php';
$ses_id=$_COOKIE['ses_id'];
session_start($ses_id);
$salesman=$_SESSION['name'];
$vid=$_SESSION['vid'];

$new_model=$_POST['new_model'];
$new_price=$_POST['price'];
$new_odds=$_POST['odds'];
$dc=$_POST['dec_date'];
$dl=$_POST['del_date'];
$remarks=$_POST['remarks'];

$financer=$_POST['financer'];



$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));


$cur_date= $date->format('Y-m-d H:i:s');
$current_date=$date->format('Y-m-d');

if($dc <= $current_date){
	echo "<script>alert('Decision date cant be less than today.Please check out.');</script>";
	echo "<script>window.history.back();</script>";
	die();

						}
   
if($dl <= $current_date){
	echo "<script>alert('Delivery date cant be less than today.Please check out.');</script>";
	echo "<script>window.history.back();</script>";
	die();
						}


if($dl<=$dc){
	echo "<script>alert('Delivery date cant be less than Decision date.Please check out.');</script>";
	echo "<script>window.history.back();</script>";
	die();
}





if($_POST['visit']=='2'){
	if(empty($_POST['visit_date'])){
		echo "<script>alert('Date of visit can not be empty.');</script>";

	    echo "<script>window.history.back();</script>";
									}	      

	

	if(empty($_POST['visit_place'])){
		echo "<script>alert('Place of visit can not be empty');</script>";
		echo "<script>window.history.back();</script>";
		      
									}

						}









$visit_date=$_POST['visit_date'];
$visit_place=$_POST['visit_place'];
$tel;
if($visit_date>$current_date){
	echo "<script>alert('Visit date cant be greater than today.Check out.');</script>";
	echo "<script>window.history.back();</script>";
	die();

}


$cust=$_SESSION['cust'];
if($_POST['visit']=='2'){
	global $tel;

$sql_get_telephonic="SELECT telephonic FROM updation_type WHERE salesman='$salesman' AND vid='$vid' ORDER BY row_no DESC LIMIT 1";
$r=mysql_query($sql_get_telephonic) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
while($row=mysql_fetch_array($r)){
		global $tel;
		$tel= $row['telephonic'];
		//echo "tel is   $tel";
		if($tel==0)
			break;
		//$tel++;

			}

$sql_visit="INSERT INTO updation_type(vid,salesman,visit_date,visit_place,telephonic,cust) VALUES('$vid','$salesman','$visit_date','$visit_place','$tel','$cust')";
mysql_query($sql_visit) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

				 }





if($_POST['visit']=='1'){
	
	$sql_telephonic="SELECT * FROM updation_type WHERE salesman='$salesman' AND vid='$vid' ORDER BY row_no DESC LIMIT 1";
	$r=mysql_query($sql_telephonic) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
	if(mysql_num_rows($r)==0){

		$sql="INSERT INTO updation_type(vid,salesman,telephonic,cust) VALUES('$vid','$salesman',1,'$cust')";
		mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());


	       }
		
	while($row=mysql_fetch_array($r)){
		global $tel;

	$tel= $row['telephonic'];
//	echo "tel is   $tel";
		/*$f=$row['row_no'];
		echo "row no is $f";
		$telephonic=$row['telephonic'];
		echo "before $telephonic";*/
		$tel=$row['telephonic'];
		$tel++;

		$f=$row['row_no'];
		$sql="UPDATE updation_type SET telephonic='$tel' WHERE row_no='$f'";
		//$sql="INSERT INTO updation_type(vid,salesman,telephonic) VALUES('$vid','$salesman','$telephonic')";
		mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

									}
		
					}








	



$updated_remarks=$cur_date."<br>".$remarks;
//echo $updated_remarks;

$sql_get_current_remarks="SELECT remarks FROM webinfo_updating WHERE vid='$vid'";
$result=mysql_query($sql_get_current_remarks) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

if(mysql_num_rows($result)==0)
	$_SESSION['current_remarks']="";
else
	while($row=mysql_fetch_array($result)){
		if($row['remarks']=="(blank)")
			$_SESSION['current_remarks']="";
		else
			$_SESSION['current_remarks']=$row['remarks'];	//echo "curent remark is ".$_SESSION['current_remarks'];
}
$new_remarks=$_SESSION['current_remarks']."<br>".$updated_remarks."<br>"."--------------------";

if($new_odds=='won'){

	$sql_won="INSERT INTO won SELECT * FROM webinfo_updating WHERE vid='$vid'";
	mysql_query($sql_won) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

    $update_odds_remarks="UPDATE won SET odds='abandoned',remarks='$new_remarks' WHERE vid='$vid'";
	mysql_query($update_odds_remarks) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$sql_del="DELETE FROM webinfo_updating WHERE vid='$vid'";
	mysql_query($sql_del) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$sql_last_updated="UPDATE last_updated SET _date='$current_date' WHERE vid='$vid'";
	mysql_query($sql_last_updated) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$sql_last_updated_temp="INSERT INTO last_updated_temp VALUES('$vid','$current_date')";
	mysql_query($sql_last_updated_temp) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	echo "<script>alert('Prospect updated.');</script>";
}

else if($new_odds=='lost'){
	$sql_lost="INSERT INTO lost SELECT * FROM webinfo_updating WHERE vid='$vid'";
	mysql_query($sql_lost) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$update_odds_remarks="UPDATE lost SET odds='abandoned',remarks='$new_remarks' WHERE vid='$vid'";
	mysql_query($update_odds_remarks) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$sql_del="DELETE FROM webinfo_updating WHERE vid='$vid'";
	mysql_query($sql_del) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$sql_last_updated="UPDATE last_updated SET _date='$current_date' WHERE vid='$vid'";
	mysql_query($sql_last_updated) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$sql_last_updated_temp="INSERT INTO last_updated_temp VALUES('$vid','$current_date')";
	mysql_query($sql_last_updated_temp) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	echo "<script>alert('Prospect updated.');</script>";
	include 'lost_form.php';
}

else if($new_odds=='abandoned'){
	$sql_abandoned="INSERT INTO abandoned SELECT * FROM webinfo_updating WHERE vid='$vid'";
	mysql_query($sql_abandoned) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$update_odds_remarks="UPDATE abandoned SET odds='abandoned',remarks='$new_remarks' WHERE vid='$vid'";
	mysql_query($update_odds_remarks) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$sql_del="DELETE FROM webinfo_updating WHERE vid='$vid'";
	mysql_query($sql_del) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$sql_last_updated="UPDATE last_updated SET _date='$current_date' WHERE vid='$vid'";
	mysql_query($sql_last_updated) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$sql_last_updated_temp="INSERT INTO last_updated_temp VALUES('$vid','$current_date')";
	mysql_query($sql_last_updated_temp) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	echo "<script>alert('Prospect updated.');</script>";
}
else {
	//$sql_insert_webinfo_updating
	$sql_update_prospect="UPDATE webinfo_updating SET model='$new_model',price='$new_price',odds='$new_odds',decision='$dc',e_delivery='$dl',remarks='$new_remarks' WHERE vid='$vid'";
	$r=mysql_query($sql_update_prospect) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$sql_last_updated="UPDATE last_updated SET _date='$current_date' WHERE vid='$vid'";
	mysql_query($sql_last_updated) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	$sql_last_updated_temp="INSERT INTO last_updated_temp VALUES('$vid','$current_date')";
	mysql_query($sql_last_updated_temp) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

	echo "<script>alert('Prospect updated.');</script>";

}

//echo $new_model."<br>".$new_price."<br>".$odds."<br>".$dc."<br>".$dl."<br>".$remarks."<br>".$cur_date;
$sql_update_financer="INSERT INTO financer_updating(name,vid) VALUES('$financer','$vid')";
mysql_query($sql_update_financer) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
?>