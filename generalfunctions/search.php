<?php
session_start();
function showQueryResults($query)
{
	define('__ROOT__', dirname(__FILE__)); 
	require_once('database.php');
	require_once('template.php');
	$connect = connectToDatabase();
	$result = mysql_query($query);
	if (!$result)
	{
		$message = $query." ".mysql_error();
	}
	else if (mysql_num_rows($result) == 0) { $message = "<strong>No results found.</strong>"; }
	else
	{
		$message = "<form action='search.php' method='POST'><fieldset><legend><span class='job_title_font'>Matched Candidates</span></legend><hr /></fieldset>";
		while ($mes =  mysql_fetch_assoc($result))
		{
			if (is_null($mes['picture']))
			{
				$mes['picture'] = "images/default.png";
			}
			$message = $message."<li><img style='float:left; margin-right:2px' src='".$mes['picture']."' width='35' height='35'/><a href='cprofile.php?idnum=".$mes['idnum']."' target='_BLANK'>".$mes['first_name']." ".$mes['last_name']."</a>";
			$message = $message."<span style='float: right;'><input type='checkbox' name='select[]' value='".$mes['idnum']."'/></span>";
			$message = $message."<a href='generalfunctions/message_template.php?messagetype=interview&single=true&to_id=".$mes['idnum']."'><img style='float:right; margin-right:4px' src='site_im/add_user_to.jpg' width='30' height='30' /></a>";
			$message = $message."<a href='generalfunctions/message_template.php?messagetype=phone&single=true&to_id=".$mes['idnum']."'><img style='float:right; margin-right:4px' src='site_im/resume_icon.jpg' width='30' height='30' /></a>";
			$message = $message."<a href='generalfunctions/message_template.php?messagetype=blank&single=true&to_id=".$mes['idnum']."'><img style='float:right; margin-right:4px' src='site_im/messageicon.jpg' width='30' height='30' /></a>";
			$message = $message."<br>".$mes['field']." at ".$mes['college']."</li>"; //adds name.
		}
		$message = $message."<div align='right'><input type='submit' name='offer' value='Send Supplement Material'/><input type='submit' name='offer' value='Schedule Phone Interview'/><input type='submit' name='offer' value='Schedule Job Interview'/><input type='submit' name='offer' value='Offer Job'/></div></form>";
	}
	
	return($message);
}

?>