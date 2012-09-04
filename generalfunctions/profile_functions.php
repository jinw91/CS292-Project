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
		$html .= "<ul style='list-style-type: disc; list-style-position: inside;'>";
		$html .= "<br />";
		if (trim($work['achievement']) != "")
		{
			
			$bits = explode("\n", $work['achievement']);
			foreach($bits as $bit)
			{
				if (trim($bit) != "")
				{
			  		$html .= "<li>".$bit."</li>";
				}
			}
		}
		$html .= "</ul></li>";
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
		$html = $html."<li><strong style='position: absolute;'>".$work['company_name']."</strong><span id='edit_info'><a href='work.php?w_id=".$work['w_id']."'><button>Edit</button></a></span>";
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
		$html .= "<ul style='list-style-type: disc; list-style-position: inside;'>";
		$html .= "<br />";
		if (trim($work['achievement']) != "")
		{
			
			$bits = explode("\n", $work['achievement']);
			foreach($bits as $bit)
			{
				if (trim($bit) != "")
				{
			  		$html .= "<li>".$bit."</li>";
				}
			}
		}
		$html .= "</ul></li>";
		//$html .= "</ul><span id='edit_profile'><a href='work.php?w_id=".$work['w_id']."'>Edit</a></span></li>"; //achievement
	}
	//$eduhtml = $eduhtml."</ul>";
	if ($html == "")
	{
		$html = "<li>Work experience not available.<span id='edit_profile'><a href='work.php'>Add</a></span></li>";
	}
	return($html);
}

/**
Extracurricular Experience.
**/
function extra($id)
{
	$query = sprintf("SELECT * FROM leadership_data WHERE idnum=%d ORDER BY end DESC LIMIT 4", $id);
	$result = mysql_query($query);
	if (!$result)
	{
		$eduhtml = "<li><strong>Error retrieving extra.</strong></li>";
		return($eduhtml);
	}
	$html = "";
	while ($work =  mysql_fetch_assoc($result))
	{
		$html = $html."<li><strong style='position: absolute;'>".$work['organization']."</strong>";
		$start = date("F Y", strtotime($work['start']));
		if ($work['present'] > 0)
		{
			$end = "Present";
		}
		else
		{
			$end = date("F Y", strtotime($work['end']));
		}
		
		if (trim($work['title']) != "")
		{
			$html = $html."<br /><em style='position: absolute;'>".$work['title']."</em>";
			$html = $html."<span style='float: right; position: relative;'>".$start." - ".$end."</span>";
		$html .= "<ul style='list-style-type: disc; list-style-position: inside;'><br />";
		}
		else
		{
			$html = $html."<span style='float: right; position: relative;'>".$start." - ".$end."</span><br />";
		$html .= "<ul style='list-style-type: disc; list-style-position: inside;'>";
		}
		if (trim($work['achievement']) != "")
		{
			
			$bits = explode("\n", $work['achievement']);
			foreach($bits as $bit)
			{
				if (trim($bit) != "")
				{
			  		$html .= "<li>".$bit."</li>";
				}
			}
		}
		$html .= "</ul></li>";
	}
	//$eduhtml = $eduhtml."</ul>";
	if ($html == "")
	{
		$html = "<li>Extracurricular not available.</li>";
	}
	return($html);
}

/**
Extracurricular Experience of own.
**/
function extra_own($id)
{
	$query = sprintf("SELECT * FROM leadership_data WHERE idnum=%d ORDER BY end DESC LIMIT 4", $id);
	$result = mysql_query($query);
	if (!$result)
	{
		$eduhtml = "<li><strong>Error retrieving work.</strong></li>";
		return($eduhtml);
	}
	$html = "";
	while ($work =  mysql_fetch_assoc($result))
	{
		$html = $html."<li><strong style='position: absolute;'>".$work['organization']."</strong><span id='edit_info'><a href='extracurricular.php?l_id=".$work['l_id']."'><button>Edit</button></a></span>";
		$start = date("F Y", strtotime($work['start']));
		if ($work['present'] > 0)
		{
			$end = "Present";
		}
		else
		{
			$end = date("F Y", strtotime($work['end']));
		}
		
		if (trim($work['title']) != "")
		{
			$html = $html."<br /><em style='position: absolute;'>".$work['title']."</em>";
			$html = $html."<span style='float: right; position: relative;'>".$start." - ".$end."</span>";
		$html .= "<ul style='list-style-type: disc; list-style-position: inside;'><br />";
		}
		else
		{
			$html = $html."<span style='float: right; position: relative;'>".$start." - ".$end."</span><br />";
		$html .= "<ul style='list-style-type: disc; list-style-position: inside;'>";
		}
		if (trim($work['achievement']) != "")
		{
			
			$bits = explode("\n", $work['achievement']);
			foreach($bits as $bit)
			{
			  	if (trim($bit) != "")
				{
			  		$html .= "<li>".$bit."</li>";
				}
			}
		}
		$html .= "</ul></li>"; //achievement
	}
	//$eduhtml = $eduhtml."</ul>";
	if ($html == "")
	{
		$html = "<li>Extracurricular not available.<span id='edit_profile'><a href='extracurricular.php'>Add</a></span></li>";
	}
	return($html);
}

/**
Skills
**/
function skills($id)
{
	$query = sprintf("SELECT * FROM users WHERE idnum=%d", $id);
	$result = mysql_query($query);
	if (!$result)
	{
		return(mysql_error());
	}
	$html = "<span id='skills'>";
	$degreestart = "<br /><em>";
	$user = mysql_fetch_assoc($result);
	$skills = $user['skills'];
	if (strpos($skills, ",") > 0)
	{
		$ski = substr($skills, 0, strpos($skills, ","));
		$skills = substr(strchr($skills, ","), 1);
		$html = $html."<a>".$ski."</a>";
	}
	while (strpos($skills, ",") > 0)
	{
		$ski = substr($skills, 0, strpos($skills, ","));
		$skills = substr(strchr($skills, ","), 1);
		$html = $html.",<a>".$ski."</a>";
	}
	//final skill
	if ($skills == $user['skills'])
	{
		$html .= "<a>".$skills."</a>";
	}
	else if (trim($skills) != "")
	{
		$html = $html.", and <a>".$skills."</a>";
	}
	$html .= "</span>";
	//$eduhtml = $eduhtml."</ul>";
	return($html);
}

function skills_own($id)
{
	$query = sprintf("SELECT * FROM users WHERE idnum=%d", $id);
	$result = mysql_query($query);
	if (!$result)
	{
		return(mysql_error());
	}
	$html = "<span id='skills'>";
	$degreestart = "<br /><em>";
	$user = mysql_fetch_assoc($result);
	$skills = $user['skills'];
	if (strpos($skills, ",") > 0)
	{
		$ski = substr($skills, 0, strpos($skills, ","));
		$skills = substr(strchr($skills, ","), 1);
		$html = $html."<a>".$ski."</a>";
	}
	while (strpos($skills, ",") > 0)
	{
		$ski = substr($skills, 0, strpos($skills, ","));
		$skills = substr(strchr($skills, ","), 1);
		$html = $html.",<a>".$ski."</a>";
	}
	//final skill
	if ($skills == $user['skills'])
	{
		$html .= "<a>".$skills."</a>";
	}
	else if (trim($skills) != "")
	{
		$html = $html.", and <a>".$skills."</a>";
	}
	$html .= "</span> <span id='edit_profile'><a href='basic_info.php?'><button>Edit</button></a></span>";
	//$eduhtml = $eduhtml."</ul>";
	return($html);
}

/**
Company view
**/
function ceducation($id)
{
	$query = sprintf("SELECT * FROM education_data e, education_general g WHERE idnum=%d AND e.college=g.college", $id);
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
			$year = "";
		}
		$eduhtml = $eduhtml."<li><strong style='position: absolute;'>".$education['college']."</strong>"."<span style='float: right; position: relative; font-weight: bold;'>".$education['city'].", ".$education['state']."</span>"; //location not added yet.
		$eduhtml = $eduhtml."<br /><em style='position: absolute;'>".$education['title']." in ".$education['major']."</em>";
		$eduhtml = $eduhtml."<span style='float: right; position: relative;'>".$year."</span><br/>"; //on right.
		if ($education['gpa'] >= 3.0)
		{
			$eduhtml = $eduhtml."<ul style='list-style-type: disc; list-style-position: inside;'><li><strong>Cumulative GPA: </strong>".$education['gpa']."/4.0</li>";
		}
		$eduhtml = $eduhtml; // Add in major GPA later.
		if (trim($education['honors']) != "")
		{
			$eduhtml = $eduhtml."<li><strong>Honors: </strong>".$education['honors']."</li></ul></li>";
		}
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
	$query = sprintf("SELECT * FROM education_data e, education_general g WHERE idnum=%d AND e.college=g.college", $id);
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
			$year = "";
		}
		$eduhtml = $eduhtml."<li><strong style='position: absolute;'>".$education['college']."</strong>"."<span style='float: right; position: relative; font-weight: bold;'>".$education['city'].", ".$education['state']."</span>"; //location not added yet.
		$eduhtml = $eduhtml."<br /><em style='position: absolute;'>".$education['title']." in ".$education['major']."</em>";
		$eduhtml = $eduhtml."<span style='float: right; position: relative;'>".$year."</span><br/>"; //on right.
		if ($education['gpa'] >= 3.0)
		{
			$eduhtml = $eduhtml."<ul style='list-style-type: disc; list-style-position: inside;'><li><strong>Cumulative GPA: </strong>".$education['gpa']."/4.0</li>";
		}
		$eduhtml = $eduhtml; // Add in major GPA later.
		if (trim($education['honors']) != "")
		{
			$eduhtml = $eduhtml."<li><strong>Honors: </strong>".$education['honors']."</li></ul><span id='edit_profile'><a href='education.php?'><button>Edit</button></a></span></li>";
		}
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