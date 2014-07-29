<html>
<?php
    include 'conn.php';
    
    $sql_retrive_newentries="SELECT * FROM new_entries_temp";
    $result=mysql_query($sql_retrive_newentries) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

    if(mysql_num_rows($result)==0)
    	die("Currently there are no new entries.");
    else if(!$result)
    	die("Error in database retrival");
    else ;
 echo "<table border='1'>
		    <tr>
				<th>Customer Name</th>
				<th>Address</th>
				<th>City</th>
				<th>District</th>
				<th>Designation</th>
				<th>Project Site</th>
				<th>Customer Contact</th>
				<th>Customer Tel</th>
				<th>Segment</th>
				<th>EmailId</th>
				<th>Fax No</th>
				<th>Project</th>
				<th>Machine Line</th>
				<th>Model</th>
				<th>Qty</th>
				<th>Price</th>
				<th>Odds</th>
				<th>Date Created</th>
				<th>Decision Date</th>
				<th>Delivery Date</th>
			</tr>";
	

	$i=1000000000000;
	$j=5000000000000;
	
	while($row = mysql_fetch_array($result)) {
		$r=$row['row_no'];
	  echo "<tr>";
	  echo "<td>" . $row['cust'] . "</td>";
	  echo "<td>" . $row['address'] . "</td>";
	  echo "<td>" . $row['city'] . "</td>";
	  echo "<td>" . $row['district'] . "</td>";
	  echo "<td>" . $row['designation'] . "</td>";
	  echo "<td>" . $row['project_site'] . "</td>";
	  echo "<td>" . $row['customer_contact'] . "</td>";
	  echo "<td>" . $row['customer_tel'] . "</td>";
	  echo "<td>" . $row['segment'] . "</td>";
	  echo "<td>" . $row['email_id'] . "</td>";
	  echo "<td>" . $row['fax_no'] . "</td>";
	  echo "<td>" . $row['project'] . "</td>";
	  echo "<td>" . $row['machine_line'] . "</td>";
	  echo "<td>" . $row['model'] . "</td>";
	  echo "<td>" . $row['qty'] . "</td>";
	  echo "<td>" . $row['price'] . "</td>";
	  echo "<td>" . $row['odds'] . "</td>";
	  echo "<td>" . $row['date_created'] . "</td>";
	  echo "<td>" . $row['decision'] . "</td>";
	  echo "<td>" . $row['e_delivery'] . "</td>";
	  //echo "<td>" . $row['row_no'] . "</td>";
	  echo "<td><input type='text' style='width:100;' placeholder='PID' id='$i'></td>";
	  
	  echo "<td><input type='text' style='width:100;' placeholder='VID' id='$j'></td>";

	  echo "<td><input type='button' value='Submit PID & VID' onclick='assign($i,$j,$r);'></td>";
	  echo "</tr>";
	   $i++;
	   $j++;
	}
	
	echo "</table>";
	mysql_close($con);
?>


<a href="volvo.com">Upload new entries to webinfo</a>
<a href='sales_assign.php'>Assign job to sales person</a>

<script>
//var id,id2,row;

	function assign(id,id2,row){
		alert("called");
		var x=id;
		var y=id2;
		var row_no=row;
		var pid=document.getElementById(x).value;
		var vid=document.getElementById(y).value;
		//var row_no=document.getElementById(z).value;
		var arr=[pid,vid,row_no];
		alert(arr);
		//alert(row_no);
		
		window.location.href = "assign_pid_vid.php?value="+arr;

		
		}
</script>

</html>
