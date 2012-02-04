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
					<li class='current'><a href='index.html'>home</a></li>
					<li><a href='index-1.html'>profile<span class='arrow'></span></a><ul>
							<li><a href='basicinfo.php'>Edit Basic Information</a></li>
							<li><a href='education.php'>Edit Education</a></li>
							<li><a href='work.php'>Edit Work</a></li>
						</ul>
					</li>
					<li><a href='index-2.html'>inbox";
	if ($mes > 0)
	{
		$message = $message."(".$mes.")";
	}
	
		$message .= "</a></li>
					<li><a href='index-3.html'>careers</a></li>
					<li><a href='index-4.html'>&darr;</a><span class='arrow'></span></a><ul>
							<li><a href='basicinfo.php'>Privacy Settings</a></li>
							<li><a href='education.php'>Contact Us</a></li>
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