<?php

include 'conn.php';

$row_no=$_GET['value'];
setcookie('row_no',$row_no,time()+3600);
echo "<div style='position: absolute; height: 200px; width: 400px; margin: -100px 0 0 -200px; top: 30%; left: 50%;''>";
echo "<table border='1'>
<tr>
		<th>Brand</th>
		<th>Model</th>
		<th>Status</th>
</tr>";

$sql="SELECT * FROM comp_model WHERE row_no='$row_no'";
$r=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

while($row=mysql_fetch_array($r)){
	
echo "<tr>";
echo "<td width='10%'>".$row['brand']."</td>";
echo "<td width='10%'>".$row['model_no']."</td>";
echo "<td width='10%'>".$row['status']."</td>";
echo "</tr>";
}
echo "</table>";


echo "<form method='POST' action='update_comp_model.php'>
<table>

<h3><tr><td>Change Brand:</td><td><input type='text' name='new_brand'></td></tr></h3>
<h3><tr><td>Change Model:</td><td><input type='text' name='new_name'></td></tr></h3>
<h3><tr><td>Change Status:</td><td><select name='new_status'><option value='activated'>Activate</option><option value='deactivated'>Deactivate</option></td></tr></h3>
<h3><tr><td><input type='submit' value='Update'></td></tr></h3>
</table>

</form>";



echo "<h4>NB:If you aren't updating all fields,then please enter their current data there.</h4>";


echo "</div>";






?>