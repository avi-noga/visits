<?php
include "../../webapps/config.visits.php";


$json_data = array();
if (isset($_POST['metnum'])) {
    $json_data['metnum'] = $_POST['metnum'];
}
if (isset($_POST['visitdate'])) {
    $json_data['visitdate'] = $_POST['visitdate'];
}

if (isset($_POST['metnum'])){

    $apiKeyStr = 'api4webapp!custdet';
    $apiKey = strtr(base64_encode($apiKeyStr), '+/=', '-_,');
    $apiKeyParam = "apiKey=".$apiKey;

    //echo $apiKey ;

    $apiFile="get_metupal_details.php";
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
