<?php
include 'conn.php';
session_start($_COOKIE['ses_id']);
$name=$_SESSION['name'];
$vid=$_GET['value'];
$_SESSION['vid']=$vid;
//setcookie('row_no',$row_no,time()+3600);

//echo "vid from session is".$_SESSION['vid'];

$sql_show="SELECT pid,vid,cust,customer_tel,model,qty,price,decision,e_delivery,odds,remarks FROM webinfo_updating WHERE vid='$vid'";
$result1=mysql_query($sql_show) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());


$sql_get_financer="SELECT name FROM financer_updating WHERE vid='$vid' ORDER BY row_no DESC LIMIT 1";
$r=mysql_query($sql_get_financer) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$financer;
while($row=mysql_fetch_array($r)){
	global $financer;
	$financer=$row['name'];

}



echo "<table border='1'>
	<tr>
	<th>PID</th>
	<th>VID</th>
	<th>Customer Name</th>
	<th>Contact No</th>
	<th>Model</th>
	<th>Qty</th>
	<th>Price</th>
	<th>Decision Date</th>
	<th>Delivery Date</th>
	<th>Odds</th>
	<th>Financer</th>
	
	</tr>";
	


	while($row = mysql_fetch_array($result1)) {
		global $financer;
		$vid=$row['vid'];
		$_SESSION['cust']=$row['cust'];
		$price=$row['price'];
		$model=$row['model'];
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
	  echo "<td>$financer</td>";
	  echo "<td><input type='button' value='Remarks' onclick='show($vid);'></td>";
	  echo "</tr>";
	}
	
	echo "</table>";




echo "<br><br>";
echo "<form method='POST' action='update_prospect.php'>
		<h3>Model:<select name='new_model'></h3>";
		$sql_select_models="SELECT * FROM model";
		$result2=mysql_query($sql_select_models)or die(mysql_error());
		//$i=1;
		while($row2=mysql_fetch_array($result2)){
			/*if($i==1)
				echo "<option>--Please Select--</option>";*/
			$r=$row2['model_no'];
			if($row2['model_no']==$model)
				echo "<option value='$r' selected>" . $row2['model_no'] . "</option>";
			else if($row2['status']=='activated')
				echo "<option value='$r'>" . $row2['model_no'] . "</option>";
			else
				echo "<option disabled>" . $row2['model_no'] . "</option>";
			//$i++;
		}


echo "</select>"."<br>";
?>
<h3>Price:<input type='number' name='price' value="<?php echo $price;?>"></h3>
<?php
echo "<h3>Odds:<select name='odds'>
				<option value='25'>25%</option>
				<option value='50'>50%</option>
				<option value='75'>75%</option>
				<option value='90'>90%</option>
				<option value='won'>Won</option>
				<option value='lost'>Lost</option>
				<option value='abandoned'>Abandoned</option>
			</select></h3>";


echo "<h3>Financer:<select name='financer'>";
$sql_financer="SELECT * FROM financer";
$r=mysql_query($sql_financer) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
while($row=mysql_fetch_array($r)){
	$name=$row['name'];
	if($row['status']=='activated')
		echo "<option value='$name'>$name</option>";
	else
		echo "<option disabled>$name</option>";



}
echo "</select>";

echo "<h3>Change Decision Date
<input type='date' id='dec_date' name='dec_date' required></h3>";

echo "<h3>Change Delivery Date
<input type='date' id='del_date' name='del_date' required></h3>";


echo "<h3>Updation type:<input type='radio' name='visit' value='1' onclick='visit_b();'>Telephonic&emsp;&emsp;<input type='radio' name='visit' value='2' onclick='visit1();'>Personal Visit</h3>";

echo "<div id='p_visit' style='visibility:hidden;'>";
echo "Date of visit:<input type='date' name='visit_date'><br>";
echo "Place of visit:<input type='text' name='visit_place'>";

echo "</div>";
echo "<h3>Remarks<br /><textarea name='remarks' required></textarea><b>NB:Please dont use single quotation(') in your remarks.</b><br><br>";
echo "<input type='submit' value='Update'></h3>";
echo "</form>";
echo "<h3>NB:If you aren't updating all fields,then please enter their current data there.</h3>";
?>






<html>
<head>

<script>
function visit1(){
	//alert("visit ");

	document.getElementById('p_visit').style.visibility="visible";
}

function visit_b(){
//alert("visit_b ");
document.getElementById('p_visit').style.visibility="hidden";	
}

function show(vid){
				alert(vid);
			    window.location.href='show_remarks.php?value='+vid;	
			}




</script>
</head>
</html>