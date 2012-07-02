<?php
session_start();
if (!isset($_SESSION['idnum']))
{
	header("Location: index.php");
}
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');

{
	if (isset($_GET['eid']))
	{
		$idnum = $_GET['eid'];
	}
	else
	{
		$idnum = 1;//$_SESSION['idnum'];
	}
	connectToDatabase();
	$query = sprintf("SELECT * FROM education_general WHERE eid=%d", $idnum);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();	
	}
	
	//TODO:
	$v_users = mysql_fetch_assoc($result);
	
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
	
	/**
	if (isset($_GET['follow']) && $idnum != $_SESSION['idnum'])
	{
			$query = sprintf("INSERT INTO subscribed (from_id, to_id, subscribed) VALUES ('%d', '%d', NOW())", $_SESSION['idnum'], $idnum);
			$result = mysql_query($query); 
			$message = "<script type='text/javascript'>alert('You are now following $p_name');</script>";
	}**/
	mysql_close();
	
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
			<div class="text1"><a href="<?=$v_users['picture']?>" data-gal="prettyPhoto[gallery]" class="lightbox-image"><img src="<?=$v_users['picture']?>" alt=""></a></div>
		</div>
	</div>
</div>
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
        	<div class="grid_5">
                <br>
                  <ul id="prof_cat">
                  <li><a id='about' href='#'>News</a></li>
                  </ul>
                  <fieldset>
                  <br>
                  <ul id="news">
				  <?=$news?>
                  </ul>
                  <br>
                </fieldset>
            </div>
            <div class="grid_7">
            	<script>
				function clear()
				{
					var tag = document.getElementById("start");
					tag.innerHTML = "";
				}
				
				function about()
				{
					clear();
					var tag = document.getElementById("start");
					tag.innerHTML += "<?=$about?>";
				}
				function students()
				{
					clear();
					var tag = document.getElementById("start");
					tag.innerHTML += "<?=$look?>";
				}
				function partners()
				{
					clear();
					var tag = document.getElementById("start");
					tag.innerHTML += "<?=$postings?>";
				}
				</script>
                  <br>
                  <ul id="prof_cat">
                  <li><a id='about' href='javascript:about();'>About</a></li>
                  <li><a id='postings' href='javascript:postings();'>Students</a></li>
				  <li><a id='looking' href='javascript:look();'>Partners</a></li>
                  </ul>
                  <fieldset>
                  <br>
                  <ul id="start"><?
				  if (isset($v_bid))
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