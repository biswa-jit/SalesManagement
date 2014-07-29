<?php
include 'conn.php';

session_start();
session_regenerate_id();
$ses_id=session_id();
//echo $ses_id;
//echo "<br>";
setcookie('ses_id',$ses_id,time()+36000);

$email=$_POST['email'];
$password=$_POST['password'];


$sql_check="SELECT * FROM salesperson_details WHERE email='$email' AND password='$password'";
$result=mysql_query($sql_check) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
while($row=mysql_fetch_array($result)){
	if($row['status']=="deactivated"){
		echo "<script>alert('Your account has been deactivated.Contact Admin.');</script>";
		include 'login.html';
		die();
	}
   $_SESSION['name']=$row['name'];
   $_SESSION['email']=$row['email'];
   $_SESSION['contact_no']=$row['contact_no'];
}
while($row=mysql_fetch_array($result)){
	/*if($row['status']=="deactivated"){
		echo "<script>alert('Your account has been deactivated.Contact Admin.');</script>";
		include 'login.html';
		die();
	}*/
}
if(mysql_num_rows($result)==0){
	echo "<script>alert('Wrong email or password.Try again.');</script>";
		include 'login.html';
		die();
	}
if($_SESSION['email']=="kr.ansari@pollutech.in" || $_SESSION['email']=="bibhas@pollutech.in" || $_SESSION['email']=="rakesh.jena@pollutech.in")
	include 'dashboard.php';
else
	include 'dashboard_sales.php';
?>