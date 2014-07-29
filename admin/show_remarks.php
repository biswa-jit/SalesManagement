<?php
include 'conn.php';
$ses_id=$_COOKIE['ses_id'];
session_start($ses_id);

$vid=$_GET['value'];

$sql="SELECT remarks FROM webinfo_updating WHERE vid='$vid'";
$result=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());

echo "<table border='1'>";

while($row=mysql_fetch_array($result))
	echo "<tr>".$row['remarks']."</tr>";
echo "</table>";
?>