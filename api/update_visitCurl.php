<?php
include "../../webapps/config.visits.php";


$json_data = array();
if (isset($_POST['vid'])) {
    $json_data['vid'] = $_POST['vid'];
    $vid = $_POST['vid'];
}
if (isset($_POST['changes'])) 
    $json_data['changes'] = $_POST['changes'];
if (isset($_POST['difficulties'])) 
    $json_data['difficulties'] = $_POST['difficulties'];
if (isset($_POST['generalimp'])) 
    $json_data['generalimp'] = $_POST['generalimp'];
if (isset($_POST['homedesc'])) 
    $json_data['homedesc'] = $_POST['homedesc'];
if (isset($_POST['metupallivealone'])) 
    $json_data['metupallivealone'] = $_POST['metupallivealone'];
if (isset($_POST['visitexceptionexists'])) 
    $json_data['visitexceptionexists'] = $_POST['visitexceptionexists'];
if (isset($_POST['metupalpresent'])) 
    $json_data['metupalpresent'] = $_POST['metupalpresent'];
if (isset($_POST['metupalpresentdesc'])) 
    $json_data['metupalpresentdesc'] = $_POST['metupalpresentdesc'];
if (isset($_POST['nutritiondesc'])) 
    $json_data['nutritiondesc'] = $_POST['nutritiondesc'];
if (isset($_POST['onschedualtime'])) 
    $json_data['onschedualtime'] = $_POST['onschedualtime'];
if (isset($_POST['personalapperance']))
    $json_data['personalapperance'] = $_POST['personalapperance'];
if (isset($_POST['receiveal'])) 
    $json_data['receiveal'] = $_POST['receiveal'];
if (isset($_POST['requests'])) 
    $json_data['requests'] = $_POST['requests'];
if (isset($_POST['treatmentsatis'])) 
    $json_data['treatmentsatis'] = $_POST['treatmentsatis'];
if (isset($_POST['whopresentdesc'])) 
    $json_data['whopresentdesc'] = $_POST['whopresentdesc'];
if (isset($_POST['updempn'])) {
    $json_data['updempn'] = $_POST['updempn'];
    $updempn = $_POST['updempn'];
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
if (isset($_POST['updUserId'])) {
    $json_data['updUserId'] = $_POST['updUserId'];
    $updUserId = $_POST['updUserId'];
}
if (isset($_POST['empprof'])) {
    $json_data['empprof'] = $_POST['empprof'];
    $empprof = $_POST['empprof'];
}

if ($sigData != "" && $updUserId != "" && $updempn != "" 
    && $metupalnumber != "" && $empprof != "" && $vid != "" ){

    $apiKeyStr = 'api4webapp!updt';
    $apiKey = strtr(base64_encode($apiKeyStr), '+/=', '-_,');
    $apiKeyParam = "apiKey=".$apiKey;

    //echo $apiKey ;

    $apiFile="update_visit.php";
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
