<?php
session_start();
if (!isset($_SESSION['idnum']))
{
	header("Location: index.php");
}
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
$tbl_name="personnel_email";
$connect = connectToDatabase();
if (!$connect)
{
	echo "failed to connect";
}

// converts mysql query result to a json object
function mysql2json($mysql_result) {
	$json="[";
	$rows = mysql_num_rows($mysql_result);
	for ($x=0;$x<$rows;$x++) {
		$row = mysql_fetch_array($mysql_result);
		$json.="{'caption':'".$row[0]." ".$row[1]."','value':'".$row[2]."'";
		if ($x==$rows-1) {
			$json.="}";
		} else {
			$json.="},";
		}
	}
	$json.="]";
	return($json);
}

//sending a message
if (isset($_POST['send']) && $_POST['send'] == "Send")
{
	$to_id = split(',',$_POST['hidden_to_id']);
	if (!isset($_POST['subject'])) {
		$subject = "[untitled]";
	} else {
		$subject = $_POST['subject'];
	}
	$body = $_POST['body'];
	if (isset($_SESSION['company']['b_id']))
	{
		for ($i = 0; $i < count($to_id); $i ++) 
		{
			$query = sprintf("INSERT INTO requests (subject, body, from_bid, to_id, time_sent) VALUES ('$subject', '$body', '%d', '%d', NOW( ))", $_SESSION['company']['b_id'], $to_id[$i]);
		}
	}
	for ($i = 0; $i < count($to_id); $i ++) {
		$query = sprintf("INSERT INTO personnel_email (subject, body, from_id, to_id, time_sent) VALUES ('$subject', '$body', '%d', '%d', NOW( ))", $_SESSION['idnum'], $to_id[$i]);
		$result = mysql_query($query);
	}
	/*if ($result)
	{
		$message = "Message sent.";
	}
	else
	{
		$message = mysql_error();
	}*/
}

//Reading message if mid is found.
if (isset($_GET['mid']))
{
	$query = sprintf("SELECT * FROM personnel_email p JOIN users u ON p.from_id=u.idnum WHERE to_id='%d' AND mid='%d';", $_SESSION['idnum'], $_GET['mid']);
	$result = mysql_query($query);
	if (!$result)
	{
		echo mysql_error();
		$message = "Cannot open message";
	}
	$mes = mysql_fetch_assoc($result);
        if (is_null($mes['picture']))
        {
		$mes['picture'] = "images/default.png";
        }
        $message = $message."<div style='height:0px;width:80px;float:left'><img margin-right:2px' src='".$mes['picture']."' width='35' height='35'/><br></div>";
        $message = $message."<span style='float:left; margin-left:45px'><div style='font-weight: bold; color: black; font-size: 1.4em;'>";
	if ($mes['subject'] == "") {
		$message = $message."[untitled]";
	} else {
		$message = $message.$mes['subject'];
	}
        $message = $message."</div>";
        $message = $message."<a id='sender_name' href='profile.php?idnum=".$mes['from_id']."' style='font-size: 1.2em; color: grey;'>".$mes['first_name']." ".$mes['last_name']."</a><hr/>"; //adds name.
        $message = $message.$mes['body']."</span>";
        $message = $message."<span style='clear:both; float:left; margin-left:80px; margin-top: 3em;'><form method='post' action='inbox.php?write=true&single=true'><input type='submit' value='Reply' /></form>";
	$_SESSION['to'] = $mes['first_name']." ".$mes['last_name'];
	$_SESSION['subject'] = "Re: ".$mes['subject'];
	$_SESSION['body'] = "";
	$query = sprintf("UPDATE personnel_email SET is_read=1 WHERE mid='%d';", $_GET['mid']);
	$result = mysql_query($query);
	if (!$result)
	{
		$message = $query."\n".mysql_error();
	}
}

//writing message
else if (isset($_GET['write']))
{
	if (isset($_GET['single']) or isset($_GET['multiple'])) 
	{
		$mes_to = $_SESSION['to'];
		$mes_sub = $_SESSION['subject'];
		$mes_body = $_SESSION['body'];
		if ($_SESSION['time_edit']) 
		{
			/**
			Madhur's code**/
			$date = "<li><label class='inbox' for='time'>Date: </label><input type='text' id='pickdatetime' size='35'/></li>";
			$time = "<li><label class='inbox' for='time'>End Time: </label><input type='text' id='picktime' size='5'/></li>";
			//$date = "<li><label class='inbox' for='time'>Date: </label><input type='text' id='date_field' size='35'/></li>";
			//$time = "<li><label class='inbox' for='time'>Time: </label><input type='text' id='time_field' size='5'/></li>";
		}
		else if ($_SESSION['t_edit'])
		{
			$date = "<select name='date'>";
			$query = "";
			//work on
		}
	} 
	else 
	{
		unset($mes_to);
		unset($mes_sub);
		unset($mes_body);
	}
	$message = "<form action='inbox.php' method='post'>
	<ul id='inbox'>
	<li><label class='inbox' for='to_name'>To: </label>
	<ol><li id='facebook-list' class='input-text'><input type='text' name='to_name' id='facebook-demo' style='width:450px'/>
	<div id='facebook-auto'>
	<div class='default'>Separate names with a comma</div>
	<ul class='feed'>";
	if (isset($_GET['single'])) {
		$message = $message."<li value='".$_SESSION['to_id']."'>".$mes_to."</li>";
	} else if (isset($_GET['multiple'])) {
		for ($i=0; $i<count($mes_to); $i++) {
			$message = $message."<li value='".$_SESSION['to_id'][$i]."'>".$mes_to[$i]."</li>";
		}
	}
	$message = $message."</ul></div></li></ol></li>
	<li><label class='inbox' for='subject'>Subject: </label> <input type='text' name='subject' value='".$mes_sub."' style='width:450px'/></li>
	<li><label class='inbox' for='body'>Body: </label><div><textarea id='ckeditor' name='body' style='position:absolute;'>".$mes_body."</textarea></div></li>".$date.$time."
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
	<li><span style='margin-left: 58px;'>";
	if (isset($date))
	{
		
		$message .= "<button id='add' onClick='return false;'>Add Slot</button><button id='submit' onClick='return false;'>Submit Slots</button>";
	}
	$message .= "<input type='submit' onclick='copyid();' name='send' value='Send'/></span></li>
	<li><input type='hidden' name='hidden_to_id' id='hidden_to_id' /></li></ul></form>";
	
	/*$message = $message."</ul></div></li></ol></li>
	<li><label class='inbox' for='subject'>Subject: </label> <input type='text' name='subject' value='".$mes_sub."' style='width:450px'/></li>
	<li><label class='inbox' for='body'>Body: </label><div><textarea id='ckeditor' name='body' style='position:absolute;'>".$mes_body."</textarea></div></li>".$date.$time."
    <script>
        CKEDITOR.replace('ckeditor');
        AnyTime.picker('date_field',{format:'%W, %M %D %z',placement:'popup',earliest:new Date()});
        AnyTime.picker('time_field',{format:'%H:%i',placement:'popup'});
    </script>
	<li><span style='margin-left: 58px;'><input type='submit' onclick='copyid();' name='send' value='Send'/></span></li>
	<li><input type='hidden' name='hidden_to_id' id='hidden_to_id' /></li></ul></form>";*/
	if (!isset($_SESSION['business_mode']))
	{
		$error .= "SESSION businessmode not set";
	}
	$error .= $_SESSION['business_mode'];
    if ($_SESSION['business_mode']) 
	{
        $query = sprintf("SELECT first_name, last_name, idnum FROM users");
    } 
	else 
	{
        $query = sprintf("SELECT u.first_name, u.last_name, u.idnum FROM users u, friends f WHERE f.from_id=%d AND f.to_id=u.idnum", $_SESSION['idnum']);
    }
	$result = mysql_query($query);
	if (!$result) {
		echo mysql_error();
	}
	$myjson = mysql2json($result);
	if (!isset($myjson))
	{
		$error .= "myjson not set";
	}
	$error .= $myjson;
	$message = $message."<script>
	function copyid() {
		$('#hidden_to_id').value=\$F('facebook-demo');
	}
	document.observe('dom:loaded', function() {
        tlist = new FacebookList('facebook-demo', 'facebook-auto',{ regexSearch: false });
        var myjson = ".$myjson.";
        myjson.each(function(t){tlist.autoFeed(t)});
	});
	</script>";
}
//Sets the inbox to show all emails.
else
{
	if (isset($_GET['limit']))
	{
		$limit = $_GET['limit'];
	}
	else
	{
		$limit = 0;
	}
	//Always displays requests on top of messages.
	$query = sprintf("SELECT * FROM requests r, users u, businesses b WHERE r.from_bid=b.b_id AND to_id='%d' ORDER BY time_sent DESC LIMIT %d, 10", $_SESSION['idnum'], $_GET['limit']);
	$has_messages = false;
	$result = mysql_query($query);
	if (!$result)
	{
		$error = $query."".mysql_error();
	}
	else
	{
		$has_messages = true;
		$message = "<ul id='meslist'>";
		while ($mes =  mysql_fetch_assoc($result))
		{
			if (is_null($mes['picture']))
			{
				$mes['picture'] = "images/default.png";
			}
			$message = $message."<li><div style='height:40px;width:40px;float:left'><img style='margin-bottom: 0px; padding-bottom: 0px;' src='".$mes['picture']."' width='35' height='35'/><br>";
			$from_name = $mes['first_name']." ".$mes['last_name'];
			$message = $message."<a class='mes_name' href='profile.php?b_id=".$mes['from_bid']."'>";
			if (strlen($from_name) <= 11) 
			{
				$message = $message.$from_name."</a></div>";
			} 
			else 
			{
				$message = $message.substr($from_name,0,11)."...</a></div>";
			}
			if ($mes['subject'] == "") 
			{
				$message = $message."<a href='inbox.php?mid=".$mes['mid']."'style='font-weight: bold; color: black;'>[untitled]";
			} 
			else 
			{
				$message = $message."<a href='inbox.php?mid=".$mes['mid']."'style='font-weight: bold; color: black;'>".$mes['subject'];
			}
			if (strlen($mes['body']) <= 80) 
			{
				$message = $message."</a><br>".$mes['body']."</li>";
			} 
			else 
			{
				$message = $message."</a><br>".substr($mes['body'],0,80)."......</li>";
			}
		}
	}
	
	
	$query = sprintf("SELECT * FROM personnel_email p JOIN users u ON p.from_id=u.idnum WHERE to_id='%d' ORDER BY time_sent DESC LIMIT %d, 10", $_SESSION['idnum'], $_GET['limit']);
	$result = mysql_query($query);
	if (!$result)
	{
		echo mysql_error();
	}
	else if (mysql_num_rows($result) == 0 && !$has_messages)
	{
		$message = "<ul id='messages'><li><div align='center'>No messages</div></li>";
		if (isset($_GET['limit']))
		{
			$message .= "<span style='float: left; position: absolute;'><a class='black' href='inbox.php?limit=".($limit-10)."'>Previous</a></span>";
		}
		$message .= "</ul>";
	}
	else
	{
		while ($mes =  mysql_fetch_assoc($result))
		{
			if (is_null($mes['picture']))
			{
				$mes['picture'] = "images/default.png";
			}
			$message = $message."<li><div style='height:40px;width:40px;float:left'><img style='margin-bottom: 0px; padding-bottom: 0px;' src='".$mes['picture']."' width='35' height='35'/><br>";
			$from_name = $mes['first_name']." ".$mes['last_name'];
			$message = $message."<a class='mes_name' href='profile.php?idnum=".$mes['from_id']."'>";
			if (strlen($from_name) <= 11) {
				$message = $message.$from_name."</a></div>";
			} else {
				$message = $message.substr($from_name,0,11)."...</a></div>";
			}
			//decides how unread messages look
			/*if ($mes['read'] == 0)
			{
				$message = $message."<a href='inbox.php?mid=".$mes['mid']."'style='font-weight: bold; color: black;'>".$mes['subject'];
			}
			else
			{
				$message = $message."<a href='inbox.php?mid=".$mes['mid']."'style='font-weight: lighter; color: black;'>".$mes['subject'];
			}*/
			//$message = $message."<a href='inbox.php?mid=".$mes['mid']."'style='font-weight: bold; color: black;'>".$mes['subject'];
			if ($mes['subject'] == "") {
				$message = $message."<a href='inbox.php?mid=".$mes['mid']."'style='font-weight: bold; color: black;'>[untitled]";
			} else {
				$message = $message."<a href='inbox.php?mid=".$mes['mid']."'style='font-weight: bold; color: black;'>".$mes['subject'];
			}
			if (strlen($mes['body']) <= 80) {
				$message = $message."</a><br>".$mes['body']."</li>";
			} else {
				$message = $message."</a><br>".substr($mes['body'],0,80)."......</li>";
			}
		}
		$message .= "<div class='paginator'>";
		if ($limit != 0)
		{
			$message .= "<span style='float: left; position: absolute;'><a class='black' href='inbox.php?limit=".($limit-10)."'>Previous</a></span>";
		}
		
		$message .= "<span style='float: right; position: relative;'><a class='black' href='inbox.php?limit=".($limit+10)."'>Next</a></span></div>";
		$message .= "</ul>";
	}
}

mysql_close();
?>
<!DOCTYPE html>
<html lang="en">
<head>


<title>Inbox</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/skeleton.css">
<link rel="stylesheet" href="css/anytime.css">
<link rel="stylesheet" href="css/test.css" type="text/css" media="screen" title="Test Stylesheet" charset="utf-8" />
<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.8.21/themes/ui-lightness/jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="madhur/datepicker/dp/jquery-ui-timepicker-addon.css" />
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
<script type="text/javascript" src="madhur/datepicker/dp/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="madhur/datepicker/dp/jquery-ui-sliderAccess.js"></script>

    <script type="text/javascript" >
    $(document).ready( function() {
    var myGlobal={};
    myGlobal.count=0;
    //myGlobal.storeSlots=new Array();
    myGlobal.storeSlots={};
    $('#pickdatetime').datetimepicker();
    $('#picktime').timepicker({});
    $('#add').click(addSlots);
    $('#submit').click(sendToDataBase);
    
    
    function addSlots() {
        
        //parse the string from input
        var pickedDate=document.getElementById('pickdatetime').value;
        var pickedEndTime=document.getElementById('picktime').value;
        var arrayString=pickedDate.split(' ');
        var slots={};
        slots.date=arrayString[0];
        slots.starttime=arrayString[1];
        slots.endtime=pickedEndTime;
        slots.duration=15;
        myGlobal.storeSlots[myGlobal.count]=slots; //using an object instead of array
        myGlobal.count++;
        //myGlobal.storeSlots[count++]=slots;
    }
    
    function sendToDataBase() {
        
        $.ajax(
            {
                type:"POST",
                url:"enterslots.php",
                //datatype:"json",
                data:{ jsondata:JSON.stringify(myGlobal.storeSlots)},
                
            }
            
        ).done( function(json) {
            $('#print').html(json);
           //var jsonobj=$.parseJSON(json);
            //$.each(jsonobj,function(key,value) {
            //    $('#availableslots').append("<li id='"+value['slotid']+"'>"+"Start Time:"+value['starttime']+"<br/>End time:"+value['endtime']+"<br/>Recruiter:"+value['interviewer']+"</li>");
            //});
            
            });
        
        for ( var slotnum in myGlobal.storeSlots) {
            $('#print').append(myGlobal.storeSlots[slotnum].date);
        }
    }
    
    } );
    </script>

<!--putting new content ends-->


</head>
<body>
<!-- header -->
<?=$error?>
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
			
        <?php
		if(!defined('__ROOT__')) define('__ROOT__', dirname(__FILE__)); 
		require_once(__ROOT__.'/generalfunctions/template.php');
		if(isset($_SESSION['num_mes'])){
			echo navBar($_SESSION['num_mes']);
		}else{
			echo navBar(0);
		}
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
<div class="grid_4">
<?php
if (isset($_GET['write']) or isset($_GET['mid'])) {
        echo "<div align='center'><h2><a class='header_font' href='inbox.php'>Back to Inbox</a></h2></div>";
} else {
        echo "<div align='center'><h2><a class='header_font' href='inbox.php?write=true'>Compose Message</a></h2></div>";
}
?>
</div>
<div class="grid_7">
<fieldset>
<div style="padding-top: 10px; font-size:12px;">
<?=$message?>
</div>
</fieldset>
</div>
</div>
</div>
	<!-- footer -->
<?php
	echo footer();
?>
</body>
</html>
