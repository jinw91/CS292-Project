<?php
/**
Connects to the database using jinw91.. needs to change after user.
**/
function connectToDatabase()
{
	$host="proarcscom.ipagemysql.com";
	$username="general";
	$password="publicclass";
	$db_name="pa_members";
	
	$connect=mysqli_connect("$host", "$username", "$password");
	if (!$connect)
	{
		printf( "Error connecting to mySQL");
		return(false);
	}
	$connect = mysql_select_db("$db_name");
	if (!$connect)
	{
		echo "Cannot connect to database";	
		return(false);
	}
	return(true);
}
/**
Checks if the login information is valid.
**/
function validateLogin($username, $password)
{
	$query = sprintf("SELECT * FROM users WHERE email='%s' AND password='%s'", 
		mysql_real_escape_string($username), mysql_real_escape_string(sha1(encrypt($password))));
	$result = mysql_query($query);
	if (!$result) { echo mysql_error();}
	if (mysql_affected_rows() == 0) 
	{
		return(-1);
	}
	else
	{
		$idnum = mysql_result($result, 0);
		return($idnum);
	}
}

/**
Encrypt
**/
function encrypt($password)
{
	$tmp = $password;
	$normal = array('d', '@', 'g', '7', '3', 'b', 'q', '4', 't', 'w', 'y', 'k', 'j', 'x', 'h', 'n', '6', 'f', '9', '0', 'r', 's', '8', 'v', 'i', ';', 'u', '*', 'o', '!', 'e', 'm', '#', 'a', 'c', 'l', '2', '5', '^', '1'); 
	$yummy  = array('|', 'd', '@', 'g', '7', '3', 'b', 'q', '4', 't', 'w', 'y', 'k', 'j', 'x', 'h', 'n', '6', 'f', '9', '0', 'r', 's', '8', 'v', 'i', ';', 'u', '*', 'o', '!', 'e', 'm', '#', 'a', 'c', 'l', '2', '5', '^');
	
	$tmp = str_replace($normal, $yummy, $tmp);
	return($tmp); 
}

/**
Decrypt
**/
function decrypt($password)
{
	$yummy  = array('^', '5', '2', 'l', 'c', 'a', '#', 'm', 'e', '!', 'o', '*', 'u', ';', 'i', 'v', '8', 's', 'r', '0', '9', 'f', '6', 'n', 'h', 'x', 'j', 'k', 'y', 'w', 't', '4', 'q', 'b', '3', '7', 'g', '@', 'd', '|');
	$normal = array('1', '^', '5', '2', 'l', 'c', 'a', '#', 'm', 'e', '!', 'o', '*', 'u', ';', 'i', 'v', '8', 's', 'r', '0', '9', 'f', '6', 'n', 'h', 'x', 'j', 'k', 'y', 'w', 't', '4', 'q', 'b', '3', '7', 'g', '@', 'd'); 
	
	$tmp = str_replace($yummy, $normal, $password);
	return($tmp); 
}

/**
Checks if the emailaddress is already in the database.
**/
function emailAvailable($emailaddress)
{
	$query = sprintf("SELECT * FROM users WHERE email='%s'", $emailaddress); // check to see if email already exists.
	$result = mysql_query($query);
	if (!$result)
	{
		echo mysql_error();
	}
	if (mysql_num_rows($result) > 0) 
	{
		return(false);
	}
	return(true);
}

function getPicture($idnum)
{
	$query = sprintf("SELECT picture FROM users WHERE idnum='%d'", 
		$idnum);
	$result = mysql_query($query);
	if (!$result) { echo mysql_error(); }
	$picture = mysql_result($result, 0);
	return($picture);
}

/**
function getDefaultInformation($idnum)
{
	$query = sprintf("SELECT * FROM users WHERE idnum='%d'", 
		$idnum);
	$result = mysql_query($query);
	if (!$result) { echo mysql_error();} 
	$email = mysql_result($result, 1);
	return($idnum);	
}**/
?>
