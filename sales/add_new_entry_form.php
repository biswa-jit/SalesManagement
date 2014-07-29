<?php
include 'conn.php';
?>
<html>
<body>
<form method='POST' action='send_to_admin.php'>
<table>
<tr><td>Customer Name:</td><td><input type='text' name='cust'></td></tr>
<tr><td>Address:</td><td><textarea name='address' required></textarea></td></tr>
<tr><td>City:</td><td><input type='text' name='city'></td></tr>
<tr><td>District:</td><td><?php
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
<tr><td>Designation:</td><td><input type='text' name='designation'></td></tr>
<tr><td>Project Site:</td><td><input type='text' name='project_site'></td></tr>
<tr><td>Customer Contact:</td><td><input type='text' name='customer_contact'></td></tr>
<tr><td>Customer Tel:</td><td><input type='text' name='customer_tel'></td></tr>
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
<tr><td>EmailId:</td><td><input type='text' name='email_id'></td></tr>
<tr><td>Fax No:</td><td><input type='text' name='fax_no'></td></tr>
<tr><td>Project:</td><td><input type='text' name='project'></td></tr>
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

<tr><td>Qty:</td><td><input type='number' name='qty'></td></tr>
<tr><td>Price:</td><td><input type='number' name='price'></td></tr>
<tr><td>Odds:</td><td><select name='odds'>
				<option value='25'>25%</option>
				<option value='50'>50%</option>
				<option value='75'>75%</option>
				<option value='90'>90%</option>
				<option value='99'>99%</option>
				<option value='won'>Won</option>
				<option value='lost'>Lost</option>
				<option value='abandoned'>Abandoned</option>
			</select></td></tr>
<tr><td>Decision Date:</td><td><input type='date' name='decision' required placeholder='yyyy-mm-dd'></td></tr>
<tr><td>Delivery Date:</td><td><input type='date' name='e_delivery' required placeholder='yyyy-mm-dd'></td></tr>
</table>
<input type='submit' value='Send To Admin'>
</form>






</body>

</html>