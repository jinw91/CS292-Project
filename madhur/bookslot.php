<?php

include_once("connect.php"); 

$slotid=$_POST['slot'];
//$from='2012-08-17';
//$to='2012-09-22';

//echo "madhur";
$json=array();
$count=0;
$updateSlots="update available_slots set user_id=5 where slot_id=$slotid";

mysql_query($updateSlots);
echo "$slotid";
mysql_close($con);

//$queryGetSlots="INSERT INTO availableslots (timeofslot,endoftimeslot,checked) VALUES(); "
?>
