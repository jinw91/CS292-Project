<?php

$host="localhost";
$username="root";
$password="itsrockin";

$con=mysql_connect($host,$username,$password);
if (!$con)
  {
    echo "madhur";
  die('Could not connect: ' . mysql_error());
  }
  mysql_select_db("test",$con);
 // echo "something";
?>
