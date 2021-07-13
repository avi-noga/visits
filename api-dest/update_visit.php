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
if (!isset($_REQUEST['apiKey']) || is_null($_REQUEST['apiKey']) || $strd!='api4webapp!updt') return;
header('Content-Type: application/json');

require '../../webapps/connect.visits.php';

$sql ="";
$myObj= (object) null;

if (isset($_POST['empprof']) && $_POST['empprof']=='3') {
    $sql = "UPDATE `metupal_visits` v 
        SET v.`SIGNATURE`                 = '".urlencode($_POST['sigData'])."',
            v.`EMPLOYEEVISIT_EMPNUMBER`   = ".$_POST['updempn']. ",
            v.`VUPDTDATE`                 = CURRENT_TIMESTAMP(), 
            v.`VUPDTUSER_USERID`          = ".$_POST['updUserId']. ",
            v.`CHANGESSINCELASTVISITDESC` = '".$_POST['changes']."',
            v.`DIFFICULTIESINTREATMENT`   = '".$_POST['difficulties']."',
			v.`GENERALIMPRESTION`         = '".$_POST['generalimp']."',
            v.`HOMEDESC`                  = '".$_POST['homedesc']."',
            v.`METUPALLIVEALONE`          = ".$_POST['metupallivealone'].",
            v.`VISITEXCEPTIONEXISTS`      = ".$_POST['visitexceptionexists'].",
            v.`METUPALPRESENT`            = ".$_POST['metupalpresent'].",
            v.`METUPALPRESENTDESC`        = '".$_POST['metupalpresentdesc']."',
            v.`NUTRITIONDESC`             = '".$_POST['nutritiondesc']."',
            v.`ONSCHEDUALTIME`            = ".$_POST['onschedualtime'].",
            v.`PERSONALAPPERANCEDESC` 	  = '".$_POST['personalapperance']."',
            v.`RECEIVEALLORDERHOURS`      = '".$_POST['receiveal']."',
            v.`REQUESTS`                  = '".$_POST['requests']."',
            v.`TREATMENTSATISFACTIONDESC` = '".$_POST['treatmentsatis']."',
            v.`WHOPRESENTDESC`            = '".$_POST['whopresentdesc']."',
            v.`METAPELNAME`               = '".$_POST['metapelname']."'
        WHERE v.visitid = ".$_POST['vid'];
} else {
    $sql = "UPDATE `metupal_visits` v 
        SET v.`SIGNATUREUPDATER` = '".urlencode($_POST['sigData'])."',
            v.`EMPLOYEEVISITUPDATER_EMPNUMBER` = ".$_POST['updempn']. ",
            v.`VUPDTDATE` = CURRENT_TIMESTAMP(), 
            v.`VUPDTUSER_USERID` = ".$_POST['updUserId']. ",
            v.`CHANGESSINCELASTVISITDESC` = '".$_POST['changes']."',
            v.`DIFFICULTIESINTREATMENT`   = '".$_POST['difficulties']."',
			v.`GENERALIMPRESTION`         = '".$_POST['generalimp']."',
            v.`HOMEDESC`                  = '".$_POST['homedesc']."',
            v.`METUPALLIVEALONE`          = ".$_POST['metupallivealone'].",
            v.`VISITEXCEPTIONEXISTS`      = ".$_POST['visitexceptionexists'].",
            v.`METUPALPRESENT`            = ".$_POST['metupalpresent'].",
            v.`METUPALPRESENTDESC`        = '".$_POST['metupalpresentdesc']."',
            v.`NUTRITIONDESC`             = '".$_POST['nutritiondesc']."',
            v.`ONSCHEDUALTIME`            = ".$_POST['onschedualtime'].",
            v.`PERSONALAPPERANCEDESC` 	  = '".$_POST['personalapperance']."',
            v.`RECEIVEALLORDERHOURS`      = '".$_POST['receiveal']."',
            v.`REQUESTS`                  = '".$_POST['requests']."',
            v.`TREATMENTSATISFACTIONDESC` = '".$_POST['treatmentsatis']."',
            v.`WHOPRESENTDESC`            = '".$_POST['whopresentdesc']."',
            v.`METAPELNAME`               = '".$_POST['metapelname']."'
        WHERE v.visitid = ".$_POST['vid'];
}

if ($conn->query($sql) === TRUE) {
    $myObj->resStatus = 0;
    $myObj->resStatusDesc = 'OK';
} else {
    $myObj->resStatus = $conn->errno;
    $myObj->resStatusDesc = $conn->error;
}

$conn->close();

$myJSON = json_encode($myObj);
echo $myJSON;


?>