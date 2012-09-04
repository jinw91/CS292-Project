<?php

include_once("connect.php"); 
$from=$_GET['from'];
$to=$_GET['to'];
//$from='2012-08-17';
//$to='2012-09-22';

//echo "madhur";
$json=array();
$count=0;
$queryGetSlots="Select * from available_slots where start_time>='$from' AND end_time<='$to' AND user_id=0";
$resultSlots=mysql_query($queryGetSlots);
while($row=mysql_fetch_array($resultSlots)) {

    $temp=array('starttime' => $row['start_time'],
                'endtime' => $row['end_time'],
                'interviewer' => $row['r_id'],
                'slotid' => $row['slot_id'],
            );
   // $json[$count++]=$row['timeslot']+ "|" + $row['endtimeslot'];
    array_push($json,$temp);
    
   // echo $row['timeofslot'] . "<br/>" . $row['endtimeslot']. "<br/>" . $row['checked']. "<br/>";
    
}
//echo $json[0];
$jsonstring=json_encode($json);
echo $jsonstring;
mysql_close($con);

//$queryGetSlots="INSERT INTO availableslots (timeofslot,endoftimeslot,checked) VALUES(); "
?>
