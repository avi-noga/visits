<?php
include "../../webapps/config.visits.php";


//$empnum = $_POST['empnum'];

//if ($username != "" && $password != "" && $empnum != ""){

    $apiKeyStr = 'api4webapp!line';
    $apiKey = strtr(base64_encode($apiKeyStr), '+/=', '-_,');
    $apiKeyParam = "apiKey=".$apiKey;

    //echo $apiKey ;

    //$json_data = array(
    //    'username' => $username,
    //    'password' => $password,
    //    'empnum' => $empnum
    //);
    
    $apiFile="get_metupal_visit_line_option.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$urlRemote."/".$apiFile."?".$apiKeyParam);
    //curl_setopt($ch, CURLOPT_POST, 1);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
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
