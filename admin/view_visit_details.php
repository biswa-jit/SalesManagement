<?php

include 'conn.php';

$salesman=$_POST['salesman'];
$from_date=$_POST['from_date'];
$to_date=$_POST['to_date'];
$vid=$_POST['vid'];

$telephonic_individual;
$remarks;
if(empty($_POST['vid'])){
    $sql="SELECT * FROM updation_type WHERE salesman='$salesman' AND visit_date>='$from_date' AND visit_date<='$to_date'";
    $r=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
    if(mysql_num_rows($r)==0){
            echo "<script>alert('No visit updates entered.');</script>";
            echo "<script>window.history.back();</script>";
            die();
                  }


echo "<table border='1'>";
echo "<tr>
         <th>Salesman</th>
            <th>VID</th>
            <th>Customer Name</th>
            <th>Visit Date</th>
            <th>Visit Place</th>
            <th>Telephonic Updation</th>
            <th>Remarks</th>
    </tr>"; 
 
 





while($row=mysql_fetch_array($r)){
        
        $vid_temp=$row['vid'];
        $sql_get_telephonic="SELECT telephonic FROM updation_type WHERE vid='$vid_temp' ORDER BY row_no DESC LIMIT 1";
        $q=mysql_query($sql_get_telephonic) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
        while($row_temp=mysql_fetch_array($q)){
            global $telephonic_individual;
            $telephonic_individual=$row_temp['telephonic'];
                                   }
        

        $get_remarks="SELECT remarks FROM webinfo_updating WHERE vid='$vid_temp'";
        $d=mysql_query($get_remarks) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
        while($row_remarks=mysql_fetch_array($d)){
            global $remarks;
            $remarks=$row_remarks['remarks'];
                  }
       

        echo "<tr>";
        echo "<td width='15%'>" . $row['salesman'] . "</td>";
        echo "<td width='3%'>" . $row['vid'] . "</td>";
        echo "<td width='25%'>" . $row['cust'] . "</td>";
        echo "<td width='15%'>" . $row['visit_date'] . "</td>";
        echo "<td width='15%'>" . $row['visit_place'] . "</td>";
        echo "<td width='3%'>" . $telephonic_individual . "</td>";
        echo "<td width='30%'>" . $remarks . "</td>";
        echo "</tr>";
    }

echo "</table>";
    }



else {
        $sql="SELECT * FROM updation_type WHERE salesman='$salesman' AND vid='$vid' AND visit_date>='$from_date' AND visit_date<='$to_date'";
        $r1=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
        if(mysql_num_rows($r1)==0)
            echo "No visit updates entered.";
        else{
            echo "<table border='1'>";
                echo "<tr>
                            <th>Salesman</th>
                            <th>VID</th>
                            <th>Customer Name</th>
                            <th>Visit Date</th>
                            <th>Visit Place</th>
                            <th>Remarks</th>
                     </tr>";
                    


                    $get_remarks="SELECT remarks FROM webinfo_updating WHERE vid='$vid'";
                    $r=mysql_query($get_remarks) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
                    $remarks;
                    while($row=mysql_fetch_array($r)){
                        global $remarks;
                        $remarks=$row['remarks'];
                    }
                    while($row=mysql_fetch_array($r1)){
                        echo "<tr>";
                        echo "<td width='15%'>" . $row['salesman'] . "</td>";
                        echo "<td width='10%'>" . $row['vid'] . "</td>";
                        echo "<td width='25%'>" . $row['cust'] . "</td>";
                        echo "<td width='10%'>" . $row['visit_date'] . "</td>";
                        echo "<td width='10%'>" . $row['visit_place'] . "</td>";
                        echo "<td width='35%'>" . $remarks . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                    

                }

$tel;
$sql="SELECT telephonic FROM updation_type WHERE salesman='$salesman' AND vid='$vid' AND visit_date>='$from_date' AND visit_date<='$to_date' ORDER BY row_no DESC";
$r=mysql_query($sql) or die("Error in  ".__FILE__ ."  on line  ". __LINE__ ."<br>".mysql_error());
if(mysql_num_rows($r)==0)
    die("No telephonic updates entered.");

else {
    while($row=mysql_fetch_array($r)){
    global $tel;
    $tel=$row['telephonic'];
    
}
    echo "<br><br>No of telephonic updation:$tel";
}

}




?>