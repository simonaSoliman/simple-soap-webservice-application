<?php
extract($_GET);
$result = file_get_contents("http://demolinkedin.com/gettoken.php?code=U0U2L2E5cVaoWhgM2LAX&secret=simona");
$tokenextracted = json_decode($result,true)['token'];
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL ,"http://demolinkedin.com/getinfo.php?token=".$tokenextracted);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST , false);
$result = curl_exec($ch);


var_dump($result);
die();

echo "<br/>";
echo "<hr/>";




