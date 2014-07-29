<?php

include 'conn.php';

$date_entered=$_POST['date_entered'];

$sql="SELECT salesman,vid FROM sales_assignment WHERE date_entered='$date_entered'";
$r=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

if(mysql_num_rows($r)==0){
	echo "<script>alert('No sales assignment on the date specified');</script>";
	include 'view_sales_assignment_new_entries.html';
	die();
}

echo "<table border='1'>
		<tr>
		   <th>Salesman</th>
		   <th>VID</th>
		</tr>";
while($row=mysql_fetch_array($r)){
	echo "<tr>";
	echo "<td>" .$row['salesman'] . "</td>";
	echo "<td>" .$row['vid'] . "</td>";
	echo "</tr>";

}

echo "</table>";







?>