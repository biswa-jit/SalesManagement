<?php

include 'conn.php';

$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$current_date= $date->format('Y-m-d');
 //echo $r;

$sql="SELECT * FROM webinfo_updating WHERE decision<'$current_date'";
$result=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

if(mysql_num_rows($result)==0){
	echo "<script>alert('Cuurently you have no prospect in this category');</script>";
	die();
}

echo "<input type='button' value='Download Excel' onclick='excel()';>";
echo "<br><br><br>";

echo "<table border='1'>
	<tr>
	<th>Salesman</th>
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

	



	
	while($row = mysql_fetch_array($result)) {
	  $vid=$row['vid'];
		
	  echo "<tr>";
	  echo "<td>" . $row['salesman'] . "</td>";
	  echo "<td>" . $row['pid'] . "</td>";
	  echo "<td>" . $row['vid'] . "</td>";
	  echo "<td>" . $row['cust'] . "</td>";
	  echo "<td width='1'>" . $row['customer_tel'] . "</td>";
	  echo "<td>" . $row['model'] . "</td>";
	  echo "<td>" . $row['qty'] . "</td>";
	  echo "<td>" . $row['price'] . "</td>";
	  echo "<td width='10'>" . $row['decision'] . "</td>";
	  echo "<td width='10'>" . $row['e_delivery'] . "</td>";
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
			function excel(){
				var val='overdue';
				window.location.href='excel.php?value='+val;	
			}
	</script>
</head>
</html>
