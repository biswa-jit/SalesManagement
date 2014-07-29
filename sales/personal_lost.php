<?php
include 'conn.php';

session_start($_COOKIE['ses_id']);
$salesman=$_SESSION['name'];

$sql="SELECT * FROM lost WHERE salesman='$salesman'";
$result=mysql_query($sql)  or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

if(mysql_num_rows($result)==0){
	echo "<script>alert('Cuurently you have no prospect in this category');</script>";
	die();
}


echo "<table border='1'>
	<tr>
	
	<th>PID</th>
	<th>VID</th>
	<th>Customer Name</th>
	<th width='5'>Contact No</th>
	<th>Model</th>
	<th>qty</th>
	<th>Price</th>
	<th width='30'>Decision Date</th>
	<th width='30'>Delivery Date</th>
	<th>Odds</th>
	</tr>";

	



	
	while($row = mysql_fetch_array($result)) {
	  $vid=$row['vid'];
		
	  echo "<tr>";
	  
	  echo "<td>" . $row['pid'] . "</td>";
	  echo "<td>" . $row['vid'] . "</td>";
	  echo "<td>" . $row['cust'] . "</td>";
	  echo "<td>" . $row['customer_tel'] . "</td>";
	  echo "<td>" . $row['model'] . "</td>";
	  echo "<td>" . $row['qty'] . "</td>";
	  echo "<td>" . $row['price'] . "</td>";
	  echo "<td width='30'>" . $row['decision'] . "</td>";
	  echo "<td width='30'>" . $row['e_delivery'] . "</td>";
	  echo "<td>" . $row['odds'] . "</td>";
	  
	  echo "<td><input type='button' value='Remarks' onclick='show($vid);'></td>";
	  echo "</tr>";
	  }
	  
	echo "</table>";



?>
<html>
<head>
	<script>
			function show(vid){
				alert(vid);
			    window.location.href='show_remarks_lost.php?value='+vid;	
			}
	</script>
</head>
</html>
