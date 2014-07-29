<?php
include 'conn.php';

$sql="SELECT * FROM model";
$result=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

echo "<table border='1' style='position: absolute; height: 80px; width: 600px; margin: -100px 0 0 -200px; top: 20%; left: 50%;'>
<tr>
		
		<th>Model</th>
		<th>Status</th>
</tr>";
while($row=mysql_fetch_array($result)){
	$row_no=$row['row_no'];
echo "<tr>";

echo "<td>".$row['model_no']."</td>";
echo "<td>".$row['status']."</td>";
echo "<td><input type='button' value='Edit' onclick='edit($row_no);'></td>";

echo "</tr>";

}
echo "</table>";

?>

<html>
<script>
var k;
function edit(row_no){
	//alert(row_no);
	window.location.href='edit_model.php?value='+row_no;
}

</script>

</html>