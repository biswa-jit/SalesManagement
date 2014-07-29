<?php
 
include 'conn.php';


$sql_entries="SELECT * FROM webinfo_updating";
$result=mysql_query($sql_entries) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

if(mysql_num_rows($result)==0)
	die("Currently no prospects are there to be assigned.");

echo "<form method='POST' action='prospectwise.php'>";
echo "<table border='1'>
		    <tr>
		    	<th><input type='checkbox' id='selectall'/></th>
		    	<th>Salesman</th>
				<th>PID</th>
				<th>VID</th>
				<th>Customer Name</th>
			
				
				<th>Customer Tel</th>
				
				<th>Model</th>
				<th>Qty</th>
				<th>Price</th>
				<th>Odds</th>
				
				<th>Decision Date</th>
			
			</tr>";
	

	while($row = mysql_fetch_array($result)) {
		$vid=$row['vid'];
	  echo "<tr>";
	  echo "<td width='1'><input type='checkbox' class='case' name='vid[]' value='$vid'></td>";
	  echo "<td width='12'>" . $row['salesman'] . "</td>";
	  echo "<td width='7'>" . $row['pid'] . "</td>";
	  echo "<td width='7'>" . $row['vid'] . "</td>";
	  echo "<td width='15'>" . $row['cust'] . "</td>";
	 
	  echo "<td width='4'>" . $row['customer_tel'] . "</td>";
	 
	  echo "<td width='8'>" . $row['model'] . "</td>";
	  echo "<td width='3'>" . $row['qty'] . "</td>";
	  echo "<td width='8'>" . $row['price'] . "</td>";
	  echo "<td width='4'>" . $row['odds'] . "</td>";
	 
	  echo "<td width='8'>" . $row['decision'] . "</td>";
	 
	  //echo "<td>" . $row['row_no'] . "</td>";
	  
	  echo "</tr>";
	  
	}
	
	echo "</table>";

echo "<div style='position: absolute; height: 200px; width: 200px; margin: -100px 0 0 -200px; top: 50%; left: 96%;'>";
$sql_show_salespersons="SELECT name FROM salesperson_details WHERE status='activated'";
$r=mysql_query($sql_show_salespersons) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

echo "&nbsp;Assign To:<select name='salesman'>";

while($row=mysql_fetch_array($r)){
 $salesman=$row['name'];
 if($row['status']=='deactivated')
 	echo "<option disabled>$salesman</option>";
 else
 	echo "<option value='$salesman'>$salesman</option>";

}

echo "</select>";
echo "<input type='submit' value='Assign'>";
echo "</form>";
echo "</div>";





?>
<html>
<script>
var row;
function assign(row){
	var row_no=row;
	alert(row_no);
	window.location.href="assign_individually.php?value="+row_no;

} 
</script>

<script type="text/javascript" src="jquery.js"></script>


<SCRIPT language="javascript">
$(function(){

	$("#selectall").click(function () {
		  $('.case').attr('checked', this.checked);
	});

	$(".case").click(function(){

		if($(".case").length == $(".case:checked").length) {
			$("#selectall").attr("checked", "checked");
		} else {
			$("#selectall").removeAttr("checked");
		}

	});
});
</SCRIPT>
</html>