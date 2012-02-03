<?php
session_start();
/**
Education profile.php
**/
function education($id)
{
	$query = sprintf("SELECT * FROM education_data WHERE idnum=%d", $id);
	$result = mysql_query($query);
	if (!$result)
	{
		$eduhtml = "<li><strong>Error retrieving education.</strong></li>";
		return($eduhtml);
	}
	$eduhtml = "";
	$liststart = "<li><strong>";
	$listend = "</strong>";
	$degreestart = "<br /><em>";
	while ($education =  mysql_fetch_assoc($result))
	{
		$eduhtml = $eduhtml.$liststart.$education['college'].$listend;
		$eduhtml = $eduhtml.$degreestart.$education['title']." in ".$education['major']."</em></li>";
	}
	//$eduhtml = $eduhtml."</ul>";
	if ($eduhtml == "")
	{
		$eduhtml = "<li>Education history not available.</li>";
		return($eduhtml);
	}
	return($eduhtml);
}

/**
Work Experience.
**/
function work($id)
{
	$query = sprintf("SELECT * FROM work_data WHERE idnum=%d ORDER BY company_end DESC LIMIT 4", $id);
	$result = mysql_query($query);
	if (!$result)
	{
		$eduhtml = "<li><strong>Error retrieving work.</strong></li>";
		return($eduhtml);
	}
	$eduhtml = "";
	$liststart = "<li><strong>";
	$listend = "</strong>";
	$degreestart = "<br /><em>";
	while ($education =  mysql_fetch_assoc($result))
	{
		$eduhtml = $eduhtml.$liststart.$education['company_name'].$listend;
		$eduhtml = $eduhtml."";
		$eduhtml = $eduhtml.$degreestart.$education['title']."</em></li>";
	}
	//$eduhtml = $eduhtml."</ul>";
	if ($eduhtml == "")
	{
		$eduhtml = "<li>Work experience not available.</li>";
	}
	return($eduhtml);
}

/**
Work Experience of own.
**/
function work_own($id)
{
	$query = sprintf("SELECT * FROM work_data WHERE idnum=%d ORDER BY company_end DESC LIMIT 4", $id);
	$result = mysql_query($query);
	if (!$result)
	{
		$eduhtml = "<li><strong>Error retrieving work.</strong></li>";
		return($eduhtml);
	}
	$eduhtml = "";
	$liststart = "<li><strong>";
	$listend = "</strong>";
	$degreestart = "<br /><em>";
	while ($education =  mysql_fetch_assoc($result))
	{
		$eduhtml = $eduhtml.$liststart.$education['company_name'].$listend;
		$eduhtml = $eduhtml.$degreestart.$education['title']." </em>";
		$eduhtml = $eduhtml."<div id='edit_profile'><a href='work.php?w_id=".$education['w_id']."'>Edit</a></div></li>";
	}
	//$eduhtml = $eduhtml."</ul>";
	if ($eduhtml == "")
	{
		$eduhtml = "<li>Work experience not available. <div id='edit_profile'><a href='work.php'>Add</a></div></li>";
	}
	return($eduhtml);
}

/**
Skills
**/
function skills($id)
{
	$query = sprintf("SELECT * FROM skill_data WHERE idnum=%d", $id);
	$result = mysql_query($query);
	if (!$result)
	{
		$eduhtml = "<li><strong>Skills and Extracurriculars not available.</strong></li>";
		return($eduhtml);
	}
	$eduhtml = "";
	$liststart = "<li><strong>";
	$listend = "</strong>";
	$degreestart = "<br /><em>";
	while ($education =  mysql_fetch_assoc($result))
	{
		$eduhtml = $eduhtml.$liststart.$education['company_name'].$listend;
		$eduhtml = $eduhtml.$degreestart.$education['title']."</em></li>";
	}
	//$eduhtml = $eduhtml."</ul>";
	return($eduhtml);
}

function extracurriculars($id)
{
	// self.
	$extra = "";
	$liststart = "<li>";
	$listend = "</li>";
	if ($id = $_SESSION['idnum']) 
	{
		
	}
}
?>