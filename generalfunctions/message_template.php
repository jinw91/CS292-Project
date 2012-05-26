<?php
session_start();

define('__ROOT__', dirname(__FILE__));
require_once('database.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
        $error = "failed to connect";
}

$url = "../inbox.php?write=true";

if ($_GET['messagetype'] == 'phone') {
	$_SESSION['subject'] = "Phone Interview: ".$_SESSION['company']['company_name'];
	$_SESSION['body'] = "Thank you for sending in your application to ".$_SESSION['company']['company_name'].". We are pleased with what we see on your resume and would like to schedule a phone interview with you. The following times are available, please let us know what works best for you.";
	$_SESSION['time_edit'] = true;
} else if ($_GET['messagetype'] == 'interview') {
	unset($_SESSION['body']);
	$_SESSION['subject'] = "Job Interview: ".$_SESSION['company']['company_name'];
	$_SESSION['body'] = "Thank you for sending in your application to ".$_SESSION['company']['company_name'].". We are pleased with what we see on your resume and would like to schedule an in-person interview with you. The following times are available, please let us know what works best for you.";
	$_SESSION['time_edit'] = true;
} else if ($_GET['messagetype'] == 'offer') {
	$_SESSION['subject'] = "Job Offer: ".$_SESSION['company']['company_name'];
	$_SESSION['body'] = "Congratulations! We are pleased to have you to be part of ".$_SESSION['company']['company_name'].". Your compensation is as follows: You will begin work on the following day. Please let us know by then whether you will accept the job or not.";
	$_SESSION['time_edit'] = true;
} else if ($_GET['messagetype'] == 'supplement') {
	$_SESSION['subject'] = "Supplement Material Required: ".$_SESSION['company']['company_name'];
	$_SESSION['body'] = "Thank you for sending in your application to ".$_SESSION['company']['company_name'].". We are pleased with what we see on your resume though we would like to know more about you. Please send us the following material:";
	$_SESSION['time_edit'] = false;
} else if ($_GET['messagetype'] == 'blank') {
	$_SESSION['subject'] = "Message from ".$_SESSION['company']['company_name'];
	$_SESSION['body'] = "";
	$_SESSION['time_edit'] = false;
}

if (isset($_GET['multiple'])) {
	$tmp = $_SESSION['to_id'];
	for ($i=0; $i<count($tmp); $i++) {
		$query = sprintf("SELECT * FROM users WHERE idnum='%d'", $tmp[$i]);
		$result = mysql_query($query);
	        if (!$result)
		{
			echo mysql_error();
		}
        	$mes = mysql_fetch_assoc($result);
		$to_name[] = $mes['first_name']." ".$mes['last_name'];
	}
	$_SESSION['to'] = $to_name;
	$url = $url."&multiple=true";
} else if (isset($_GET['single'])) {
	$query = sprintf("SELECT * FROM users WHERE idnum='%d'", $_GET['to_id']);
	$result = mysql_query($query);
        if (!$result)
	{
		echo mysql_error();
	}
       	$mes = mysql_fetch_assoc($result);
	$to_name = $mes['first_name']." ".$mes['last_name'];
	$_SESSION['to'] = $to_name;
	$url = $url."&single=true";
}
header("Location: ".$url);
?>
