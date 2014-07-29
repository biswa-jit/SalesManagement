<?php
include 'conn.php';


$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$current_date= $date->format('Y-m-d');

$d=date_parse_from_format("Y-m-d", $current_date);



$d['month']=$d['month']-1;
$overlook_date=$d['year']."-".$d['month']."-".$d['day'];

//create query to select as data from your table
$type=$_GET['value'];
if($type=='total')
    $select = "SELECT * FROM webinfo_updating";
else if($type=='cold')
    $select = "SELECT * FROM webinfo_updating WHERE odds=25";
else if($type=='hot')
    $select = "SELECT * FROM webinfo_updating WHERE odds=90 OR odds=99";
else if($type=='overdue')
    $select = "SELECT * FROM webinfo_updating WHERE decision<'$current_date'";
else if($type=='advance')
    $select = "SELECT * FROM webinfo_updating WHERE odds=75";
else if($type=='overlooked')
    $select = "SELECT * FROM webinfo_updating WHERE vid IN(SELECT vid FROM last_updated WHERE _date<='$overlook_date')";
else if($type=='warm')
    $select = "SELECT * FROM webinfo_updating WHERE odds=50";
else;
//run mysql query and then count number of fields


// Fetch Record from Database

$output = "";
$table = ""; // Enter Your Table Name 
$sql = mysql_query($select);
$columns_total = mysql_num_fields($sql);

// Get The Field Name

for ($i = 0; $i < $columns_total; $i++) {
$heading = mysql_field_name($sql, $i);
$output .= '"'.$heading.'",';
}
$output .="\n";

// Get Records from the table

while ($row = mysql_fetch_array($sql)) {
for ($i = 0; $i < $columns_total; $i++) {
$output .='"'.$row["$i"].'",';
}
$output .="\n";
}

// Download the file

$filename = "$type Prospects.csv";
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;

?>