<?php
session_start();
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
require_once(__ROOT__.'/generalfunctions/friends_functions.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	$error = "failed to connect";
}

if ($_POST['submit'] == "Save")
{
	$company_name = $_POST['company_name'];
	$sector = $_POST['sector'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$description = $_POST['description'];
	$idnum = $_SESSION['idnum'];
	//Picture exists
	if (!empty($_FILES['picture']['tmp_name']))
	{
		$path = pathinfo($_FILES['picture']['name']);
		$ext = strtolower($path['extension']);
		$filename = '/business_img/'.$_SESSION['idnum'].".".$ext;
		$fname = __ROOT__.$filename;
		if (!move_uploaded_file($_FILES['picture']['tmp_name'], $fname))
		{
			$error = "failed to move uploaded file.";
		}
		if (isset($_SESSION['company']))
		{
			$query = sprintf("UPDATE businesses SET company_name='$company_name', sector='$sector', description='$description', city='$city', state='$state', picture='$filename' WHERE b_id=%d", $_SESSION['company']['b_id']);
		}
		else
		{
			$query = sprintf("INSERT INTO businesses (company_name, sector, description, city, state, creator, picture) VALUES ('$company_name', '$sector', '$description', '$city', '$state', $idnum, '$filename')");
		}
	}
	else if (isset($_SESSION['company']))
	{
		$query = sprintf("UPDATE businesses SET company_name='$company_name', sector='$sector', description='$description', city='$city', state='$state' WHERE b_id=%d", $_SESSION['company']['b_id']);
	}
	else
	{
		$query = sprintf("INSERT INTO businesses (company_name, sector, description, city, state, creator) VALUES ('$company_name', '$sector', '$description', '$city', '$state', $idnum)");
	}
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
	
	/**
	Updates the company variable
	**/
	$query = sprintf("SELECT * FROM businesses WHERE b_id='%d' AND creator='%d' LIMIT 1", $_SESSION['company']['b_id'], $idnum);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
	$_SESSION['company'] = mysql_fetch_assoc($result);
	$message = "<p id='update_message'>Business updated.</p>";
}

if (isset($_GET['company_name']))
{
    $company_name = $_GET['company_name'];
}

else if (isset($_SESSION['company']))
{
	$filename = $_SESSION['company']['picture'];
	if (trim($filename) != "")
	{
		$picture = "<img align='center' src='$filename' width='265px' />";
	}
	$company_name = $_SESSION['company']['company_name'];
	$sector = $_SESSION['company']['sector'];
	$city = $_SESSION['company']['city'];
	$state = $_SESSION['company']['state'];
	$description = $_SESSION['company']['description'];
    $query = sprintf("SELECT u.first_name, u.last_name, u.idnum FROM users u, friends f WHERE f.from_id=%d AND f.to_id=u.idnum", $_SESSION['idnum']);
	$result = mysql_query($query);
	if (!$result) {
		$error = mysql_error();
	}
	$myjson = mysql2json($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Professional Archives</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/skeleton.css">
<link rel="stylesheet" href="css/test.css">
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/script.js"></script>
<script src="js/FF-cash.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/slides.min.jquery.js"></script>
<script src="js/prototype/prototype.js" type="text/javascript" charset="utf-8"></script>
<script src="js/prototype/scriptaculous.js" type="text/javascript" charset="utf-8"></script>
<script src="js/facebooklist.js" type="text/javascript" charset="utf-8"></script>
<script src="js/anytime.js" type="text/javascript" charset="utf-8"></script>
<script src="simple.js" type="text/javascript" ></script>
<script src="ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript" src="simple.js"></script>
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
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</header>
<!-- content -->
<section id="content">  
	<div class="container_12">
		<div class="wrapper">
		  <div class="grid_10">
			  <h1 id='edit_title'>EDIT BUSINESS:</h1>
              <form id="careers" enctype="multipart/form-data" action="business.php" method="post">
              <?=$error?><?=$message?><br>
              <ul id='education'>
              <li><?=$picture?></li>
              <li><label class="field">Company Name: </label><input type="text" name="company_name" value="<?=$company_name?>" /></li>
              <li><label class="field">Industry: </label><input name="sector" type="text" value="<?=$sector?>" /></li>
    		  <li><label class="field">City: </label><input name="city" size=20 value="<?=$city?>" /> State: <input name="state" size=3 value="<?=$state?>" /></li>
			  <li><label class="field">Description: </label><textarea name="description" id="business_ckeditor" ><?=$description?></textarea></li>
              <li><label class="field">Company Image: </label><input type="file" name="picture"></li>
              <li<?php if(isset($_GET['company_name']))echo " style='display:none'";?>><label class="field">Administrators for Company: </label>
              <ol><li id='facebook-list' class='input-text'><input type='text' name='admins' id='facebook-demo' style='width:450px'/>
              <div id='facebook-auto' style='margin-left:265px; width:455px;'>
              <div class='default'>Separate names with a comma</div>
              <ul class='feed'></ul></div></li></ol></li>
              <li><input type='hidden' name='hidden_admin_id' id='hidden_admin_id' /></li>
    		  <li>
            <span style='margin-left: 300px;'><input type="submit" name="submit" value="Save" onclick="copyid()"/><button onclick="location.href='cprofile.php'; return false;">Cancel</button></span></li>
            </ul>
    		</form>
			</div>
		</div>
	</div>
</section>
<script>
    CKEDITOR.replace('business_ckeditor');
	function copyid() {
		$('#hidden_admin_id').value=$F('facebook-demo');
	}
	document.observe('dom:loaded', function() {
        tlist = new FacebookList('facebook-demo', 'facebook-auto',{ regexSearch: false });
        var myjson = <?=$myjson?>;
        myjson.each(function(t){tlist.autoFeed(t)});
	});
</script>
<!-- footer -->
<?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/template.php');
	echo footer();
?>
</body>
</html>
