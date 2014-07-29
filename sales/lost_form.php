<html>
<body>

<?php 
include 'conn.php';
$sql_brand="SELECT DISTINCT brand FROM comp_model";
$r1=mysql_query($sql_brand) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());



$sql_comp_model="SELECT * FROM comp_model WHERE status='activated'";
$r2=mysql_query($sql_comp_model) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

$sql_model="SELECT * FROM model WHERE status='activated'";
$r3=mysql_query($sql_model) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());





?>
<form method='POST' action='lost_form_entry.php'>
<table>
<tr><td>Brand</td><td><select name='brand'><?php

											while($row=mysql_fetch_array($r1)){
												$brand=$row['brand'];
												echo "<option value='$brand'>$brand</option>";

											}
												?></select></td></tr>


<tr><td>Competition Model</td><td><select name='comp_model'><?php

											while($row=mysql_fetch_array($r2)){
												$model_no=$row['model_no'];
												echo "<option value='$model_no'>$model_no</option>";

											}


												?></select></td></tr>

<tr><td>Qty</td><td><input type='number' name='qty'></td></tr>
<tr><td>Price</td><td><input type='number' name='price'></td></tr>
<tr><td>Area</td><td><input type='text' name='area'></td></tr>
<tr><td>Category</td><td><select name='category'>
				<option value='GPPE Excavator'>GPPE Excavator</option>
				<option value='GPPE Loader'>GPPE Loader</option>
				<option value='RM Soil'>RM Soil</option><br>
				<option value='RM Asphalt'>RM Asphalt</option>
				<option value='RM Grader'>RM Grader</option>
				<option value='SDLG 3Ton'>SDLG 3Ton</option>
				<option value='SDLG 5Ton'>SDLG 5Ton</option>
				<option value='SDLG Grader'>SDLG Grader</option>
	</select></td></tr>
<tr><td>Own Model</td><td><select name='model'><?php

											while($row=mysql_fetch_array($r3)){
												$model_no=$row['model_no'];
												echo "<option value='$model_no'>$model_no</option>";

											}


												?></select></td></tr>
<tr><td>Date of Loss</td><td><input type='date' name='loss_date'></td></tr>
<tr><td>Reason of Loss</td><td><select name='reason'>   <option value="Price">Price</option>
											<option value="Technical Feature">Technical Feature</option>
											<option value="After sales support">After sales support</option>
											<option value="Relationship with competition">Relationship with competition</option>
											<option value="Finance Package">Finance Package</option>
											<option value="Others">Others</option>
							     </select></td></tr>


<tr><td><input type='submit' value='Submit'></td></tr>

</table>
</form>
	
</body>







</html>


