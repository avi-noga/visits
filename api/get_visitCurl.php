<?php
include "../../webapps/config.visits.php";


$apiKeyStr = 'api4webapp!vlist';
$apiKey = strtr(base64_encode($apiKeyStr), '+/=', '-_,');
$apiKeyParam = "apiKey=".$apiKey;

//if ($username != "" && $password != "" && $empnum != ""){

$json_data = array();

if (isset($_POST['vid'])) 
    $json_data['vid'] = $_POST['vid'];
if (isset($_POST['emp']))
    $json_data['emp'] = $_POST['emp'];
if (isset($_POST['empn'])) 
    $json_data['empn'] = $_POST['empn'];
if (isset($_POST['profemp'])) 
    $json_data['profemp'] = $_POST['profemp'];
if (isset($_POST['met'])) 
    $json_data['met'] = $_POST['met'];
if (isset($_POST['metn'])) 
    $json_data['metn'] = $_POST['metn'];
if (isset($_POST['isSigned'])) 
    $json_data['isSigned'] = $_POST['isSigned'];
if (isset($_POST['visitd'])) 
    $json_data['visitd'] = $_POST['visitd'];
if (isset($_POST['prof'])) 
    $json_data['prof'] = $_POST['prof'];
if (isset($_POST['brn'])) 
    $json_data['brn'] = $_POST['brn'];

$apiFile="get_visit.php";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$urlRemote."/".$apiFile."?".$apiKeyParam);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close ($ch);

$myArray = json_decode($server_output, true);

//    $userid =$server_output +0 ;

//      if($userid > 0){
//        $_SESSION['uname'] = $username;
//      echo $userid;
//        } else{
//          echo 0;
//    }
print_r($server_output);

//}
