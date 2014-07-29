<?php
include 'conn.php';

$name=$_POST['sales_name'];
$email=$_POST['email'];
$contact_no=$_POST['contact_no'];

$sql_check="SELECT * FROM salesperson_details WHERE email='$email' AND name='$name'";
$result=mysql_query($sql_check) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
if(mysql_num_rows($result)!=0){
	echo"<script>alert('Employee $name already exists.Pls check.');</script>";
	include 'add_employee.html';
}


else{

$sql="INSERT INTO salesperson_details(name,email,contact_no,status) VALUES ('$name','$email','$contact_no','activated')";
$r=mysql_query($sql)  or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

if($r)
	echo "<script>alert('Employee $name has been added successfully.');</script>";

}
?>