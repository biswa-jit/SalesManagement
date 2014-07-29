<?php
include 'conn.php';
session_start($_COOKIE['ses_id']);
$name=$_SESSION['name'];

$sql="SELECT * FROM webinfo_updating WHERE odds=50 AND salesman='$name'";
$result=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());


if(mysql_num_rows($result)==0){
	echo "<script>alert('Cuurently you have no prospect in this category');</script>";
	die();
}


echo "<table border='1'>
	<tr>
	<th>PID</th>
	<th>VID</th>
	<th>Customer Name</th>
	<th>Contact No</th>
	<th>Model</th>
	<th>qty</th>
	<th>Price</th>
	<th>Decision Date</th>
	<th>Delivery Date</th>
	<th>Odds</th>
	</tr>";

	



	$i=1;
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
	  echo "<td>" . $row['decision'] . "</td>";
	  echo "<td>" . $row['e_delivery'] . "</td>";
	  echo "<td>" . $row['odds'] . "</td>";
	  echo "<td><input type='button' value='Edit' onclick='edit_prospect($vid);'></td>";
	  echo "<td><input type='button' value='Remarks' onclick='show($vid);'></td>";
	  echo "</tr>";
	  }
	  
	echo "</table>";



?>
<html>
<head>
	<script>function edit_prospect(vid){
		alert(vid);
		window.location.href='edit_prospect.php?value='+vid;
			}



			function show(vid){
				alert(vid);
			    window.location.href='show_remarks.php?value='+vid;	
			}
	</script>
</head>
</html>


