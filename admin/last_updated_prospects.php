<?php

include 'conn.php';


$from_date=$_POST['from_date'];
$to_date=$_POST['to_date'];
echo "From  $from_date ";
echo "To $to_date :";
 
$sql="SELECT * FROM  webinfo_updating WHERE  vid IN(SELECT  vid FROM  last_updated_temp WHERE  _date >=  '2014-07-01' AND  _date <=  '2014-07-31')";
$r=mysql_query($sql)  or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
if(mysql_num_rows($r)==0){
	echo "<script>alert('No prospects found.');</script>";
	echo "<script>window.history.back();</script>";
	die();
}
	

echo "<form method='POST' action='remove_updated_entries.php'>";

echo "<table border='1'>
	<tr>
	<th><input type='checkbox' id='selectall'/></th>
	<th>Salesman</th>
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

	



	
	while($row = mysql_fetch_array($r)) {
	  $vid=$row['vid'];
		
	  echo "<tr>";
	  echo "<td><input type='checkbox' class='case' name='vid[]' value='$vid'></td>";
	  echo "<td>" . $row['salesman'] . "</td>";
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
	  echo "<td><input type='button' value='Edit' onclick='edit_prospect($vid);'></td>";
	  echo "<td><input type='button' value='Remarks' onclick='show($vid);'></td>";
	  echo "</tr>";
	  }
	  
	echo "</table><br>";

echo "<input type='submit' value='Submit'>";
echo "</form>";
//include 'last_updated_prospects.html';

?>
<html>
<script>function edit_prospect(vid){
		alert(vid);
		window.location.href='edit_prospect.php?value='+vid;
			}



			function show(vid){
				alert(vid);
			    window.location.href='show_remarks.php?value='+vid;	
			}

			function excel(){
				var val='total';
				window.location.href='excel.php?value='+val;	
			}
	</script>
</html>





