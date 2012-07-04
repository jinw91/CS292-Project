<?php
session_start();

/**
Generate brief information.
**/
function brief_c()
{
	$date = strtotime($v_users['founded']);
	$temp = substr($v_users['founded'], 0, 4);
	$tmpmonth = intval(substr($v_users['founded'], 5, 2));
	if ($temp != '0000' && $tmpmonth != '00')
	{
		echo "Founded in ".date("Y", $date)."<br />";
	}
	if (trim($v_users['city']) != "" && trim($v_users['state'] != ""))
	{
		echo "Headquarters in ".$v_users['city'].", ".$v_users['state'];
	}
}

/**
Generate job postings.
**/
function postings($bid)
{
	$postings = "<ul id='job_entries'>";
	//Need to open and close here.
	$query = sprintf("SELECT * FROM careers WHERE b_id=%d", $bid);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
	while ($job = mysql_fetch_assoc($result))
	{
		if (isset($_SESSION['company'])) {
            $postings = $postings."<li><img src='site_im/plussign.jpg' width='16' height='16' id='slidejob".$job['jid']."' onclick='slideDown(this.id, \\\"job".$job['jid']."\\\");'/>";
            $postings = $postings."<a href='careers.php?jid=".$job['jid']."'>".$job['job_name']." at ".$job['company_name']." in ".$job['city'].", ".$job['state']."</a>";
            $postings = $postings."<div id='edit_profile'><a href='career.php?jid=".$job['jid']."'>Edit</a></div>";
			$postings = $postings."<ul id='job".$job['jid']."' class='message' style='display: none'><li><b>Major: </b>".$job['major']."</li>";
			$postings = $postings."<li><b>Location: </b>".$job['city'].", ".$job['state']."</li>";
            $postings = $postings."<li><b>Description: </b>".$job['job_description']."</li>";
			$postings = $postings."<li><b>Qualifications: </b>".$job['qualifications']."</li>";
			$postings = $postings."<li><b>Pay: </b>".$job['pay']." ".$job['rate']."</li></ul>";
			$postings .= "</li>";
		} else {
			$postings = $postings."<li><a href='careers.php?jid=".$job['jid']."'>".$job['job_name']." at ".$job['company_name']." in ".$job['city'].", ".$job['state']."</a><div id='edit_profile'><a href='careers.php?jid=".$job['jid']."&apply=1'>Apply</a></div>"; //adds name and options.
			$postings .= "</li>";
		}
	}
	$postings .= "</ul>";
	return($postings);
}
?>
