<?php
session_start();

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
    				<h1 id='edit_title'>Form Basic Information:</h1>
              			<form action='addnewform.php' method='post'>
                        <ul id='education'>
                        <li><label class='form_main'>Form Name: </label><input name='name' type='text'></li>
                        <li><label class='form_main'>Form Description: </label><textarea name='description' rows="3"></textarea></li>
              			<?=$message?><br>
                        <h3 class="header_question">Question 1</h3>
                        <li><label class='field'>Question: </label><input name="question" type="text" style='width: 150px;' /></li>
                		<li><label class='field'>Type: </label><select name="type" style='width: 150px;' onchange='addothercollege();'> 
                        <option value='1'>Single-line Answer</option>
                        <option value='2'>Paragraph Answer</option>
                        <option value='3'>Multiple Choice</option>
                        <option value='4'>Checkboxes</option>
                        <option value='5'>Choose From List</option>
                        <option value='6'>Scale</option>
                        <option value='7'>Fill in the Blank</option>
                        </select> </li>
                		
                        <li id='question_specific'><ul><li><label class='field'></label><input type='radio'><input type='text' name='1' size='200'></li>
                        <li><label class='field'></label><input type='radio'><a href='javascript: addOption();'>Add Another Option</a></li></ul></li>
                        <li><label class='field'></label><a href='../addform.php'>Add Another Question</a></li>
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