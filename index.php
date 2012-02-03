<?php
session_start();
if (isset($_SESSION['idnum']))
{
	header("Location: home.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Professional Archives</title>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28417433-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<style type="text/css">
	.inner
	{
		width:962px;
		margin:0 auto;
		padding:0;
		text-align:left;	
	}
	.topcolumn
	{
		background-image:url(sampletopwithlogo_g.png);
	}
	.innertable 
	{
		font-family: Tahoma, Geneva, sans-serif;
	}
</style>
</head>
<body>
<div class="inner">
<table border="0" width="100%">
<tr>
	<th height="136" colspan="2" align="right" class="topcolumn">
	  <form action="login.php" method="post"> 
	    Email: <input name="email" width="144"/> <br>
	      Password: <input type="password" name="password" width="144"/>
	      <br>
	      Remember Me <input type="checkbox" name="cookie"/>
	  <input name="login" type="submit" value="Log In"/>
      </form>
   </th></tr>
    <tr>
	<th width="434" height="520"><center><img src="sampleoutline.png"></img><left>
	  <p><span class="innertable">Professional Archives is a free online archive to connect<br>
	    college students with companies and professionals around the<br>
	    world. </span><br></p></center>
	    
</th>
    <td width="186" align="left" class="innertable"><center>
    <b>It's Easy to Sign Up.</b></center>
    <br>
    <form action="educationregister.php" method="post" onSubmit="return validate_fields()">
    <div style="text-align: right">
    <ul>
    <label for="first_name" style="float: left; text-align: right;">First Name: </label><input id="first_name" name="first_name" size=25/> <br>
 	<label for="last_name" style="float: left; text-align: right;">Last Name: </label><input id="last_name" name="last_name" size=25/> <br>
    <label for="emailaddress" style="float: left; text-align: right;">Email: </label><input id="emailaddress" name="emailaddress" size=25/> <br>
    <label for="user_password" style="float: left; text-align: right;">Password: </label> <input id="user_password" name="user_password" type="password" size=25/> <br>
    <center><input type="submit" name="submit" id="submit" value="Register Now"/></center>
    </ul>
    </div>
    </form>
    <script type="text/javascript">
	function validate_fields()
	{
		var first_name = document.getElementById("first_name").value;
		var last_name = document.getElementById("last_name").value;
		if (first_name.length < 1 || last_name.length < 1)
		{
			alert("Please fill in your name.");
			return false;
		}
		var email = document.getElementById("emailaddress").value;
		if (email.length < 1)
		{
			alert("Please fill in your email address.");
			return false;
		}
		var password = document.getElementById("password").value;
		if (email.length < 1)
		{
			alert("Please put in a password.");
			return false;
		}
		alert(first_name+" "+last_name+" "+email);
		return false;
	}
	</script>
	</td>
    <tr>
      <th height="74">&nbsp;</th>
      <td align="left">&nbsp;</td>
  </table>
</div>
</body>
</html>