<?php
include 'conn.php';


$cust=$_POST['cust'];
$address=$_POST['address'];
$city=$_POST['city'];
$district=$_POST['district'];
$designation=$_POST['designation'];
$project_site=$_POST['project_site'];
$customer_contact=$_POST['customer_contact'];
$customer_tel=$_POST['customer_tel'];
$segment=$_POST['segment'];
$email_id=$_POST['email_id'];
$fax_no=$_POST['fax_no'];
$project=$_POST['project'];
$model=$_POST['model'];
$qty=$_POST['qty'];
//$district=$_POST['district'];
$price=$_POST['price'];
$odds=$_POST['odds'];
$decision=$_POST['decision'];
$e_delivery=$_POST['e_delivery'];

$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));

$current_date=$date->format('Y-m-d');


if($decision <= $current_date){
	echo "<script>alert('Decision date cant be less than today.Please check out.');
					window.history.back();
		  </script>";
	die();
}
   
if($e_delivery <= $current_date){
	echo "<script>alert('Delivery date cant be less than today.Please check out.');
	     window.history.back();
		  </script>";
	die();
}


if($e_delivery<=$decision){
	echo "<script>alert('Delivery date cant be less than Decision date.Please check out.');
	window.history.back();
		  </script>";
	die();
}

$sql_check_duplicate_record="SELECT * FROM new_entries WHERE cust='$cust' AND address='$address' AND model='$model'";
$response=mysql_query($sql_check_duplicate_record) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());//Check if d new entry already exist or not
if(mysql_num_rows($response)!=0){
	echo "<script>alert('The prospect entered already exists.Pls check out.');</script>";
	echo "<script>window.history.back();</script>";
	die();
}

$sql_new_entry_org="INSERT INTO new_entries(cust,address,city,district,designation,project_site,customer_contact,customer_tel,segment,email_id,fax_no,project,model,qty,price,odds,date_created,decision,e_delivery) VALUES('$cust','$address','$city','$district','$designation','$project_site','$customer_contact','$customer_tel','$segment','$email_id','$fax_no','$project','$model','$qty','$price','$odds','$current_date','$decision','$e_delivery')";//Data sent by sales person is enterd to table 'new_entries_original'

$result=mysql_query($sql_new_entry_org) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());


$get_rowno="SELECT row_no FROM new_entries WHERE cust='$cust' AND address='$address' AND model='$model'";//Extract the row_no value the 																													new entry just got above
$result3=mysql_query($get_rowno) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

while($row=mysql_fetch_array($result3)){
	$row_no_org=$row['row_no'];//The row_no of the new entry
	//echo "row no is $row_no_org <br>";
}
//echo "row no is $row_no_org <br>";
$sql_new_entry_temp="INSERT INTO new_entries_temp(cust,address,city,district,designation,project_site,customer_contact,customer_tel,segment,email_id,fax_no,project,model,qty,price,odds,date_created,decision,e_delivery) VALUES('$cust','$address','$city','$district','$designation','$project_site','$customer_contact','$customer_tel','$segment','$email_id','$fax_no','$project','$model','$qty','$price','$odds','$current_date','$decision','$e_delivery')";//The above new entry also entered to 																			'new_entries_temp'

mysql_query($sql_new_entry_temp) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());//The table 'new_entries_temp' stores new entries temporarily and displays 																		them to admin



$sql_update_rowno_in_new_entries_temp="UPDATE new_entries_temp SET row_no='$row_no_org' WHERE cust='$cust' AND address='$address' AND model='$model'";//Update the row_no from 'new_entries_original' with corresponding record in 'new_entries_temp'

mysql_query($sql_update_rowno_in_new_entries_temp)  or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

if($result){
	echo "<script>alert('New entry entered succesfully');</script>";
	include 'add_new_entry_form.php';
}


?>
