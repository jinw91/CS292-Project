<?php

$host="proarcscom.ipagemysql.com";
$username="general";
$password="publicclass";
$db_name="pa_members";

$con=mysql_connect($host,$username,$password);
if (!$con)
  {
    echo "madhur";
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db($db_name,$con);
 // echo "something";
?>