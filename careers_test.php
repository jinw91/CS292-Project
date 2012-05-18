<?php
session_start();
if (!isset($_SESSION['idnum']))
{
	header("Location: home.php");
}
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
require_once(__ROOT__.'/generalfunctions/career.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	$error = "failed to connect";	
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Professional Archives</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/skeleton.css">
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/script.js"></script>
<script src="js/FF-cash.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/slides.min.jquery.js"></script>
<script>
$(document).ready();
$(function(){
	$('#slides').slides({
	effect: 'fade',
	fadeSpeed:700,
	preload: false,
	play: 5000,
	pause: 5000,
	hoverPause: true,
	crossfade: true,
	bigTarget: true
	});
	$('.lightbox-image').prettyPhoto({theme:'facebook',autoplay_slideshow:false,social_tools:false,animation_speed:'normal'}).append('<span></span>');
	if($.browser.msie&&parseInt($.browser.version,10)<=8){$('.lightbox-image').find('span').css({opacity:.5})};
	$('.tooltips li a').find('strong').append('<span></span>').each(
	 	function(){
		var src=new Array()
		src=$(this).find('>img').attr('src').split('.')
		src=src[0]+'-hover.'+src[1]
		$(this).find('>span').css({background:'url('+src+')'})
	 });
});

function clicked(tag)
{
	alert("reached here");
	 tag.src('site_im/minussign.jpg');
 	 $(tag).parent().next().slideToggle();
}
</script>
</head>
<body>
<!-- header -->
<header>
	<div class="top-header">
		<div class="container_12">
			<div class="grid_12">
				<div class="fright">
					<ul class="top-menu">
						<li></li>
						<li></li>
					</ul>
				</div>
				<div class="fleft"></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="header-line"></div>
	<div class="container_12">
		<div class="grid_12">
			<h1 class="fleft"><a href="index.php"><img src="site_im/p_a_logo_new.png" alt=""></a></h1>
			
        <?
		define('__ROOT__', dirname(__FILE__)); 
		require_once(__ROOT__.'/generalfunctions/template.php');
		echo navBar($_SESSION['num_mes']);
		?>
		</div>
	</div>
</header>
</div>
<div class="container_12">
</div>
<!-- content -->
<section id="content">  
	<div class="container_12">
    <div class="wrapper border_bottom">
            <div class="grid_11 suffix_2">
                    <fieldset>
                                        <div class="message">
    				<ul id='company_job_entries'><li><span class='job_entry_font'>&nbsp;Internet Engineer in Nashville, TN</span>
			<ul>
			<li><img src='site_im/plussign.jpg' width='18' height='18' onclick='clicked(this);'/><span class='job_entry_font'>Job Description</span><span id='edit_profile'><a href='career.php?jid=1'>Edit</a></span></li>
				<ul><li><b>Major: </b>Computer Science, Computer Engineering</li>
				<li><b>Location: </b>Nashville, TN</li>
				<li><b>Description: </b></li>
				<li><b>Qualifications: </b></li>
				<li><b>Pay: </b>60000 </li></ul>
			<li><img src='site_im/plussign.jpg' width='18' height='18' onclick='clicked(this);'/><span class='job_entry_font'>Candidates</span><span id='edit_profile'><a href='search.php?jid=1'>Start New Search</a></span></li>
				<ul><li><a href='groups.php'><img src='site_im/folderofcands.jpg' width='50'></a><a href='groups.php'><img style='margin-left: 50px;' src='site_im/folderofcands.jpg' width='50'><br><b>Applied</b><b style='margin-left: 50px;'>Saved Candidates</b></a></li></ul>
			</ul><hr></li><li><span class='job_entry_font'>&nbsp;Marketing  in Nashville, TN</span>
			<ul>
			<li><img src='site_im/plussign.jpg' width='18' height='18' onclick='return true;'/><span class='job_entry_font'>Job Description</span><span id='edit_profile'><a href='career.php?jid=2'>Edit</a></span></li>
				<ul><li><b>Major: </b>Economics, HOD</li>
				<li><b>Location: </b>Nashville, TN</li>
				<li><b>Description: </b></li>
				<li><b>Qualifications: </b></li>
				<li><b>Pay: </b>40000 </li></ul>
			<li><img src='site_im/plussign.jpg' width='18' height='18' onclick='return true;'/><span class='job_entry_font'>Candidates</span><span id='edit_profile'><a href='search.php?jid=2'>Start New Search</a></span></li>
				<ul><li><a href='groups.php'><img src='site_im/folderofcands.jpg' width='50'></a><a href='groups.php'><img style='margin-left: 50px;' src='site_im/folderofcands.jpg' width='50'><br><b>Applied</b><b style='margin-left: 50px;'>Saved Candidates</b></a></li></ul>
			</ul><hr></li><li><span class='job_entry_font'>&nbsp;Web Design Intern in Nashville, TN</span>
			<ul>
			<li><img src='site_im/plussign.jpg' width='18' height='18' onclick='return true;'/><span class='job_entry_font'>Job Description</span><span id='edit_profile'><a href='career.php?jid=3'>Edit</a></span></li>
				<ul><li><b>Major: </b>Computer Science, Computer Engineering</li>
				<li><b>Location: </b>Nashville, TN</li>
				<li><b>Description: </b>Web Design Intern</li>
				<li><b>Qualifications: </b></li>
				<li><b>Pay: </b>0 Hourly</li>ul>
			<li><img src='site_im/plussign.jpg' width='18' height='18' onclick='return true;'/><span class='job_entry_font'>Candidates</span><span id='edit_profile'><a href='search.php?jid=3'>Start New Search</a></span></li>
				<ul><li><a href='groups.php'><img src='site_im/folderofcands.jpg' width='50'></a><a href='groups.php'><img style='margin-left: 50px;' src='site_im/folderofcands.jpg' width='50'><br><b>Applied</b><b style='margin-left: 50px;'>Saved Candidates</b></a></li></ul>
			</ul></ul>
                    </fieldset>
            </div>
        </div>        
	</div>
</section>
<!-- footer -->
<?php
	echo footer();
?>
</body>
</html>