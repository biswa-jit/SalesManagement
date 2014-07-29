<?php
include 'conn.php';
$name=$_SESSION['name'];



$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$current_date= $date->format('Y-m-d');
$d=date_parse_from_format("Y-m-d", $current_date);
$d['month']=$d['month']-1;

$overlook_date=$d['year']."-".$d['month']."-".$d['day'];

$sql_total="SELECT * FROM webinfo_updating WHERE salesman='$name'";
$r=mysql_query($sql_total) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$tp=mysql_num_rows($r);


$sql_cold="SELECT * FROM webinfo_updating WHERE odds=25 AND salesman='$name'";
$r=mysql_query($sql_cold) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$cp=mysql_num_rows($r);

$sql_warm="SELECT * FROM webinfo_updating WHERE odds=50 AND salesman='$name'";
$r=mysql_query($sql_warm) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$wp=mysql_num_rows($r);

$sql_advance="SELECT * FROM webinfo_updating WHERE odds=75 AND salesman='$name'";
$r=mysql_query($sql_advance) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$ap=mysql_num_rows($r);

$sql_hot="SELECT * FROM webinfo_updating WHERE (odds=90 OR odds=99) AND salesman='$name'";
$r=mysql_query($sql_hot) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$hp=mysql_num_rows($r);

$sql_overdue="SELECT * FROM webinfo_updating WHERE decision<'$current_date' AND salesman='$name'";
$r=mysql_query($sql_overdue) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$op=mysql_num_rows($r); 


$sql="SELECT * FROM webinfo_updating WHERE vid IN(SELECT vid FROM last_updated WHERE _date<='$overlook_date' AND _date!='0000-00-00' AND salesman='$name')";
$r=mysql_query($sql)  or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$ovp=mysql_num_rows($r);

















?>












<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pollutech</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" />
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="Files/css/dashboard.css" />
<link rel="stylesheet" href="bootstrap/fonts/glyphicons-halflings-regular.ttf" />
</head>

<body>
<body style="background:#eee;">

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand">Welcome <?php echo $_SESSION['name'];?></a>
        </div>
        
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="sales/account_settings_sales.php" target="frame">Account Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li id="tt1" onclick="col(this.id);"><a href="sales/total_prospects.php" target="frame">Total Prospects       <?php echo "<font color='red'>$tp</font>";?></a></li>
            <li id="tt2" onclick="col(this.id);"><a href="sales/cold_prospects.php" target="frame">Cold Prospects         <?php echo "<font color='red'>$cp</font>";?></a></li>
            <li id="tt3" onclick="col(this.id);"><a href="sales/warm_prospects.php" target="frame">Warm Prospects       <?php echo "<font color='red'>$wp</font>";?></a></li>
            <li id="tt4" onclick="col(this.id);"><a href="sales/advance_prospects.php" target="frame">Advance Prospects       <?php echo "<font color='red'>$ap</font>";?></a></li>
            <li id="tt5" onclick="col(this.id);"><a href="sales/hot_prospects.php" target="frame">Hot Prospects       <?php echo "<font color='red'>$hp</font>";?></a></li>
            <li id="tt6" onclick="col(this.id);"><a href="sales/overdue_prospects.php" target="frame">Overdue Prospects       <?php echo "<font color='red'>$op</font>";?></a></li>
            <li id="tt7" onclick="col(this.id);"><a href="sales/overlooked_prospects.php" target="frame">Scheduled Prospects       <?php echo "<font color='red'>$ovp</font>";?></a></li>
            <li id="tt8" onclick="col(this.id);"><a href="sales/add_new_entry_form.php" target="frame">New Prospects Entry</a></li>
            <li id="tt9" onclick="col(this.id);"><a href="sales/personal_won.php" target="frame">Won</a></li>
            <li id="tt10" onclick="col(this.id);"><a href="sales/personal_lost.php" target="frame">Lost From Database</a></li>
          </ul>
          <ul class="nav nav-sidebar">
           <!-- <li><a>Update</a><ul><li><a href="" target="frame">New Entry</a></li><li><a href=""target="frame">Edit</a></li>--><li><a href="sales/direct_lost_entry_form.php" target="frame">Direct Lost Entry</a></li></ul></li>
            
           <!-- <li><a href="" target="frame">Participation</a></li><li><a href="" target="frame">Conversion</a></li><li><a href="sales/overlooked_prospects.php" target="frame">Prospects Overlooked</a></li></ul></li>-->
          </ul>
          
        </div>
        <iframe name="frame" style="position:absolute;top:8%;left:17%;width:82%;height:90%;"></iframe>
</body>
<script type="text/javascript">
        
        var arr=['tt1','tt2','tt3','tt4','tt5','tt6','tt7','tt8','tt9','tt10'];
          function col(idcol){
                  var k=idcol;
                  var i=0;
                  document.getElementById(idcol).style.background="skyblue";
                  for(i=0;i<10;i++){
                    if(arr[i]!=idcol)
                        document.getElementById(arr[i]).style.background="#fff";
                     }
          }
        </script>
</html>
