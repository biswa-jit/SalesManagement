<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Upload page</title>
<style type="text/css">
body {
	background: #E3F4FC;
	font: normal 14px/30px Helvetica, Arial, sans-serif;
	color: #2b2b2b;
}
a {
	color:#898989;
	font-size:14px;
	font-weight:bold;
	text-decoration:none;
}
a:hover {
	color:#CC0033;
}

h1 {
	font: bold 14px Helvetica, Arial, sans-serif;
	color: #CC0033;
}
h2 {
	font: bold 14px Helvetica, Arial, sans-serif;
	color: #898989;
}
#container {
	background: #CCC;
	margin: 100px auto;
	width: 945px;
}
#form 			{padding: 20px 150px;}
#form input     {margin-bottom: 20px;}
</style>
</head>
<body>
<div id="container">
<div id="form">

	<?php
	include 'conn.php';
	$sql="TRUNCATE TABLE webinfo"; 
	mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
	//echo "query executed";
	?>
	Upload new csv by browsing to file and clicking on Upload<br />

	<form enctype='multipart/form-data' action='assign.php' method='post'>

	File name to import:<br />

	<input size='50' type='file' name='filename'><br />

    <input type='submit' name='submit' value='Upload'></form>


<!--print "<form method='POST' action='assign.php'>";
print "<input type='submit' name='assign' value='Assign'>";
print "</form>";
-->

<h2>Before uploading the CSV:</h2>
<h3>1.Format the columns date.created,decision & e_delivery to yyyy-mm-dd format.</h3>

<h3>2.Set the columns in the order salesman,pid,vid,cust,customer.contact,customer.tel,area/province,machine.line,<br>model,qty,price,date.created,decision,e.delivery,odds,remarks.</h3>

<h3>3.Delete the first row i.e the heading.</h3>

<h3>4.Select a salesman from salesman column and drag it till next salesman name.</h3>

<h3>5.At the end of each salesman i.e just before the next one,remove the row containg salesman total(e.g:Rajendra Mishra Total).</h3>

<h3>6.Click on saveas and save it in the format CSV(Comma delimited)(*.csv).Leave the CSV file opened in the Excel window.Dont close the window.Now upload.</h3>


</div>
</div>
</body>
</html>