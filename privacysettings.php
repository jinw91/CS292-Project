<?php
session_start();
if (!isset($_SESSION['idnum']))
{
	header("Location: index.php");
}
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
require_once(__ROOT__.'/generalfunctions/user_profile.php');
require_once(__ROOT__.'/generalfunctions/business_profile.php');
$connect = connectToDatabase();
if (!$connect)
{
	echo "failed to connect";
}

$query = sprintf("SELECT * FROM privacy WHERE idnum='%d'", $_SESSION['idnum']);
$result = mysql_query($query);
$mes = mysql_fetch_assoc($result);
$notification = $mes['notification'];
$basic_information = $mes['basic_information'];
$graduation = $mes['graduation'];
$status = $mes['status'];
$picture = $mes['picture'];
$education = $mes['education'];
$gpa = $mes['gpa'];
$work_experience = $mes['work_experience'];
$extracurricular = $mes['extracurricular'];
$skills = $mes['skills'];
$message = $mes['message'];

function choose_selected($privacy_level) {
    $selected = "<option ".($privacy_level==0?"selected=\'selected\'":"").">Public</option>";
    $selected .= "<option ".($privacy_level==1?"selected=\'selected\'":"").">Friends and Company</option>";
    $selected .= "<option ".($privacy_level==2?"selected=\'selected\'":"").">Friends but not Company</option>";
    $selected .= "<option ".($privacy_level==3?"selected=\'selected\'":"").">Company but not Friends</option>";
    $selected .= "<option ".($privacy_level==4?"selected=\'selected\'":"").">Myself only</option>";
    return $selected;
}

function parse_notification($text) {
	switch($text) {
		case "Email & Text":
			return "ET";
		case "Direct Emailing":
			return "DE";
		case "Phone Message":
			return "PM";
		case "No notifications":
			return "NN";
    }
}

function parse_privacy_level($text) {
    switch($text) {
        case "Public":
            return 0;
        case "Friends and Company":
            return 1;
        case "Friends but not Company":
            return 2;
        case "Company but not Friends":
            return 3;
        case "Myself only":
            return 4;
    }
}

$settings = "<li><label class='field'>Send Message Notifications via: </label><select name='notification' >";
$settings .= "<option ".($notification=="ET"?"selected=\'selected\'":"").">Email & Text</option>";
$settings .= "<option ".($notification=="DE"?"selected=\'selected\'":"").">Direct Emailing</option>";
$settings .= "<option ".($notification=="PM"?"selected=\'selected\'":"").">Phone Message</option>";
$settings .= "<option ".($notification=="NN"?"selected=\'selected\'":"").">No notifications</option>";
$settings .= "</select></li>";
$settings .= "<br><br><li><label class='field' style='font-size: 1.5em; font-family: lato; text-transform: uppercase;'>Show my profile to:</label></li><br><br>";
$settings .= "<li><label class='field' style='font-weight: bold;'>Basic Information</label><select name='basic_information'>".choose_selected($basic_information)."</select></li>";
$settings .= "<li><label class='field'>Expected Graduation</label><select name='graduation'>".choose_selected($graduation)."</select></li>";
$settings .= "<li><label class='field'>Status</label><select name='status'>".choose_selected($status)."</select></li>";
$settings .= "<li><label class='field'>Picture</label><select name='picture'>".choose_selected($picture)."</select></li>";
$settings .= "<li><label class='field' style='font-weight: bold;'>Education</label><select name='education'>".choose_selected($education)."</select></li>";
$settings .= "<li><label class='field'>GPA</label><select name='gpa'>".choose_selected($gpa)."</select></li>";
$settings .= "<li><label class='field' style='font-weight: bold;'>Work Experience</label><select name='work_experience'>".choose_selected($work_experience)."</select></li>";
$settings .= "<li><label class='field' style='font-weight: bold;'>Extracurricular</label><select name='extracurricular'>".choose_selected($extracurricular)."</select></li>";
$settings .= "<li><label class='field' style='font-weight: bold;'>Skills</label><select name='skills'>".choose_selected($skills)."</select></li>";
$settings .= "<li><label class='field' style='font-weight: bold;'>Message</label><select name='message'>".choose_selected($message)."</select></li>";

if (isset($_POST['save'])) {
    $notification = parse_notification($_POST['notification']);
    $basic_information = parse_privacy_level($_POST['basic_information']);
    $graduation = parse_privacy_level($_POST['graduation']);
    $status = parse_privacy_level($_POST['status']);
    $picture = parse_privacy_level($_POST['picture']);
    $education = parse_privacy_level($_POST['education']);
    $gpa = parse_privacy_level($_POST['gpa']);
    $work_experience = parse_privacy_level($_POST['work_experience']);
    $extracurricular = parse_privacy_level($_POST['extracurricular']);
    $skills = parse_privacy_level($_POST['skills']);
    $message = parse_privacy_level($_POST['message']);
    $query = sprintf("UPDATE privacy SET
        notification='%s',
        basic_information='%d',
        graduation='%d',
        status='%d',
        picture='%d',
        education='%d',
        gpa='%d',
        work_experience='%d',
        extracurricular='%d',
        skills='%d',
        message='%d'
        WHERE idnum='%d'", $notification, $basic_information, $graduation, $status, $picture, $education, $gpa, $work_experience, $extracurricular, $skills, $message, $_SESSION['idnum']);
	$result = mysql_query($query);
	if ($result) {
		$notice = "Settings saved.";
	}
	else {
		$notice = mysql_error();
	}
    $settings = "<li><label class='field'>Send Message Notifications via: </label><select name='notification' >";
    $settings .= "<option ".($notification=="ET"?"selected=\'selected\'":"").">Email & Text</option>";
    $settings .= "<option ".($notification=="DE"?"selected=\'selected\'":"").">Direct Emailing</option>";
    $settings .= "<option ".($notification=="PM"?"selected=\'selected\'":"").">Phone Message</option>";
    $settings .= "<option ".($notification=="NN"?"selected=\'selected\'":"").">No notifications</option>";
    $settings .= "</select></li>";
    $settings .= "<br><br><li><label class='field' style='font-size: 1.5em; font-family: lato; text-transform: uppercase;'>Show my profile to:</label></li><br><br>";
    $settings .= "<li><label class='field' style='font-weight: bold;'>Basic Information</label><select name='basic_information'>".choose_selected($basic_information)."</select></li>";
    $settings .= "<li><label class='field'>Expected Graduation</label><select name='graduation'>".choose_selected($graduation)."</select></li>";
    $settings .= "<li><label class='field'>Status</label><select name='status'>".choose_selected($status)."</select></li>";
    $settings .= "<li><label class='field'>Picture</label><select name='picture'>".choose_selected($picture)."</select></li>";
    $settings .= "<li><label class='field' style='font-weight: bold;'>Education</label><select name='education'>".choose_selected($education)."</select></li>";
    $settings .= "<li><label class='field'>GPA</label><select name='gpa'>".choose_selected($gpa)."</select></li>";
    $settings .= "<li><label class='field' style='font-weight: bold;'>Work Experience</label><select name='work_experience'>".choose_selected($work_experience)."</select></li>";
    $settings .= "<li><label class='field' style='font-weight: bold;'>Extracurricular</label><select name='extracurricular'>".choose_selected($extracurricular)."</select></li>";
    $settings .= "<li><label class='field' style='font-weight: bold;'>Skills</label><select name='skills'>".choose_selected($skills)."</select></li>";
    $settings .= "<li><label class='field' style='font-weight: bold;'>Message</label><select name='message'>".choose_selected($message)."</select></li>";
}

if (isset($_POST['cancel'])) {
    header('Location: cprofile.php');
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
    				<form action='privacysettings.php' method='post'>
                    <ul>
              		<?=$notice?><br>
                    <?=$settings?>
            		<br>
            		<li>
                    <span style='margin-left: 25em;'>
            		<input type='submit' name='cancel' value='Cancel' />
                    <input type='submit' name='save' value='Save' /></span></li>
            		</ul>
        			</form>
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
