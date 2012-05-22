<?php
session_start();
/**
Creates the page for html.
**/
function printFooter()
{
	return("<div align='center' id='footer'>Professional Archives&copy; <a href='mailto: contact@proarcs.com'>Contact Us</a></div>");
}
/**
Creates the navigation bar.
**/
function navBar($mes)
{
	if ($_SESSION['business_mode'])
	{
		$message = "<div id='main-menu'>
				<ul class='sf-menu fright responsive-menu'>
					<li class='current'><a href='home.php'>home</a></li>
					<li><a href='profile.php'>profile<span class='arrow'></span></a><ul>
							<li><a href='business.php'>Edit Business Information</a></li>
						</ul>
					</li>
					<li><a href='inbox.php'>inbox";
		if ($mes > 0)
		{
			$message = $message."(".$mes.")";
		}
		$message .= "</a></li><li><a href='careers.php'>careers</a></li>
					 <li><a href='#'>&darr;</a><span class='arrow'></span></a><ul>
							<li><a href='privacysettings.php'>Privacy Settings</a></li>
							<li><a href='mailto: contact@proarcs.com'>Contact Us</a></li>
							<li><a href='logout.php'>Log Out</a></li>
							</ul>
				</ul>
			</div>";
	}
	else
	{
		$message = "<div id='main-menu'>
				<ul class='sf-menu fright responsive-menu'>
					<li class='current'><a href='home.php'>home</a></li>
					<li><a href='cprofile.php'>profile<span class='arrow'></span></a><ul>
							<li><a href='basic_info.php'>Edit Basic Information</a></li>
							<li><a href='education.php'>Edit Education</a></li>
							<li><a href='work.php'>Add Work Experience</a></li>
							<li><a href='extracurricular.php'>Add Extracurriculars</a></li>
							<li><a href='image.php'>Edit Profile Picture</a></li>
						</ul>
					</li>
					<li><a href='inbox.php'>inbox";
		if ($mes > 0)
		{
			$message = $message."(".$mes.")";
		}
		$message .= "</a></li><li><a href='careers.php'>careers</a></li>
					 <li><a href='#'>&darr;</a><span class='arrow'></span></a><ul>
							<li><a href='privacysettings.php'>Privacy Settings</a></li>
							<li><a href='mailto: contact@proarcs.com'>Contact Us</a></li>
							<li><a href='logout.php'>Log Out</a></li>
							</ul>
				</ul>
			</div>";
	}
	
	return($message);
}

/**
Creates the search bar
**/
function searchNoVar()
{
	return("<ul id='search'>
                <li><label for='name' style='float: left;'>Name: </label>
                <input name='name' size='25'/></li>
                <li><label for='major' style='float: left;'>Major: </label>
                <select id='major' name='major' size='1'>
				<option>All</option>
                <option>Biomedical Engineering</option>
                <option>Civil Engineering</option>
                <option>Computer Science</option>
                <option>Computer Engineering</option>
                <option>Economics</option>
                <option>Human Organizational Development</option>
                <option>Mechanical Engineering</option>
                </select></li>
                <li><label for='college[]' style='float: left;'>School: </label>
                <select id='college' name='college[]' multiple='multiple' size='1'>
                <option value='Vanderbilt University'>Vanderbilt University</option>
                <option value='Duke University'>Duke University</option>
                <option value='Northwestern University'>Northwestern University</option>
                <option value='University of Chicago'>University of Chicago</option>
                <option value='University of Notre Dame'>University of Notre Dame</option>
                <option value='University of North Carolina'>University of North Carolina</option>
                <option value='University of Virginia'>University of Virginia</option>
                <option value='Washington University in St. Louis'>Washington University in St. Louis</option>
                </select>
                </li>
                <li><label for='gpa' style='float: left;'>Minimum GPA: </label>
                <input name='gpa' size='25' /></li>
                <li><label for='work_experience' style='float: left;'>Work Experience: </label>
                <input name='work_experience' size='10' style='width: 150px;' /> Years</li>
                <li><label for='skills' style='float:left;'>Skill(s): </label><input name='skills' size='25' /></li>");
}


/**
Creates the footer for php.
**/
function footer()
{
	if ($_SESSION['business_mode'])
	{
		return("<footer>
	<div class='container_12'>
		<div class='wrapper z1'>
		</div>
		<div class='z2'><div class='grid_center'><div class='copyright'>Professional Archives &copy; 2012 <a href='home.php'>Privacy Policy</a> <a href='home.php?usermode=true'>User Mode</a><br>
        </div></div><div class='clear'></div></div>
	</div>
</footer>");
	}
	else if (!$_SESSION['business_mode'])
	{
		return("<footer>
	<div class='container_12'>
		<div class='wrapper z1'>
		</div>
		<div class='z2'><div class='grid_center'><div class='copyright'>Professional Archives &copy; 2012 <a href='home.php'>Privacy Policy</a> <a href='home.php?usermode=false'>Company Mode</a><br>
        </div></div><div class='clear'></div></div>
	</div>
</footer>");
	}
	return("<footer>
	<div class='container_12'>
		<div class='wrapper z1'>
		</div>
		<div class='z2'><div class='grid_center'><div class='copyright'>Professional Archives &copy; 2012 <a href='privacy.php'>Privacy Policy</a><br>
        </div></div><div class='clear'></div></div>
	</div>
</footer>");
}



?>
