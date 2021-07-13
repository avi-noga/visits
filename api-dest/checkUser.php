<?php

function base64_url_encode($input){
    return strtr(base64_encode($input), '+/=', '-_,');
}

function base64_url_decode($input){
    return base64_decode(strtr($input, '-_,', '+/='));
}

//$stre=base64_url_encode($_REQUEST['apiKey']);
$strd=base64_url_decode($_REQUEST['apiKey']);
error_reporting(E_ERROR | E_PARSE);
if (!isset($_REQUEST['apiKey']) || is_null($_REQUEST['apiKey']) || $strd!='api4webapp!auth') return;
header('Content-Type: text/html; charset=windows-1255');

require '../../webapps/connect.visits.php';


$uname = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$empNumber = mysqli_real_escape_string($conn,$_POST['empnum']);

if ($uname != "" && $password != "" && $empNumber != ""){

    $sql = "select `user`.`userid` as userid from `user` 
    where `user`.`USERNAME`='".$uname."' AND `user`.`USERPASSWORD`='".$password."' AND `user`.`CATEGORY_CATEGORYID` =1 AND EXISTS (SELECT 1 FROM `employee` WHERE `employee`.`EMPNUMBER` = ".$empNumber." 
    AND `employee`.`CURRENTSTATUS_STATUSID` = 1 
    AND `employee`.`PROFESSION_PROFESSIONID` IS NOT NULL
    AND (SELECT `user_category`.`CATEGORYDESC` COLLATE utf8_general_ci FROM `user_category` 
    WHERE `user_category`.`CATEGORYID`=1) LIKE CONCAT('%',`user`.`USERNAME` COLLATE utf8_general_ci,
    '-',`employee`.`IDNUM`,`employee`.`IDNUMSEC`,'%')) " ;

    $result = mysqli_query($conn,$sql);

    if(!$result = $conn->query($sql)){
        echo  'There was an error running the query [' . $conn->error . ']';
        $myObj= (object) null;
        $myObj->userId = 0; 
        $myObj->resStatus = $conn->errno;
        $myObj->resStatusDesc = $conn->error;
        $myJSON = json_encode($myObj);
    }

    $len1 = 0;
    $len1 = $result->num_rows;

    if ($len1>=1){
        $row = mysqli_fetch_array($result);
        $userid = $row['userid'];
        $myObj= (object) null;
        $myObj->userId = $userid; 
        $myObj->resStatus = 0;
        $myObj->resStatusDesc = 'OK';
    } else if ($len1==0){
        $myObj= (object) null;
        $myObj->userId = '0'; 
        $myObj->resStatus = -1;
        $myObj->resStatusDesc = 'no values';
        $myJSON = json_encode($myObj);

    } 

    $conn->close();

    $myJSON = json_encode($myObj);

    echo $myJSON;

}