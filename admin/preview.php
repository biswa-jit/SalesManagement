<?php

include 'conn.php';

$sql_preview="SELECT * FROM webinfo";
	$result=mysql_query($sql_preview) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
	echo "No of rows are".mysql_num_rows($result);
	echo "<h3>This is the data imported from the CSV file.If there is no error,click on 'Assign' button at the end of this page.Else <a href='upload.php'>upload the file again</a>a</h3>";
	  echo "<table border='1'>
	  		<tr>
	  		<th>salesman</th>
			<th>pid</th>
			<th>vid</th>
			<th>cust</th>
			<th>customer_contact</th>
			<th>area</th>
			<th>machine_line</th>
			<th>model</th>
			<th>qty</th>
			<th>price</th>
			<th>date_created</th>
			<th>decision</th>
			<th>e_delivery</th>
			<th>odds</th>
			<th>remarks</th>
			</tr>";
	while($row=mysql_fetch_array($result)){

		echo "<tr>";
		echo "<th>".$row['salesman']."</th>";
		echo "<th>".$row['pid']."</th>";
		echo "<th>".$row['vid']."</th>";
		echo "<th>".$row['cust']."</th>";
		echo "<th>".$row['customer_contact']."</th>";
		echo "<th>".$row['area']."</th>";
		echo "<th>".$row['machine_line']."</th>";
		echo "<th>".$row['model']."</th>";
		echo "<th>".$row['qty']."</th>";
		echo "<th>".$row['price']."</th>";
		echo "<th>".$row['date_created']."</th>";
		echo "<th>".$row['decision']."</th>";
		echo "<th>".$row['e_delivery']."</th>";
		echo "<th>".$row['odds']."</th>";
		echo "<th>".$row['remarks']."</th>";
		echo "</tr>";







	}
echo "</table>";

echo "<input type='button' height='20' width='50' value='Assign' onclick='assign_sales();'>";




?>
<html>
<script>
function assign_sales(){
	window.location.href='assign_sales.php';
}
</script>
</html>