<html>
<body>
<?php
include 'conn.php'; 
$sql="SELECT * FROM salesperson_details";
$result=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
echo "<form method='POST' action='view_visit_details.php'>";
echo "Select Salesman:<select name='salesman'>";
while($row=mysql_fetch_array($result)){
	$s=$row['name'];
	echo "<option value='$s'>" . $row['name'] . "</option>";
}
echo "</select><br><br>";
echo "Enter VID:<input type='number' name='vid'><br><br>";
echo "From:<input type='date' name='from_date'>&emsp;&emsp;To:<input type='date' name='to_date'><br><br>";

echo "<input type='submit' value='Submit'>";

echo "</form>";
?>



