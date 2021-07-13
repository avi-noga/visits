<?php
include "../../webapps/config.visits.php";


$json_data = array();

if (isset($_POST['empnumber'])) {
    $json_data['empnumber'] = $_POST['empnumber'];
    $empnumber = $_POST['empnumber'];
}
if (isset($_POST['metupalnumber'])) {
    $json_data['metupalnumber'] = $_POST['metupalnumber'];
    $metupalnumber = $_POST['metupalnumber'];
}
if (isset($_POST['professionid'])) 
    $json_data['professionid'] = $_POST['professionid'];
if (isset($_POST['sigData'])) {
    $json_data['sigData'] = $_POST['sigData'];
    $sigData = $_POST['sigData'];
}
if (isset($_POST['metapelname'])) 
    $json_data['metapelname'] = $_POST['metapelname'];
if (isset($_POST['userid'])) {
    $json_data['userid'] = $_POST['userid'];
    $userid = $_POST['userid'];
}
if (isset($_POST['visitDate'])) {
    $json_data['visitDate'] = $_POST['visitDate'];
    $visitDate = $_POST['visitDate'];
}
if (isset($_POST['reasonNotOcc'])) {
    $json_data['reasonNotOcc'] = $_POST['reasonNotOcc'];
    $reasonNotOcc = $_POST['reasonNotOcc'];
}

if ($reasonNotOcc != "" && $userid != "" && $empnumber != "" && $metupalnumber != "" && $visitDate != "" ){

    $apiKeyStr = 'api4webapp!appendnv';
    $apiKey = strtr(base64_encode($apiKeyStr), '+/=', '-_,');
    $apiKeyParam = "apiKey=".$apiKey;

    //echo $apiKey ;

    $apiFile="append_visitNoOcc.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$urlRemote."/".$apiFile."?".$apiKeyParam);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close ($ch);

    $myArray = json_decode($server_output, true);

    print_r($server_output);

}
