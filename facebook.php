
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
require_once("facebook/facebook.php");

$config = array();
$config['appId'] = '213672885370267';
$config['secret'] = '08997523a4f46a2113c42969fb425f13';
$config['fileUpload'] = false; // optional

$facebook = new Facebook($config);

$params = array(
  'scope' => 'user_about_me, friends_about_me',
  'redirect_uri' => 'http://www.proarcs.com/facebook.php'
);

if (!isset($_GET['error']))
{

	$loginUrl = $facebook->getLoginUrl($params);
	echo("<a href='".$loginUrl."'>Redirect</a>");
}
else
{
	$redirect = "https://graph.facebook.com/oauth/access_token?
    client_id=".$config['appId']."
   &redirect_uri=YOUR_REDIRECT_URI
   &client_secret=".$config['secret']."
   &code=CODE_GENERATED_BY_FACEBOOK";
}
?>

</body>
</html>