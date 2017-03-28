<?php
$extracted=extract($_GET);
$key=$key;
$DBName="simple soap webservice application";
$DBHost="localhost";
$DBUserw="nada";
$DBUserwpass="itipass";

function getRandomString()
  {
    $random="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $randomString="";

    for ($i = 0; $i <20; $i++) {
        $randomString .= $random[rand(0, strlen($random) - 1)];
    }
    return $randomString;
  }

@$db=mysqli_connect($DBHost,$DBUserw,$DBUserwpass,$DBName);
if (mysqli_connect_errno()) {
  echo "can not connect";
  exit ;
}
$sql="select id from clients where clientkey='".$key."'";
$result=mysqli_query($db,$sql) or die(mysqli_error($db));
$userid=$result->fetch_assoc()['id'];
// echo $userid;
// die();
if ($userid) {
  $code=getRandomString();

  $sqlInsert="insert into client_code (clientid,code,userid) values(".$userid.",'".$code."',1)";
  $resultInsert=mysqli_query($db,$sqlInsert)or die(mysqli_error($db));
}
header("location:http://mywebsite.com/callback.php?code=".$code."");
 ?>
