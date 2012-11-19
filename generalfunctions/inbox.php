<?php
session_start();


/**
Displays the HTML format of a message in the personnel_email inbox if the Message ID is valid.
@database: personnel_email
@modifiers: 
**/
function displayMessage($mid, $is_request = false)
{
	if ($is_request)
	{
		$query = sprintf("SELECT * FROM requests p JOIN users u ON p.from_id=u.idnum WHERE to_id='%d' AND mid='%d' LIMIT 1", $_SESSION['idnum'], $_GET['mid']);
	}
	else
	{
		$query = sprintf("SELECT * FROM personnel_email p JOIN users u ON p.from_id=u.idnum WHERE to_id='%d' AND mid='%d' LIMIT 1", $_SESSION['idnum'], $_GET['mid']);
	}
	$result = mysql_query($query);
	if (!$result)
	{
		echo mysql_error();
		$message = "Cannot open message";
	}
	
	$mes = mysql_fetch_assoc($result);
	if (is_null($mes['picture']))
	{
		$mes['picture'] = "images/default.png";
	}

	//Writing out the message	
	$message = $message."<div style='height:0px;width:80px;float:left'><img margin-right:2px' src='".$mes['picture']."' width='35' height='35'/><br></div>";
	$message = $message."<span style='float:left; margin-left:45px'><div style='font-weight: bold; color: black; font-size: 1.4em;'>";
		
	if ($mes['subject'] == "") 
	{
		$message = $message."[untitled]";
	} 
	else 
	{
		$message = $message.$mes['subject'];
	}
	
	$message = $message."</div>";
	$message = $message."<a id='sender_name' href='cprofile.php?idnum=".$mes['from_id']."' style='font-size: 1.2em; color: grey;'>".$mes['first_name']." ".$mes['last_name']."</a><hr/>"; //adds name.
	$message = $message.$mes['body']."</span>";
	
	// Replies time
	if ($is_request)
	{
		/**
		Working on.
		**/
		//Selecting timeslots
		$query = sprintf("SELECT * FROM available_slots WHERE r_id=%d AND user_id=0", $mes['from_id']);
		$res2 = mysql_query($query);
		if (!$res2)
		{
			$error .= mysql_error();
		}
		else
		{
			$time_mes = "<label class='field'>Time Slot</label><select name='time'>";
			while ($time_option = mysql_fetch_assoc($res2))
			{
				$time_mes .= "<option value='".$time_option['slottime']."'>".$time_option['slottime']."</option>";
			}
			$time_mes .= "</select>";
		}
	}
	
	if ($is_request)
	{
		$message .= "<span style='clear:both; float:left; margin-left:80px; margin-top: 3em;'><form method='post' action='inbox.php?write=true&single=true&response=true'><input type='submit' value='Reply' /></form>";
	}
	else
	{
		$message = $message."<span style='clear:both; float:left; margin-left:80px; margin-top: 3em;'><form method='post' action='inbox.php?write=true&single=true'><input type='submit' value='Reply' /></form>";
	}
	
	//Set the two and from for replying to message.
	$_SESSION['to'] = $mes['first_name']." ".$mes['last_name'];
	$_SESSION['subject'] = "Re: ".$mes['subject'];
	$_SESSION['body'] = "";
	
	//Updates the message to be read.
	$query = sprintf("UPDATE personnel_email SET is_read=1 WHERE mid='%d';", $_GET['mid']);
	$result = mysql_query($query);
	if (!$result)
	{
		$message = $query."\n".mysql_error();
	}
	
	return($message);
}
?>