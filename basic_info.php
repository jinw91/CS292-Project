<?php
session_start();
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
$connect = connectToDatabase();
if (!$connect) { die("failed to connect"); }

if ($_POST['submit'] == "Save")
{
	$status = $_POST['looking_for'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$field = $_POST['industry'];
	$pay = $_POST['income'];
	$transportation = $_POST['transportation'];
	$relocate = $_POST['relocate'];
	
	//Will be editable on main page later.
	$skills = $_POST['skills'];
	if (isset($_POST['hourly']))
	{
		$hourly = 1;
	}
	else
	{
		$hourly = 0;
	}

	$query = sprintf("UPDATE about SET field='$field', city='$city', state='$state', country='United States', pay='$pay', hourly=$hourly, status='$status', transportation='$transportation', relocate='$relocate' WHERE idnum=%d LIMIT 1", $_SESSION['idnum']);
	$result = mysql_query($query);	
	if (!$result)
	{
		$error = mysql_error();	
	}
	$query = sprintf("UPDATE users SET skills='$skills' WHERE idnum=%d LIMIT 1", $_SESSION['idnum']);
	$message = "<p id=\"update_message\">Basic information updated.</p>";
	$result = mysql_query($query);	
	if (!$result)
	{
		$error = mysql_error();	
	}
	
}

$query = sprintf("SELECT * FROM about WHERE idnum=%d", $_SESSION['idnum']);
$result = mysql_query($query);
$about = mysql_fetch_assoc($result);

//creating default buttons for transportation and relocate.
if ($about['transportation'] == 1)
{
	$transportation_mes = "<li><label class='field'>Available Transportation: </label><input type='radio' name='transportation' value='1' checked>Yes<input type='radio' name='transportation' value='0'>No</li>";
}
else
{
	$transportation_mes = "<li><label class='field'>Available Transportation: </label><input type='radio' name='transportation' value='1'>Yes<input type='radio' name='transportation' value='0' checked>No</li>";
}
if ($about['relocate'] == 1)
{
	$relocate_mes = "<li><label class='field'>Willing To Relocate? </label><input type='radio' name='relocate' value='1' checked>Yes<input type='radio' name='relocate' value='0'>No</li>";
}
else
{
	$relocate_mes = "<li><label class='field'>Willing To Relocate? </label><input type='radio' name='relocate' value='1'>Yes<input type='radio' name='relocate' value='0' checked>No</li>";
}


$query = sprintf("SELECT skills FROM users WHERE idnum=%d", $_SESSION['idnum']);
$result = mysql_query($query);
$user_info = mysql_fetch_assoc($result);

if ($user_info['hourly'] == 1)
{
	$hourly_mes = "checked='checked'";
}
else
{
	$hourly_mes = "";
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
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/script.js"></script>
<script src="js/FF-cash.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/slides.min.jquery.js"></script>
<script type="text/javascript" src="simple.js"></script>
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
			  <h1 id='edit_title'>Looking For:</h1>
              <form action='basic_info.php' method='post'>
              <?=$error?><?=$message?><br>
              <ul id='education'>
                <li><label class="field">Looking For: </label>
                <select name="looking_for">
                	<option>Summer Internship</option>
                    <option>Winter Internship</option>
                    <option>Cooperative Internship</option>
                    <option>Full Time Position</option>
                    <option>Employed</option>
                    <option>Undecided</option>
                </select>
                </li><br>
                <li><label class="field">Current City: </label><input name="city" value="<?=$about['city']?>" style='width: 150px;' /> State: <select name="state"  style='width: 60px;'><script>
				states("<?=$about['state']?>");
				</script></select></li>
                <li id="school"></li>                    
                <li><label class="field">Expected Pay: </label><input name="income" value="<?=$about['pay']?>" /></label> <label>  &nbsp;Hourly: </label>
    <input type="checkbox" name="hourly" <?=$hourly_mes?>/></li>
                <li><label class="field">Industry: </label>
                <select name='industry'>
                	<option>Public Policy, Government, Law</option>
                    <option>Education, Non-Profit</option>
                    <option>Communications, Media, Art</option>
                    <option>Finance, Real-Estate, Insurance</option>
                    <option>Consulting, Human Resource</option>
                    <option>Engineering, Information Technology</option>
                	<option>Healthcare</option>
                </select>
<label class='subscript'>Example: Healthcare</label></li><br>
			<?
			echo $transportation_mes;
			echo $relocate_mes;
			?>
<br>
			<li>
            <li><label class='field'>Technical Skills: </label><textarea name='skills' rows='2'><?=$user_info['skills']?></textarea>
            <label class='subscript'>Example: Microsoft Excel, HTML</label></li>
            <br>
            <li>
            <span style='margin-left: 300px;'><input type='submit' name='submit' value='Save' />
            <input type='submit' name='skip' value='Skip' /></span></li>
            </ul>
        	</form>
            <script>
			selectDefault('looking_for', "<?=$about['status']?>");
			selectDefault('industry', "<?=$about['field']?>");
			</script>
			</div>
		</div>
	</div>
</section>
<!-- footer -->
<?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/template.php');
	echo footer();
?>
</body>
</html>
