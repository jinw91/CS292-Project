<?php
require_once("facebook/facebook.php");
if (!isset($_SESSION))
{
	session_start();
}

$config = array();
$config['appId'] = '213672885370267';
$config['secret'] = '08997523a4f46a2113c42969fb425f13';
//$config['cookie'] = true;
$redirectUrl = "http://www.proarcs.com/facebook.php";

$facebook = new Facebook($config);
$user = $facebook->getUser();

if ($user)
{
	$message = "User is working".$user;
	try
	{
		$user_profile = $facebook->api('/me','GET');
		$friends = $facebook->api('/me/friends','GET');
		if (isset($friends['data']))
		{
			$mes = "<br>";
			for ($i = 0; $i < count($friends['data']); $i++)
			{
				$link = "/".$friends['data'][$i]['id'];
				$person = $facebook->api($link,'GET');
				$person_email = $person['username']."@facebook.com";
				$mes .= $person['name'].": ".$person_email."<br>";//$friends['data'][$i]['name'] .": ". $friends['data'][$i]['id']. "<br>";
			}
		}
		
	}
	catch (FacebookApiException $e) 
	{
        $login_url = $facebook->getLoginUrl(); 
        $message .= 'Please <a href="' . $login_url . '">login.</a>';
        $message .= $e->getType();
        $message .= $e->getMessage();
    }
}
else
{
	$params = array(
	  //'scope' => 'user_about_me, friends_about_me, read_friendlists',
	  'scope' => 'user_about_me, friends_about_me, email',
	  'redirect_uri' => $redirectUrl
	);
	$message = "User is null";
	$login_url = $facebook->getLoginUrl($params);
	$message .= "<br><a href='".$login_url."'>Login Here</a>";
	
	
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
echo($mes);
echo($message);
echo("<br>Username is: ".$user_profile['username']);
echo("<br>Link is: ".$user_profile['link']);
echo("<br>Name is: ".$user_profile['name']);
$msgbody = "Join Professional Archives <a href='http://www.proarcs.com/'>here!</a><br/><br/>Thanks, <br/>"."Wei Nanhua Jin"."";
$msgheader = "From: ".$user['name']." <".$user['email'].">\r\n";
$msgheader .= "MIME-Version: 1.0\n";
$msgheader .= "Content-type: text/html; charset=us-ascii\n";
mail("jinw91@facebook.com", "Join Professional Archives", $msgbody, $msgheader);
//var_dump($friends);
?>

</body>
</html>