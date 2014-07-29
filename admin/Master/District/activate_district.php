<?php
include 'conn.php';

$sql="SELECT * FROM district";
$result=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

echo "<table border='1' style='position: absolute; height: 200px; width: 400px; margin: -100px 0 0 -200px; top: 20%; left: 50%;'>
<tr>
		
		<th>Name</th>
		<th>Status</th>
</tr>";
while($row=mysql_fetch_array($result)){
	$row_no=$row['row_no'];
	//$status=$row['status'];
echo "<tr>";

echo "<td>".$row['name']."</td>";
echo "<td>".$row['status']."</td>";
echo "<td><input type='button' value='Change Status' onclick='change_status($row_no);'></td>";

echo "</tr>";

}
echo "</table>";
?>
<html>
<head>
	<script>
	//var row_no;
	
	function change_status(row_no){
		
		window.location.href='change_status.php?row_no='+row_no;
	}
	</script>
</head>
</html>



