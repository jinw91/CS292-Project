<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
require_once("facebook.php");

header("Location: https://www.facebook.com/dialog/oauth?
    client_id=213672885370267
   &redirect_uri=http://www.proarcs.com/facebook/test.php
   &scope=friends_about_me,user_about_me");

$config = array();
$config['appId'] = 'YOUR_APP_ID';
$config['secret'] = 'YOUR_APP_SECRET';
$config['fileUpload'] = true;

$facebook = new Facebook($config);
?>
</body>
</html>