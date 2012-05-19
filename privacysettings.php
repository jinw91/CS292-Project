<?php
session_start();
if (!isset($_SESSION['idnum']))
{
	header("Location: index.php");
}
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
require_once(__ROOT__.'/generalfunctions/profile_functions.php');
require_once(__ROOT__.'/generalfunctions/business_profile.php');


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
</head>
<body>
<!-- header -->
<header>
	<div class="top-header">
		<div class="container_12">
			<div class="grid_12">
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
                    <?=$error?>
                    <div class="message">
    				<form action='basic_info.php' method='post'>
              		<?=$error?><?=$message?><br>
              		<ul id='education'>
                	<li><label class="field">Send Message Notifications via: </label><select name="emailoption" value="<?=$user_info['emailoption']?>">
                    <option>Email & Text</option>
                    <option>Direct Emailing</option>
                    <option>Phone Message</option>
                    <option>No notifications</option>
                    </select></li>
                	<li id="school"></li>
                	<li><label class='field'>Hide GPA: </label><select name='gpa' ><option>No</option><option>Yes</option></select>
					<label class='subscript'>GPA is currently hidden for those who are below the school average.</label></li><br>
            		<!--<li><label class='field'>Technical Skills: </label><textarea name='skills' rows='2'><?=$user_info['skills']?></textarea>
            		<label class='subscript'>Example: Microsoft Excel, HTML</label></li>-->
            		<br>
            		<li>
            		<span style='margin-left: 300px;'><input type='submit' name='submit' value='Save' />
            		<input type='submit' name='skip' value='Skip' /></span></li>
            		</ul>
        			</form>
					<?=$message?>
                    </div>
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