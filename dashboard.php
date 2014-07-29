<?php 
include 'conn.php';

$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$current_date= $date->format('Y-m-d');

$d=date_parse_from_format("Y-m-d", $current_date);
$d['month']=$d['month']-1;
$overlook_date=$d['year']."-".$d['month']."-".$d['day'];




$sql_total='SELECT * FROM webinfo_updating';
$r=mysql_query($sql_total) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$tp=mysql_num_rows($r);


$sql_cold='SELECT * FROM webinfo_updating WHERE odds=25';
$r=mysql_query($sql_cold) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$cp=mysql_num_rows($r);

$sql_warm='SELECT * FROM webinfo_updating WHERE odds=50';
$r=mysql_query($sql_warm) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$wp=mysql_num_rows($r);

$sql_advance='SELECT * FROM webinfo_updating WHERE odds=75';
$r=mysql_query($sql_advance) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$ap=mysql_num_rows($r);

$sql_hot='SELECT * FROM webinfo_updating WHERE odds=90 OR odds=99';
$r=mysql_query($sql_hot) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$hp=mysql_num_rows($r);

$sql_overdue="SELECT * FROM webinfo_updating WHERE decision<'$current_date'";
$r=mysql_query($sql_overdue) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$ovdp=mysql_num_rows($r); 

$sql_overlooked="SELECT * FROM webinfo_updating WHERE vid IN(SELECT vid FROM last_updated WHERE _date<='$overlook_date' AND _date!='0000-00-00')";
$r=mysql_query($sql_overlooked) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$ovlp=mysql_num_rows($r); 

$sql_retrive_newentries="SELECT * FROM new_entries_temp";
$result=mysql_query($sql_retrive_newentries) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$new_entries=mysql_num_rows($result);


$sql_pending_for_webinfo="SELECT * FROM last_updated_temp";
$result=mysql_query($sql_pending_for_webinfo) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$pwi=mysql_num_rows($result);


$sql_direct_lost="SELECT * FROM direct_lost";
$result=mysql_query($sql_direct_lost) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
$direct_lost=mysql_num_rows($result);
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
          <a class="navbar-brand">Welcome  <?php echo $_SESSION['name'];?></a>
        </div>
        
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="admin/account_settings_sales.php"  target="frame">Account Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar" >
            <li id="tt1" onclick="col(this.id);"><a href="admin/total_prospects.php" target="frame">Total Prospects       <?php echo "<font color='red'>$tp</font>";?></a></li>
            <li id="tt2" onclick="col(this.id);"><a href="admin/cold_prospects.php" target="frame">Cold Prospects         <?php echo "<font color='red'>$cp</font>";?></a></li>
            <li id="tt3" onclick="col(this.id);"><a href="admin/warm_prospects.php" target="frame">Warm Prospects       <?php echo "<font color='red'>$wp</font>";?></a></li>
            <li id="tt4" onclick="col(this.id);"><a href="admin/advance_prospects.php" target="frame">Advance Prospects       <?php echo "<font color='red'>$ap</font>";?></a></li>
            <li id="tt5" onclick="col(this.id);"><a href="admin/hot_prospects.php" target="frame">Hot Prospects       <?php echo "<font color='red'>$hp</font>";?></a></li>
            <li id="tt6" onclick="col(this.id);"><a href="admin/overdue_prospects.php" target="frame">Overdue Prospects       <?php echo "<font color='red'>$ovdp</font>";?></a></li>
            <li id="tt7" onclick="col(this.id);"><a href="admin/overlooked_prospects.php" target="frame">Scheduled Prospects       <?php echo "<font color='red'>$ovlp</font>";?></a></li>
            <li id="tt8" onclick="col(this.id);"><a href="admin/last_updated_prospects.html" target="frame">Pending for Webinfo Entry       <?php echo "<font color='red'>$pwi</font>";?></a></li>
            <li id="tt9" onclick="col(this.id);"><a href="admin/visit_details.php" target="frame" class="active">Visit Details     </a></li>

           
            <li id="tt11" onclick="col(this.id);"><a href="admin/upload.php" target="frame">Upload CSV from Webinfo</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a target="frame">Update</a><ul>
               <li id="tt12" onclick="col(this.id);"><a href="admin/Sales Assignment/show_new_entry.php" target="frame">New Entry      <?php echo "<font color='red'>$new_entries</font>";?></a></li>
               <!-- <li><a href=""target="frame">Edit</a></li>-->
                <li id="tt13" onclick="col(this.id);"><a href="show_direct_lost_entry.php" target="frame">Direct Loss Entry       <?php echo "<font color='red'>$direct_lost</font>";?></a></li>
              </ul></li>



            <li><a target="frame">Sales Assignment</a>
              <ul><ul>
                <a href="admin/Sales Assignment/sales_assign_new_entries.php" target="frame"><li id="tt14" onclick="col(this.id);">Sales assignment to new entries</li></a>
                <a href="admin/Sales Assignment/change_sales_assignment.html" target="frame"><li id="tt15" onclick="col(this.id);">Change sales assignment</li></a>
                <a href="admin/Sales Assignment/view_sales_assignment_new_entries.html" target="frame"><li id="tt10" onclick="col(this.id);">View sales assignment to new entries</li></a>
              </ul></li></ul>







           

            <li><a target="frame">Master</a>
              <ul><li><a>Employee</a><ul>
                <a href="admin/Master/Employee/add_employee.html" target="frame"><li>Add</li></a>
                <a href="admin/Master/Employee/show_sales_details.php" target="frame"><li>Edit</li></a>
                <a href="admin/Master/Employee/activate_employee.php" target="frame"><li>Activate/Deactivate</li></a>
              </ul></li></ul>



            <ul><li><a>Model</a>
              <ul><a href="admin/Master/Model/add_new_model.html" target="frame"><li>Add</li></a>
                <!--<a href="" target="frame"><li>Edit</li></a>-->
                <a href="admin/Master/Model/show_models.php" target="frame"><li>Edit</li></a>
                <a href="admin/Master/Model/activate_model.php" target="frame"><li>Activate/Deactivate</li></a>

              </ul></li></ul></li>




              <ul><li><a>Competition Model</a>
              <ul><a href="admin/Master/Comp Model/add_new_comp_model.html" target="frame"><li>Add</li></a>
                <!--<a href="" target="frame"><li>Edit</li></a>-->
                <a href="admin/Master/Comp Model/show_comp_models.php" target="frame"><li>Edit</li></a>
                <a href="admin/Master/Comp Model/activate_comp_model.php" target="frame"><li>Activate/Deactivate</li></a>
              </ul></li></ul></li>





              <ul><li><a>Financer</a>
              <ul><a href="admin/Master/Financer/add_new_financer.html" target="frame"><li>Add</li></a>
                <!--<a href="" target="frame"><li>Edit</li></a>-->
                <a href="admin/Master/Financer/show_financer.php" target="frame"><li>Edit</li></a>
                <a href="admin/Master/Financer/activate_financer.php" target="frame"><li>Activate/Deactivate</li></a>
              </ul></li></ul></li>



              <ul><li><a>District</a>
              <ul><a href="admin/Master/District/add_new_district.php" target="frame"><li>Add</li></a>
                <!--<a href="" target="frame"><li>Edit</li></a>-->
                <a href="admin/Master/District/show_district.php" target="frame"><li>Edit</li></a>
                <a href="admin/Master/District/activate_district.php" target="frame"><li>Activate/Deactivate</li></a>
              </ul></li></ul></li>



              <ul><li><a>Zone</a>
              <ul><a href="admin/Master/Zone/add_new_zone.html" target="frame"><li>Add</li></a>
                <!--<a href="" target="frame"><li>Edit</li></a>-->
                <a href="admin/Master/Zone/show_zone.php" target="frame"><li>Edit</li></a>
                <a href="admin/Master/Zone/activate_zone.php" target="frame"><li>Activate/Deactivate</li></a>
              </ul></li></ul></li>



              <ul><li><a>Segment</a>
              <ul><a href="admin/Master/Segment/add_new_segment.html" target="frame"><li>Add</li></a>
                <!--<a href="" target="frame"><li>Edit</li></a>-->
                <a href="admin/Master/Segment/show_segment.php" target="frame"><li>Edit</li></a>
                <a href="admin/Master/Segment/activate_segment.php" target="frame"><li>Activate/Deactivate</li></a>
              </ul></li></ul></li>



              <ul><li><a>Lost Reason</a>
              <ul><a href="admin/Master/Lost Reason/add_new_lost_reason.html" target="frame"><li>Add</li></a>
                <!--<a href="" target="frame"><li>Edit</li></a>-->
                <a href="admin/Master/Lost Reason/show_lost_reason.php" target="frame"><li>Edit</li></a>
                <a href="admin/Master/Lost Reason/activate_lost_reason.php" target="frame"><li>Activate/Deactivate</li></a>
              </ul></li></ul></li>



            <!--<li><a href="" target="frame">Participation</a></li>
            <li><a href="" target="frame">Conversion</a></li>
            <li><a href="" target="frame">Prospects Overlooked</a></li></ul></li>-->
          </ul>
          
        </div>
        <iframe name="frame" style="position:absolute;top:9%;left:17%;width:82%;height:90%;"></iframe>
        <script type="text/javascript">

        var arr=['tt1','tt2','tt3','tt4','tt5','tt6','tt7','tt8','tt9','tt10','tt11','tt12','tt13','tt14','tt15','tt16'];
          function col(idcol){
            
                  var i=0;
            			document.getElementById(idcol).style.background="skyblue";
                  for(i=0;i<16;i++){
                    if(arr[i]!=idcol)
                        document.getElementById(arr[i]).style.background="#fff";
                     }
          }
        </script>
</body>
</html>
