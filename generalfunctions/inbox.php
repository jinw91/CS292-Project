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


// Displaying all messages
// $query is the query to be executed.
// $is_request is whether the message is request or inbox.
function displayInboxMessages($query, $is_request = false)
{
	$result = mysql_query($query);
	if (!$result || mysql_num_rows($result) == 0)
	{
		$message = "";
		return($message);
	}
	
	$message = "<ul id='meslist'>";
	
	while ($mes =  mysql_fetch_assoc($result))
	{
		//Set cases for request
		if ($is_request)
		{
			$image_link = "profile.php?b_id=".$mes['from_bid'];
			$message_link = "inbox.php?rid=".$mes['rid'];
			$from_name = $mes['company_name'];
		}
		else
		{
			$image_link = "cprofile.php?idnum=".$mes['last_name'];
			$message_link = "inbox.php?rid=".$mes['mid'];
			$from_name = $mes['first_name']." ".$mes['last_name'];
		}
		
		if (is_null($mes['picture']))
		{
			$mes['picture'] = "images/default.png";
		}
		
		$message = $message."<li><div style='height:40px;width:40px;float:left'><img style='margin-bottom: 0px; padding-bottom: 0px;' src='".$mes['picture']."' width='35' height='35'/><br>"."<a class='mes_name' href='".$image_link."'>";
		
		//Name length
		if (strlen($from_name) <= 11) 
		{
			$message = $message.$from_name."</a></div>";
		} 
		else 
		{
			$message = $message.substr($from_name, 0, 9)."..</a></div>";
		}
		
		//Is read
		if ($mes['is_read'] == 0)
		{
			$message .= "<a href='".$message_link."&request=true'style='font-weight: bold; color: black;'>";
		}
		else
		{
			$message .= "<a href='".$message_link."&request=true'style='font-weight: normal; color: black;'>";
		}
		
		//Title of message 
		if ($mes['subject'] == "") 
		{
			$message .= "[untitled]";
		} 
		else 
		{
			$message .= $mes['subject'];
		}
		
		//Printing out body.
		if (strlen($mes['body']) <= 80) 
		{
			$message = $message."</a><br>".$mes['body']."</li>";
		} 
		else 
		{
			$message = $message."</a><br>".substr($mes['body'],0,80)."......</li>";
		}
	}
	return($message);
}
?>