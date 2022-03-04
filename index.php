<?php
system("clear");
@error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));


echo "        ";
echo "    AUUTY MIZK SCRIPT \n";
$select = readline(" [1] Logout \n [2] Follower \n [*] ");

echo " _________________\n";
$timer = readline(" [1] Member \n [2] Vip \n [*] : ");
echo "__________________\n";



if($timer == "1"){
	$timer = "2700";
	}
	if($timer == "2"){
		$timer = "30";
		}




	
@error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	
	
$url = "https://wow-like.com/login_v2";

$ua = array (
"User-Agent:Mozilla/5.0 (Linux; Android 11; M2010J19SG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.101 Mobile Safari/537.36"
);




function get($url, $ua) {
    $ch = curl_init();
    $curl = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $ua,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => true,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_COOKIEJAR => "cookie.txt",
        CURLOPT_COOKIEFILE => "cookie.txt"
    );
    $ar = curl_setopt_array($ch, $curl);
    $get = curl_exec($ch);
    return $get;
}

$get = get($url,$ua);





// Logout
if($select == "1"){
$url = "https://wow-like.com/logout";
$logout = get($url,$ua);
exit();
} 

// Code Get Facebook
$code = explode('id="user-code" value="',$get)[1];
$code = explode('"',$code)[0];




$verify = "https://m.facebook.com/device?user_code={$code}";

echo $verify;

/*
system("xdg-open $verify");
*/
sleep(4);

$er = readline("\n [1] Accepted \n [2] Exit \n [✓] :   ");


if($er == "2"){
	exit();
	}



if($er == "1"){

// Id มาจาก Verify Login
$id = explode('onclick="verify_login(',$get)[1];
$id = explode(' ',$id)[0];
$st_id = substr("$id",1, -6);  
$url = "https://wow-like.com/ajax/verifyLogin?code={$st_id}";
$verify_id = get($url,$ua);



while(true){
// Follower
$url = "https://wow-like.com/ajax/follows";
$auto = get($url,$ua);


// Message 
$auu = explode('ประสบความสำเร็จ ',$auto)[1];
$auu = explode(' ',$auu)[0];

// วน 
if($select == "2"){
for($i=$timer; $i>=0; $i--){
echo "\r           \r";
	echo "  API - AUUTY FW     ".$i;
	echo "    ";
	sleep(1);
}
}
echo "       \n";
	echo " สำเร็จ  ";
sleep(2);
}
}



?>
