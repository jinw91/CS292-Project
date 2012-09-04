<?php

include_once("connect.php"); 
//$from=$_GET['from'];
//$to=$_GET['to'];
$from='2012-08-17';
$to='2012-09-22';

//echo "madhur";
$json=array();
$count=0;
$queryGetSlots="Select * from available_slots";
$resultSlots=mysql_query($queryGetSlots);
while($row=mysql_fetch_array($resultSlots)) {

    
    echo $row['start_time'] . "<br/>" . $row['end_time']. "<br/>" . $row['user_id']. "<br/>";
    
}
mysql_close($con);

//$queryGetSlots="INSERT INTO availableslots (timeofslot,endoftimeslot,checked) VALUES(); "
?>
