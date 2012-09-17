<?php
session_start();
/**************************
NJ:
Helper functions for searching.
Includes the following:

retrieveAllColleges
retrieveAllMajors
showSavedSearches
showQueryResults

**************************/


/**
Retrieves the list of colleges in SELECT format for searching.
DB query
**/
function retrieveAllColleges()
{
	$query = "SELECT * FROM education_general";
	$result = mysql_query($query);
	$college_list = "";
	while ($college = mysql_fetch_assoc($result)) 
	{
		$college_list = $college_list."<option value='".$college['college']."'>".$college['college']."</option>";
	}
	return($college_list);
}

/**
Retrieves the list of majors in SELECT format for searching.
DB query
**/
function retrieveAllMajors()
{
	$query = "SELECT * FROM majors";
	$result = mysql_query($query);
	$major_list = "";
	while ($major = mysql_fetch_assoc($result)) 
	{
		$major_list = $major_list."<option value='".$major['major']."'>".$major['major']."</option>";
	}
	return($major_list);
}

function showSavedSearches($jid)
{
	if($_SESSION['business_mode'])
	{
		$query = sprintf("SELECT * FROM c_top_%d c, users u, education_data ed WHERE jid='%d' AND u.idnum=ed.idnum AND c.idnum=u.idnum", $_SESSION['company']['b_id'], $jid);
	}
	else if ($jid == 0)
	{
		$query = sprintf("SELECT * FROM friends f, users u, education_data ed WHERE to_id=u.idnum AND u.idnum=ed.idnum AND from_id=%d ORDER BY f.groups", $_SESSION['idnum']);
	}
	return($query);
}

function showQueryResults($query, $jid, $is_friends = false)
{
	/**define('__ROOT__', dirname(__FILE__)); 
	require_once('database.php');
	require_once('template.php');
	$connect = connectToDatabase();
	$result = mysql_query($query);
	mysql_close();**/
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
			$message = $message."<span style='float: right;'><input type='checkbox' name='select[]' class='candidate_checkbox' onclick='select_one()' value='".$mes['idnum']."'/></span>";
			if ($jid > 0)
			{
				$message = $message."<a href='generalfunctions/message_template.php?top=true&to_id=".$mes['idnum']."&jid=".$jid."'><img style='float:right; margin-right:4px' src='site_im/add_user_to.jpg' width='30' height='30' /></a>";
			}
			$message = $message."<a href='cprofile.php?idnum=".$mes['idnum']."'><img style='float:right; margin-right:4px' src='site_im/resumeicon.jpg' width='30' height='30' /></a>";
			$message = $message."<a href='generalfunctions/message_template.php?messagetype=blank&single=true&to_id=".$mes['idnum']."'><img style='float:right; margin-right:4px' src='site_im/messageicon.jpg' width='30' height='30' /></a>";
			$message = $message."<br>".$mes['field']." at ".$mes['college']."</li>"; //adds name.
		}
        $message = $message."\n<li><span style='float: right;'>Select all<input type='checkbox' id='selectall' onclick='select_all();'/></span></li>";
        $message = $message."<div align='right'><input type='submit' name='offer' value='Send Supplement Material'/><input type='submit' name='offer' value='Schedule Phone Interview'/><input type='submit' name='offer' value='Schedule Job Interview'/><input type='submit' name='offer' value='Offer Job'/></div></form>";
	}
	
	return($message);
}

function showFriendsList($query, $jid) {
	$result = mysql_query($query);
	if (!$result)
	{
		$message = $query." ".mysql_error();
	}
    else if (mysql_num_rows($result) == 0)
    {
        $message = "<strong>No results found.  Do you want to import friends from Facebook?</strong>";
    }
	else
	{
        $lastgroup = "none";
        $message = $message."<ul id='messages'><form action='friend.php' method='POST'>";
        $first_test = false;
        while ($mes = mysql_fetch_assoc($result))
        {
            if ($mes['groups'] != $lastgroup && $lastgroup != "none" && $first_test)
            {
                $message .= "</fieldset><fieldset><legend><span class='job_title_font'>".($mes['groups']?$mes['groups']:"ungrouped")."</span></legend><hr />";
            }
            else if (!$first_test)
            {
                $message .= "<fieldset><legend><span class='job_title_font'>".($mes['groups']?$mes['groups']:"ungrouped")."</span></legend><hr />";
                $first_test = true;
            }
            $lastgroup = $mes['groups'];
            if (is_null($mes['picture']))
            {
                $mes['picture'] = "images/default.png";
            }
            $message = $message."<li><img style='float:left; margin-right:2px' src='".$mes['picture']."' width='35' height='35'/><a href='cprofile.php?idnum=".$mes['idnum']."'>".$mes['first_name']." ".$mes['last_name']."</a>";
            $message = $message."<span style='float: right;'><input type='checkbox' name='select[]' class='candidate_checkbox' onclick='select_one();' value='".$mes['idnum'].".".$mes['jid']."'/></span>";
            $message = $message."<a href='generalfunctions/message_template.php?messagetype=blank&single=true&to_id=".$mes['idnum']."'><img style='float:right; margin-right:4px' src='site_im/messageicon.jpg' width='30' height='30' /></a>";
            $message = $message."<br>".substr($mes['field'],0,30)." at ".$mes['college']."</li>";
        }
        $message = $message."\n<li><span style='float: right;'>Select all<input type='checkbox' id='selectall' onclick='select_all();'/></span></li></form></ul>";
    }
    return $message;
}

?>
