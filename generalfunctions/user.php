<?php
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/database.php');
class User
{
	public $user;
	public $error; //For error purposes.
	
	function __construct($num)
	{
		$idnum = $num;
		$connect = connectToDatabase();
		if (!$connect)
		{
			$error = "cannot connect to database";
			return($connect);
		}
		$connect = mysql_select_db("$db_name");
		if (!$connect)
		{
			$error = "cannot select database.";
			return($connect);
		}
		$query = sprintf("SELECT * FROM users WHERE idnum='%d'", $num);
		$result = mysql_query($query);
		if (!$result)
		{
			$error = mysql_error();
			return($connect);
		}
		$user = mysql_fetch_assoc($result);
		return(true);
	}
}
?>