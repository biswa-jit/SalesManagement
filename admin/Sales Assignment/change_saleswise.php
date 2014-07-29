<?php


include 'conn.php';

echo "<center><h2>Assign all prospects from one sales person to another.</h2></center>";



echo "<div style='position: absolute; height: 200px; width: 800px; margin: -100px 0 0 -200px; top: 50%; left: 40%;'>";
echo "<form method='POST' action='saleswise.php'>"; 
echo "Assign from:<select name='salesman_from'>";
$sql_from="SELECT name FROM salesperson_details WHERE status='activated'";
$r1=mysql_query($sql_from) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
while($row=mysql_fetch_array($r1)){
$name_from=$row['name'];
echo "<option value='$name_from'>$name_from</option>";

}
echo "</select>&emsp;&emsp;";


echo "Assign to:<select name='salesman_to'>";
$sql_to="SELECT name FROM salesperson_details WHERE status='activated'";
$r2=mysql_query($sql_to) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
while($row=mysql_fetch_array($r2)){
$name_to=$row['name'];
echo "<option value='$name_to'>$name_to</option>";

}
echo "</select>";
echo "<br><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;";

echo "<input type='submit' value='Assign' style='height:30;width:100;'>";
echo "</form>";


echo "</div>";

















?>