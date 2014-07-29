<?php

include 'conn.php';

$row_no=$_GET['value'];
setcookie('row_no',$row_no,time()+3600);
echo "<div style='position: absolute; height: 200px; width: 400px; margin: -100px 0 0 -200px; top: 30%; left: 50%;''>";
echo "<table border='1'>
<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Contact No</th>
		<th>Status</th>
</tr>";

$sql="SELECT * FROM salesperson_details WHERE row_no='$row_no'";
$r=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

while($row=mysql_fetch_array($r)){
//$row_no=$row['row_no'];	
echo "<tr>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['password']."</td>";
echo "<td>".$row['contact_no']."</td>";
echo "<td>".$row['status']."</td>";
echo "</tr>";
}
echo "</table>";


echo "<form method='POST' action='update_employee.php'>
<table>

<h3><tr><td>Change Name:</td><td><input type='text' name='new_name'></td></tr></h3>
<h3><tr><td>Change Email:</td><td><input type='text' name='new_email'></td></tr></h3>
<h3><tr><td>Change Password:</td><td><input type='text' name='new_password'></td></tr></h3>
<h3><tr><td>Change Contact No:</td><td><input type='number' name='new_contact_no'></td></tr></h3>
<h3><tr><td>Change Status:</td><td><select name='new_status'><option value='activated'>Activate</option><option value='deactivated'>Deactivate</option></td></tr></h3>

<h3><tr><td><input type='submit' value='Update'></td></tr></h3>
</table>

</form>";



echo "<h4>NB:If you aren't updating all fields,then please enter their current data there.</h4>";


echo "</div>";






?>