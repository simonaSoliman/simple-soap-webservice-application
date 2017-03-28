<?php
$extracted=extract($_GET);
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
$sql="select * FROM client_code join clients ON client_code.clientid=clients.id where code='".$code."' and clients.clientsecret='".$secret."'";
$result=mysqli_query($db,$sql);
if ($result) {
  $token=getRandomString();
  $sqlupdate="update user set token='".$token."' where id=1";
  $updateresult=mysqli_query($db,$sqlupdate);
  //var_dump($updateresult);
  $output=[
    'code'=>'200',
    'message'=>'5odi al token',
    'success'=>'true',
    'token'=>$token
  ];
  $json=json_encode($output);
  echo $json;
}
 ?>
