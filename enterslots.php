<?php
session_start();
include_once("generalfunctions/database.php"); 
connectToDatabase();
$jsonstring=$_POST['jsondata'];
$jsonassocarray=json_decode(stripslashes($jsonstring),true); 
echo $jsonstring;

foreach($jsonassocarray as $key=>$value) {
        $store=array();
        echo "first: $key and $value";
    foreach($value as $keyinside=>$valueinside) {
        echo "second: $keyinside and $valueinside";
        $store[$keyinside]=$valueinside;
    }
    $start=strtotime($store["date"]." ".$store["starttime"]);
    $end=strtotime($store["date"]." ".$store["endtime"]);
    echo "third: $start and $end";
    $previous=$start;
    $current=$start+$store["duration"]*60;
    $xy=$current-$previous;
    echo "fourth: $xy";
    $diff=$end-$current;
    echo "fifth: $diff";
    while( $diff >= 0) {
        
        $currentdate=date("Y-m-d H:i:s",$current);
        $previousdate=date("Y-m-d H:i:s",$previous);
        echo "sixth: $currentdate";
        $insertSlots=sprintf("INSERT INTO available_slots (r_id, start_time, end_time, user_id) VALUES ('%d', '$previousdate','$currentdate', 0)", $_SESSION['idnum']);
        $insertcount++;
        mysql_query($insertSlots);
        $previous=$current;
        $current=$previous+$store["duration"]*60;
        $diff=$end-$current;
    }
}
mysql_close();
echo "done";
?>