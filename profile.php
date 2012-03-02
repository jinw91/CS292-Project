<?php
session_start();
if (!isset($_SESSION['idnum']))
{
	header("Location: index.php");
}
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
require_once(__ROOT__.'/generalfunctions/profile_functions.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	echo "failed to connect";	
}

if (isset($_GET['b_id']))
{
	$query = sprintf("SELECT * FROM businesses WHERE b_id=%d LIMIT 1", $_GET['b_id']);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
	$v_users = mysql_fetch_assoc($result);
	$p_name = $v_users['company_name'];
	$about = "<li>".$v_users['description']."</li>";
	
	$postings = "<ul id='job_entries'>";
	$query = sprintf("SELECT * FROM careers WHERE b_id=%d", $_GET['b_id']);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
	while ($job = mysql_fetch_assoc($result))
	{
		$postings = $postings."<li><a href='careers.php?jid=".$job['jid']."'>".$job['job_name']." at ".$job['company_name']." in ".$job['city'].", ".$job['state']."</a><div id='edit_profile'><a href='careers.php?jid=".$job['jid']."&apply=1'>Apply</a></div>"; //adds name and options.
		$postings .= "</li>";
	}
	$postings .= "</ul>";
	
	$options = "<li><a id='about' href='javascript:about();'>About</a></li>
                  <li><a id='looking' href='javascript:look();'>Looking For</a></li>
                  <li><a id='postings' href='javascript:postings()'>Job Postings</a></li>";
}

/**
Profile page.
**/
else
{
	if ($_GET['submit'] == "Search" || isset($_GET['idnum']))
	{
		$idnum = $_GET['idnum'];
	}
	else
	{
		$idnum = $_SESSION['idnum'];
	}
	$query = sprintf("SELECT * FROM users WHERE idnum=%d", $idnum);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();	
	}
	
	$v_users = mysql_fetch_assoc($result);
	
	//Checks if visited.
	/*
	$query = sprintf("SELECT * FROM viewed WHERE to_id=%d", $idnum);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();	
	}
	else if (mysql_num_rows($result) == 0)
	{
		$query = sprintf("INSERT INTO viewed (from_id, to_id, viewed) VALUES (%d, %d, NOW())", $_SESSION['idnum'], $idnum);
		$result = mysql_query($query);
	}
	else if (mysql_num_rows($result) > 0)
	{
		$query = sprintf("UPDATE viewed SET viewed=NOW() WHERE to_id=$idnum");
		$result = mysql_query($query);
	}*/
	
	if (is_null($v_users['picture']))
	{
		$v_users['picture'] = "images/default.png";
	}
	$p_name = $v_users['first_name']." ".$v_users['last_name'];
	
	$query = sprintf("SELECT * FROM education_data WHERE idnum=%d", $idnum);
	$result = mysql_query($query);
	$v_education = mysql_fetch_assoc($result);
	$query = sprintf("SELECT * FROM work_data WHERE idnum=%d", $idnum);
	$result = mysql_query($query);
	$v_work = mysql_fetch_assoc($result);
	/**
	Creates the message under experience.
	**/
	if ($idnum == $_SESSION['idnum'])
	{
		$v_work_message = work_own($idnum);
	}
	else
	{
		$v_work_message = work($idnum);
	}
	/**
	Creates the message under skills.
	**/
	if ($idnum == $_SESSION['idnum'])
	{
		$v_skills = skills_own($idnum);
	}
	else
	{
		$v_skills = skills($idnum);
	}
	/**
	Creates the message under extracurriculars.
	**/
	if ($idnum == $_SESSION['idnum'])
	{
		$extracurriculars = extra_own($idnum);
	}
	else
	{
		$extracurriculars = extra($idnum);
	}
	
	if (isset($_GET['follow']) && $idnum != $_SESSION['idnum'])
	{
			$query = sprintf("INSERT INTO subscribed (from_id, to_id, subscribed) VALUES ('%d', '%d', NOW())", $_SESSION['idnum'], $idnum);
			$result = mysql_query($query); 
			$message = "<script type='text/javascript'>alert('You are now following $p_name');</script>";
	}
	
	$options = "<li><a id='experience' href='javascript:experience();'>Experience</a></li>
                  <li><a id='skills' href='javascript:skills();'>Skills</a></li>
                  <li><a id='extra' href='javascript:extra();'>Extracurriculars</a></li>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?=$p_name?></title>
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
<?=$error?>
<div class="container_12">
	<div class="wrapper">
		<div class="grid_12">
			<div class="text1"><?=$p_name?></div>
		</div>
	</div>
</div>
<!-- content -->
<section id="content">  
	<div class="container_12">
    <div class="wrapper border_bottom">
        	<div class="grid_4">
                <div class="box-img"><a href="<?=$v_users['picture']?>" data-gal="prettyPhoto[gallery]" class="lightbox-image"><img src="<?=$v_users['picture']?>" alt=""></a></div>
            </div>
            <div class="grid_6 suffix_2">
                    <fieldset>
                    <div style="font-family: 'Lato', Arial, Helvetica; text-align: center; padding-top: 30px; font-size:18px;">
                    <?php 
					if (isset($_GET['b_id']))
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
					else
					{
						echo $v_education['college']."<br />".$education['major']."<br />";
						if ($v_users['city'] != "" && $v_users['state'] != "")
						{
							echo $v_users['city'].", ".$v_users['state']."<br />";
						}
						$temp = substr($v_education['college_end'], 0, 4);
						$tmpmonth = intval(substr($v_education['college_end'], 5, 2));
						if ($temp != '0000' && isset($temp))
						{
							if ($tmpmonth <= 6) 
								echo "Expected Graduation: Spring ".$temp;
							else if ($tmpmonth < 8)
								echo "Expected Graduation: Summer ".$temp;
							else
								echo "Expected Graduation: Fall ".$temp;
						}
					}
                    ?>
                    <br />
                    </p>
                    <p><?=$v_users['status']?></p>
                    </div>
                    </fieldset>
            </div>
        </div>
		<div class="wrapper">
			<div class="grid_11 padbot2">
				<script>
				function clear()
				{
					var tag = document.getElementById("start");
					tag.innerHTML = "";
				}
				function experience()
				{
					clear();
					var tag = document.getElementById("start");
					tag.innerHTML += "<?=$v_work_message?>";
				}
				function skills()
				{
					clear();
					var tag = document.getElementById("start");
					tag.innerHTML += "<?=$v_skills?>";
				}
				function extra()
				{
					clear();
					var tag = document.getElementById("start");
					tag.innerHTML += "<?=$extracurriculars?>";
				}
				function about()
				{
					clear();
					var tag = document.getElementById("start");
					tag.innerHTML += "<?=$about?>";
				}
				function look()
				{
					clear();
					var tag = document.getElementById("start");
					tag.innerHTML += "<?=$look?>";
				}
				function postings()
				{
					clear();
					var tag = document.getElementById("start");
					tag.innerHTML += "<?=$postings?>";
				}
				</script>
                  <br>
                  <ul id="prof_cat">
                  <?=$options?>
                  <!--<li><a id="resume" href="resumes/<?=$resume?>" onclick="return true;">Resume</a></li>-->
                  </ul>
                  <fieldset>
                  <br>
                  <ul id="start"><?
				  if (isset($_GET['b_id']))
				  {
					  echo $about;
				  }
				  else
				  {
                  	  echo $v_work_message;
				  }
				  ?></ul>
                  <br>
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