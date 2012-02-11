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
	$html = "";
	while ($work =  mysql_fetch_assoc($result))
	{
		$html = $html."<li><strong style='position: absolute;'>".$work['company_name']."</strong>";
		if ($work['city']=="" || $work['state']=="")
		{
			$html .= "<span style='float: right; position: relative; font-weight: bold;'></span>";
		}
		else
		{
			$html .= "<span style='float: right; position: relative; font-weight: bold;'>".$work['city'].", ".$work['state']."</span>";
		}
		$html = $html."<br /><em style='position: absolute;'>".$work['title']."</em>";
		$start = date("F Y", strtotime($work['company_start']));
		if ($work['present'] > 0)
		{
			$end = "Present";
		}
		else
		{
			$end = date("F Y", strtotime($work['company_end']));
		}
		$html = $html."<span style='float: right; position: relative;'>".$start." - ".$end."</span>";
		$html .= "<br />".$work['achievement']."</li><br />"; //achievement
	}
	//$eduhtml = $eduhtml."</ul>";
	if ($html == "")
	{
		$html = "<li>Work experience not available.</li>";
	}
	return($html);
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
	$html = "";
	while ($work =  mysql_fetch_assoc($result))
	{
		$html = $html."<li><strong style='position: absolute;'>".$work['company_name']."</strong>";
		if ($work['city']=="" || $work['state']=="")
		{
			$html .= "<span style='float: right; position: relative; font-weight: bold;'></span>";
		}
		else
		{
			$html .= "<span style='float: right; position: relative; font-weight: bold;'>".$work['city'].", ".$work['state']."</span>";
		}
		$html = $html."<br /><em style='position: absolute;'>".$work['title']."</em>";
		$start = date("F Y", strtotime($work['company_start']));
		if ($work['present'] > 0)
		{
			$end = "Present";
		}
		else
		{
			$end = date("F Y", strtotime($work['company_end']));
		}
		$html = $html."<span style='float: right; position: relative;'>".$start." - ".$end."</span>";
		$html .= "<br />".$work['achievement']."<span id='edit_profile'><a href='work.php?w_id=".$work['w_id']."'>Edit</a></span></li><br />"; //achievement
	}
	//$eduhtml = $eduhtml."</ul>";
	if ($html == "")
	{
		$html = "<li>Work experience not available.<span id='edit_profile'><a href='work.php'>Add</a></span></li>";
	}
	return($html);
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

/**
Company view
**/
function ceducation($id)
{
	$query = sprintf("SELECT * FROM education_data WHERE idnum=%d", $id);
	$result = mysql_query($query);
	if (!$result)
	{
		$eduhtml = "";
		return($eduhtml);
	}
	$eduhtml = "";
	while ($education =  mysql_fetch_assoc($result))
	{
		$temp = substr($education['college_end'], 0, 4);
		$tmpmonth = intval(substr($education['college_end'], 5, 2));
		if ($temp != '0000' && $temp >= date("Y"))
		{
			if ($tmpmonth <= 6) 
				$year =  "Expected: Spring ".$temp;
			else if ($tmpmonth < 8)
				$year = "Expected: Summer ".$temp;
			else
				$year = "Expected: Fall ".$temp;
		}
		else
		{
			$year = $temp;
		}
		$eduhtml = $eduhtml."<li><strong style='position: absolute;'>".$education['college']."</strong>"."<span style='float: right; position: relative; font-weight: bold;'>Nashville, TN".$location."</span>"; //location not added yet.
		$eduhtml = $eduhtml."<br /><em style='position: absolute;'>".$education['title']." in ".$education['major']."</em>";
		$eduhtml = $eduhtml."<span style='float: right; position: relative;'>".$year."</span><br/>"; //on right.
		$eduhtml = $eduhtml."<ul><li><strong>Cumulative GPA: </strong>".$education['gpa']."/4.0</li>";
		$eduhtml = $eduhtml; // Add in major GPA later.
		$eduhtml = $eduhtml."<li><strong>Honors: </strong>".$education['honors']."</li></ul></li>";
	}
	//$eduhtml = $eduhtml."</ul>";
	if ($eduhtml == "")
	{
		$eduhtml = "<li>Education history not available.</li>";
		return($eduhtml);
	}
	return($eduhtml);
}

//Editable company view.
function ceducation_own($id)
{
	$query = sprintf("SELECT * FROM education_data WHERE idnum=%d", $id);
	$result = mysql_query($query);
	if (!$result)
	{
		$eduhtml = "";
		return($eduhtml);
	}
	$eduhtml = "";
	while ($education =  mysql_fetch_assoc($result))
	{
		$temp = substr($education['college_end'], 0, 4);
		$tmpmonth = intval(substr($education['college_end'], 5, 2));
		if ($temp != '0000' && $temp >= date("Y"))
		{
			if ($tmpmonth <= 6) 
				$year =  "Expected: Spring ".$temp;
			else if ($tmpmonth < 8)
				$year = "Expected: Summer ".$temp;
			else
				$year = "Expected: Fall ".$temp;
		}
		else
		{
			$year = $temp;
		}
		$eduhtml = $eduhtml."<li><strong style='position: absolute;'>".$education['college']."</strong>"."<span style='float: right; position: relative; font-weight: bold;'>Nashville, TN".$location."</span>"; //location not added yet.
		$eduhtml = $eduhtml."<br /><em style='position: absolute;'>".$education['title']." in ".$education['major']."</em>";
		$eduhtml = $eduhtml."<span style='float: right; position: relative;'>".$year."</span><br/>"; //on right.
		$eduhtml = $eduhtml."<ul><li><strong>Cumulative GPA: </strong>".$education['gpa']."/4.0</li>";
		$eduhtml = $eduhtml; // Add in major GPA later.
		$eduhtml = $eduhtml."<li><strong>Honors: </strong>".$education['honors']."</li></ul><span id='edit_profile'><a href='education.php?'>Edit</a></span></li>";
	}
	//$eduhtml = $eduhtml."</ul>";
	if ($eduhtml == "")
	{
		$eduhtml = "<li>Education history not available.</li>";
		return($eduhtml);
	}
	return($eduhtml);
}
?>