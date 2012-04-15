<?php
session_start();
//Generate name
function name($company)
{
	if ($company)
	{
		return($_SESSION['company']['company_name']);
	}
	else
	{
		return($_SESSION['users']['first_name']." ".$_SESSION['users']['last_name']);
	}
}


?>