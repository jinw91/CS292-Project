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
		$message .= "</a></li><li><a href='careers.php'>jobs</a></li>
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
		$message .= "</a></li><li><a href='careers.php'>jobs</a></li>
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
