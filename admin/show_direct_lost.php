<?php
include 'conn.php';

$sql="SELECT * FROM direct_lost";
$result=mysql_query($sql)  or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

echo "<th>Customer Name</th>
	<th>Address</th>
	<th>Branch</th>
	<th>City</th>
	<th>Competition</th>
	<th>Contact Person</th>
	<th>Contact No</th>
	<th>Financer</th>
	<th>Category</th>
	<th>Model</th>
	<th>Price</th>
	<th>Remarks</th>";
	

while($row=mysql_fetch_array($result)){
echo "<tr>";
	  echo "<td>" . $row['customer_name'] . "</td>";
	  echo "<td>" . $row['address'] . "</td>";
	  echo "<td>" . $row['branch'] . "</td>";
	  echo "<td>" . $row['city'] . "</td>";
	  echo "<td>" . $row['competition'] . "</td>";
	  echo "<td>" . $row['contact_person'] . "</td>";
	  echo "<td>" . $row['contact_no'] . "</td>";
	  echo "<td>" . $row['financer'] . "</td>";
	  echo "<td>" . $row['category'] . "</td>";
	  echo "<td>" . $row['model'] . "</td>";
	  echo "<td>" . $row['price'] . "</td>";
	  echo "<td>" . $row['remarks'] . "</td>";
echo "</tr>";
}
echo "</table>";
?>