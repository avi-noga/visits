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
if (!isset($_REQUEST['apiKey']) || is_null($_REQUEST['apiKey']) || $strd!='api4webapp!appendnv') return;
header('Content-Type: application/json');

require '../../webapps/connect.visits.php';

$sqlLastVisit = "SELECT 
DATE_FORMAT(`metupal_visits`.`visitDate`,'%Y-%m-%d') AS LAST_VISIT_DATE,
DATE_FORMAT(`metupal_visits`.`visitDate`,'%Y-%m-%d %H:%i') AS LAST_FULL_VISIT_DATE  
FROM `metupal_visits` 
WHERE `metupal_visits`.`METUPALVISIT_METUPALNUMBER` = ".$_POST['metupalnumber']." 
AND `metupal_visits`.`REASONNOTOCCURRED_REASONID` IS NULL 
ORDER BY `metupal_visits`.`visitDate` DESC LIMIT 1";


if(!$result = $conn->query($sqlLastVisit)){
    echo  'There was an error running the sqlLastVisit [' . $conn->error . ']';
}
global $rowLastVisitStr;
global $rowLastVisitFullStr;

$len1 = 0;
$len1 = $result->num_rows;
$rowLastVisit = $result->fetch_assoc(); 
$lastVisitExists = false;
if ($len1 != 0 && (!is_null($rowLastVisit['LAST_VISIT_DATE']))) {
    $rowLastVisitStr = "'".$rowLastVisit['LAST_VISIT_DATE']."'";
    $rowLastVisitFullStr = $rowLastVisit['LAST_FULL_VISIT_DATE'];
    $lastVisitExists = true;
} 

?>

<?php

$sql ="";
$myObj= (object) null;

$sql = "INSERT INTO `metupal_visits` (`VISITID`, ";
if ($lastVisitExists) { $sql = $sql."`LASTVISITDATE`,"; }
$sql = $sql."`VISITDATE`, 
							  `EMPLOYEEVISIT_EMPNUMBER`, 
							  `METUPALVISIT_METUPALNUMBER`, 
							  `EMPLOYEEPROF_PROFESSIONID`, 
							  `REASONNOTOCCURRED_REASONID`,
							  `VINITDATE`, 
							  `VINITUSER_USERID`,
                              `FROMVISITWEBAPP`) 
							  VALUES (NULL, ";/*VISITID*/
if ($lastVisitExists) { $sql = $sql.$rowLastVisitStr.","; }
/*LASTVISITDATE*/
$sql = $sql."'".$_POST['visitDate']."'/*CURRENT_TIMESTAMP()*/, /*VISITDATE*/
									 ".$_POST['empnumber'].", /*EMPLOYEEVISIT_EMPNUMBER*/
									  ".$_POST['metupalnumber'].", /*METUPALVISIT_METUPALNUMBER*/
									  ".$_POST['professionid'].", /*EMPLOYEEPROF_PROFESSIONID*/
									  ".$_POST['reasonNotOcc'].", /*REASONNOTOCCURRED_REASONID*/
									  CURRENT_TIMESTAMP(), /*VINITDATE*/
									  ".$_POST['userid'].", /*VINITUSER_USERID*/
									  1) "; /*FROMVISITWEBAPP*/


if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $myObj->visitId = $last_id.'';
    $myObj->resStatus = 0;
    $myObj->resStatusDesc = 'OK';
} else {
    $myObj->visitId = 0;
    $myObj->resStatus = $conn->errno;
    $myObj->resStatusDesc = $conn->error;
}

$conn->close();

$myJSON = json_encode($myObj);
echo $myJSON;

?>