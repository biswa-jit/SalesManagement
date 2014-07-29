<?php

include "conn.php";

$customer_name=$_POST["customer_name"];
$contact_person=$_POST["contact_person"];
$contact_no=$_POST["contact_no"];
$address=$_POST["address"];
$city=$_POST["city"];
$district=$_POST["district"];
$segment=$_POST['segment'];
$financer=$_POST["financer"];

$model=$_POST["model"];
$qty=$_POST['qty'];
$comp_model=$_POST["comp_model"];
$category=$_POST["category"];
$price=$_POST["price"];
$reason=$_POST['reason'];
$loss_date=$_POST['loss_date'];
$remarks=$_POST["remarks"];

$sql_check="SELECT * FROM direct_lost WHERE customer_name='$customer_name' AND contact_person='$contact_person' AND model='$model'";
$r=mysql_query($sql_check) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
if(mysql_num_rows($r)!=0){
	echo "<script>alert('The prospect already exists.Please Check out.');</script>";
	include 'direct_lost_entry_form.html';
	die();
}


$sql_entry="INSERT INTO direct_lost(customer_name,contact_person,contact_no,address,city,district,segment,financer,model,qty,comp_model,category,price,reason,loss_date,remarks) VALUES('$customer_name','$contact_person','$contact_no','$address','$city','$district','$segment','$financer','$model','$qty','$comp_model','$category','$price','$reason','$loss_date','$remarks')";

$r=mysql_query($sql_entry) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

if($r)
	echo "Data entered successfully.";



?>