<?php
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
	$message = "<div id='main-menu'>
				<ul class='sf-menu fright responsive-menu'>
					<li class='current'><a href='home.php'>home</a></li>
					<li><a href='cprofile.php'>profile<span class='arrow'></span></a><ul>
							<li><a href='basic_info.php'>Edit Basic Information</a></li>
							<li><a href='education.php'>Edit Education</a></li>
							<li><a href='work.php'>Add Work Experience</a></li>
							<li><a href='extracurricular.php'>Add Extracurriculars</a></li>
						</ul>
					</li>
					<li><a href='inbox.php'>inbox";
	if ($mes > 0)
	{
		$message = $message."(".$mes.")";
	}
	
		$message .= "</a></li>
					<li><a href='careers.php'>careers</a></li>
					<li><a href='#'>&darr;</a><span class='arrow'></span></a><ul>
							<li><a href='#'>Privacy Settings</a></li>
							<li><a href='mailto: contact@proarcs.com'>Contact Us</a></li>
							<li><a href='logout.php'>Log Out</a></li>
                            </ul>
				</ul>
			</div>";
		
		return($message);
}

/**
Creates the footer for php.
**/
function footer()
{
	return("<footer>
	<div class='container_12'>
		<div class='wrapper z1'>
		</div>
		<div class='z2'><div class='grid_center'><div class='copyright'>Professional Archives &copy; 2012 <a href='index-5.html'>Privacy Policy</a><br>
        </div></div><div class='clear'></div></div>
	</div>
</footer>");
}

?>