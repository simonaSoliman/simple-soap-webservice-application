<?php
$extracted=extract($_GET);

$DBName="simple soap webservice application";
$DBHost="localhost";
$DBUserw="nada";
$DBUserwpass="itipass";

@$db=mysqli_connect($DBHost,$DBUserw,$DBUserwpass,$DBName);
if (mysqli_connect_errno()) {
  echo "can not connect";
  exit ;
}
$getinfosql="select * from user where token='".$token."'";
$result=mysqli_query($db,$getinfosql) or die(mysqli_error($db));
$assoc=mysqli_fetch_assoc($result);
$json=json_encode($assoc);
echo $json;
?>
