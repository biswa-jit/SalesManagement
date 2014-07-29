<?php
include 'conn.php';

/*$sql_sales_assign="INSERT INTO 'sales_assignment' SELECT * FROM 'webinfo'";
 $w=mysql_query($sql_sales_assign) or die(mysql_error());
 if($w)
 	echo "Sales asigned succesfully";

*/

 //$_FILES['filename']=$_POST['filename'];//////////////////////////////////////////
 	ini_set("max_execution_time",0);
if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
	}

	//Import uploaded file to Database
	$handle = fopen($_FILES['filename']['tmp_name'], "r");
	$i=0;
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$i++;
		if($i%4!=1)
			continue;
		$import="INSERT INTO webinfo VALUES('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]','$data[14]','$data[15]')";

		mysql_query($import) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
		
	}

	fclose($handle);

	print "Import done";
echo "<form method='POST' action='preview.php'>
<input type='submit' value='Preview'>
</form>";

echo "<h3>NB:Click on preview to see whether data imported from the CSV correctly or not.Compare it with the CSV.If any error,then upload again.If no error,click 'Assign'.</h3>";

?>