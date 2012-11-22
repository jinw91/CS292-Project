<?php
session_start();
include("../generalfunctions/database.php");
connectToDatabase();

// Just saved a form.
if ($_POST['submit']=="Save")
{
	
	
	$form_name = $_POST['form_name'];
	$form_description = $_POST['form_description'];
	$s_id = $_POST['s_id'];
	
	//insert into database for s_id.
	if (isset($_POST['s_id']))
	{
		$query = sprintf("UPDATE sid_to_bid SET form_name='$form_name', form_description='$form_description' WHERE s_id='%d'", $_POST['s_id']);
	}
	else
	{
		$query = sprintf("INSERT INTO sid_to_bid (b_id, form_name, form_description) VALUES ('%d', '$form_name', '$form_description')", $_SESSION['company']['b_id']);
	}
	$result = mysql_query($query);
	if (!$result)
	{
		$error .= $query.mysql_error();
	}
	
	if (!isset($s_id))
	{
		$query = sprintf("SELECT * FROM sid_to_bid WHERE b_id='%d' AND form_name='$form_name' LIMIT 1", $_SESSION['company']['b_id']);
		$result = mysql_query($query);
		if (!$result || mysql_num_rows($result) <= 0)
		{
			$error .= $query.mysql_error();
		}
		$res = mysql_fetch_assoc($result);
		$s_id = $res['s_id'];
	}
	
	//Testing, retrieving question.
	//Different strategy:
	$num = 1;
	$question_num = "question".$num;
	$type_num = "type".$num;
	while (isset($_POST[$question_num]))
	{
		$question = $_POST[$question_num];
		//$error .= $question . "<br>";
		$type = $_POST[$type_num];
		//$error .= $type . "<br>";
		$c_num = 1;
		$choice_num = "q".$num."c".$c_num;
		$body = "";
		while (isset($_POST[$choice_num]))
		{
			//$error .= $_POST[$choice_num];
			$body = $body . $_POST[$choice_num] . "|";
			$c_num++;
			$choice_num = "q".$num."c".$c_num;
		}
		if ($_POST[$type_num] == 6) //Scale
		{
			$min_num = "minimum".$num;
			$max_num = "maximum".$num;
			$from_num = "from".$num;
			$to_num = "to".$num;
			$body .=  $_POST[$from_num] . "|" . $_POST[$to_num] . "|" . $_POST[$min_num] . "|" . $_POST[$max_num] . "|";
		}
		
		$query = sprintf("INSERT INTO supplemental(q_number, question, type, body) VALUES ('$num', '$question', '$type', '$body')");
		$result = mysql_query($query);
		if (!$result)
		{
			$error .= "Did not insert into supplemental. " . mysql_error() . $query;
		}
		$num++;
		$question_num = "question".$num;
		$type_num = "type".$num;
	}
	
	
	/**foreach($_POST as $key => $var)
	{
	
		if (strpos($key, "question"))
		{
			
			$num = strpos($key, "question");
			$error .= $num . "<br>";
			$type_entry = "type".$num;
			$type = $_POST[$type_entry];
			$error .= $type . "<br>";
		}
		else
		{
			$error .= $key . " is not question#<br>";
		}
	}**/
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Professional Archives</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="supplemental_style.css">
<link rel="stylesheet" href="../css/skeleton.css">
<script src="../js/jquery-1.7.1.min.js"></script>
<script src="../js/superfish.js"></script>
<script src="../js/hoverIntent.js"></script>
<script src="../js/script.js"></script>
<script src="../js/FF-cash.js"></script>
<script src="../js/supplemental.js"></script>
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
			<h1 class="fleft"><a href="../index.php"><img src="../site_im/p_a_logo_new.png" alt=""></a></h1>
			
        <?
		define('__ROOT__', dirname(__FILE__)); 
		require_once(__ROOT__.'/../generalfunctions/template.php');
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
    				<h1 id='edit_title'>Form Basic Information:</h1>
              			<form action='addnewform.php' method='post'>
                        <ul id='education'>
                        <li><label class='form_main'>Form Name: </label><input name='form_name' value='<?=$form_name?>' type='text'></li>
                        <li><label class='form_main'>Form Description: </label><textarea name='form_description' rows="3"><?=$form_description?></textarea></li>
              			<?=$message?><br>
                        <section>
                        <h3 class='header_question'>Question 1</h3>
                        <li><label class='field'>Question: </label><input name="question1" type="text" style='width: 150px;' /></li>
                		<li><label class='field'>Type: </label><select name='type1' style='width: 150px;' onchange='getSelected();' onFocus="getSelected();"> 
                        <option value='1'>Single-line Answer</option>
                        <option value='2'>Paragraph Answer</option>
                        <option value='3'>Multiple Choice</option>
                        <option value='4'>Choose From List</option>
                        <option value='5'>Checkboxes</option>
                        <option value='6'>Scale</option>
                        <option value='7'>Fill in the Blank</option>
                        </select> </li>
                        <li id='question_specific1'></li>
                        </section>
                        <li><label class='field'></label><a class='lato_marginleft' href='#' onClick='addAnotherQuestion(this);'>Add Another Question</a></li>
            			<li>
            			<span style='margin-left: 300px;'><input type='submit' name='submit' value='Save' />
            			<input type='submit' name='skip' value='Skip' /></span></li>
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