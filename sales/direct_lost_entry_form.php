<?php
include 'conn.php';









?>



<html>
<body>
<center><h2><u>Direct Lost Entry Form</u></h2></center>

	
	<form method='POST' action='direct_lost_entry.php'>
<table>
<tr><td>Name</td><td><input type='text' name='customer_name' required></td></tr>
<tr><td>Contact Person</td><td><input type='text' name='contact_person'></td></tr>
<tr><td>Contact No</td><td><input type='text' name='contact_no'></td></tr>
<tr><td>Address</td><td><textarea name='address'></textarea></td></tr>
<tr><td>City</td><td><input type='text' name='city'></td></tr>
<tr><td>District</td><td><?php
						$sql='SELECT * FROM district';
						$r=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
					
						echo "<select name='district'>";
						while($row=mysql_fetch_array($r)){
						$district_name=$row['name'];
						if($row['status']=='activated')
							echo "<option value='$district_name'>$district_name</option>";
						else
							echo "<option disabled>$district_name</option>";

						}
						echo "</select>";?></td></tr>
<tr><td>Segment</td><td><?php
						$sql='SELECT * FROM segment';
						$r=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
					
						echo "<select name='segment'>";
						while($row=mysql_fetch_array($r)){
						$segment_name=$row['name'];
						if($row['status']=='activated')
							echo "<option value='$segment_name'>$segment_name</option>";
						else
							echo "<option disabled>$segment_name</option>";

						}
						echo "</select>";?></td></tr>






<tr><td>Financer</td><td><?php 
							$sql='SELECT * FROM financer';
							$r=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
							
							echo "<select name='financer'>";
							while($row=mysql_fetch_array($r)){
							$financer_name=$row['name'];
							if($row['status']=='activated')
								echo "<option value='$financer_name'>$financer_name</option>";
							else
								echo "<option disabled>$financer_name</option>";

							}
							echo "</select>";?></td></tr>
<tr><td>Competition Model</td>
	<td><?php 
			$sql_comp_model="SELECT * FROM comp_model";
			$r2=mysql_query($sql_comp_model) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

             echo "<select name='comp_model'>";

            while($row=mysql_fetch_array($r2)){
           		$comp_model=$row['model_no'];
           		if($row['status']=='activated')
           			echo "<option value='$comp_model'>$comp_model</option>";
           		else
           			echo "<option disabled>$comp_model</option>";

           }

           echo "</select>";?>  </td></tr>


<tr><td>Qty</td><td><input type='number' name='qty'></td></tr>
<tr><td>Model</td><td><?php 
			$sql_model="SELECT * FROM model";
			$r1=mysql_query($sql_model) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
           echo "<select name='model'>";

           while($row=mysql_fetch_array($r1)){
           		$model=$row['model_no'];
           		if($row['status']=='activated')
           			echo "<option value='$model'>$model</option>";
           		else
           			echo "<option disabled>$model</option>";

           }

           echo "</select>";?>  </td></tr>




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


<tr><td>Price</td><td><input type='number' name='price'></td></tr>
<tr><td>Reason for Loss:</td><td><select name='reason'>   <option value="Price">Price</option>
											<option value="Technical Feature">Technical Feature</option>
											<option value="After sales support">After sales support</option>
											<option value="Relationship with competition">Relationship with competition</option>
											<option value="Finance Package">Finance Package</option>
											<option value="Others">Others</option>
							     </select></td></tr>


<tr><td>Date of Loss</td><td><input type='date' name='loss_date'></td></tr>
<tr><td>Remarks</td><td><textarea name='remarks' required></textarea></td></tr></table>
<input type='submit' value="Submit">
</form>
</body>


</html>