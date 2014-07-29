<?php
include 'conn.php';
?>
<html>
<body>
<h2><center><u>Add New District</u></center></h2>
<form method="POST" action='add_new_district_actual.php' style="position: absolute; height: 200px; width: 400px; margin: -100px 0 0 -200px; top: 40%; left: 55%;">

District Name:<input type='text' name='name'><br>
Select Zone:<select name='zone'><?php
          $sql="SELECT name,status FROM zone WHERE 1";
          $result=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
          while($row=mysql_fetch_array($result)){
          		$status=$row['status'];
          		$name=$row['name'];
          		if($status=='activated')
          			echo "<option value='$name'>$name</option>";
          		else
          			echo "<option disabled>$name</option>";
          }
echo "</select>";
?>

<input type='submit' value='Add' name='submit'>

</form>




</body>
</html>


