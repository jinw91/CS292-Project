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
	
	$connect=mysql_connect("$host", "$username", "$password");
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
		mysql_real_escape_string($username), mysql_real_escape_string($password));
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
	$normal = array("a", "b", "c",  "vegetables", "fiber");
	$yummy  = array("pizza", "beer", "ice cream");
}

/**
Decrypt
**/
function decrypt($password)
{
	$normal = array("a", "b", "c");
	$yummy  = array("al", "bi", "ci");
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
