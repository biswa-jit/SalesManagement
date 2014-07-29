<html>
<body>
<?php
include 'conn.php';
//echo "<script>alert();</script>";
if(session_status()==PHP_SESSION_NONE)
    session_start($_COOKIE['ses_id']);
echo 'ses id is  '.$_COOKIE['ses_id'];
echo "<center><h3><u>Your Current Details</u></h3></center>";

$email=$_SESSION['email'];

$sql="SELECT * FROM salesperson_details WHERE email='$email'";
$result=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

echo "<table border='1' style='position: absolute; height: 100px; width: 500px; margin: -100px 0 0 -200px; top: 30%; left: 45%;'>
<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Contact No</th>
		
</tr>";
while($row=mysql_fetch_array($result)){
	$row_no=$row['row_no'];
echo "<tr>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['password']."</td>";
echo "<td>".$row['contact_no']."</td>";

echo "</tr>";

}
echo "</table>";

?>

<div style='position: absolute; height: 200px; width: 400px; margin: -100px 0 0 -200px; top: 50%; left: 50%;'>

<form method='POST' action='change_contactno.php'><h3>Change Contact No:<input type='number' name='new_contact_no'><input type='submit' value='Update'></h3></form>
<form method='POST' action='change_password.php'><h3>Change Password:<input type='text' name='new_password'><input type='submit' value='Update'></h3></form>










</div>
















</body>
</html>