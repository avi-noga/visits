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
if (!isset($_REQUEST['apiKey']) || is_null($_REQUEST['apiKey']) || $strd!='api4webapp!append') return;
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


$sql = "INSERT INTO `metupal_visits` (`VISITID`, 
							  `CHANGESSINCELASTVISITDESC`, 
							  `DIFFICULTIESINTREATMENT`, 
							  `GENERALIMPRESTION`, 
							  `HOMEDESC`,";
if ($lastVisitExists) { $sql = $sql."`LASTVISITDATE`,"; }
$sql = $sql."`METUPALLIVEALONE`, 
							  `VISITEXCEPTIONEXISTS`, 
							  `NUMOFTREATMENTHOURS`, 
							  `NUMOFHOSPITALIZATIONDAYS`, 
							  `MOBILITYACCESSORIES`, 
							  `METUPALPRESENT`, 
							  `METUPALPRESENTDESC`, 
							  `NUTRITIONDESC`, 
							  `ONSCHEDUALTIME`, 
							  `PERSONALAPPERANCEDESC`, 
							  `RECEIVEALLORDERHOURS`, 
							  `REQUESTS`, 
							  `TREATMENTSATISFACTIONDESC`, 
							  `VISITDATE`, 
							  `WHOPRESENTDESC`, 
							  `SEMECHORDERDESC`, 
							  `SEMECHACTIONDESC`, 
							  `SEMECHSUMMERYDESC`, 
							  `SEMECHFAMILYREPORTDESC`, 
							  `SEMECHVISIT`, 
							  `EMPLOYEEVISIT_EMPNUMBER`, 
							  `METUPALVISIT_METUPALNUMBER`,"; 
			if (isset($_POST['employeevisitupdater'])) { $sql = $sql."`EMPLOYEEVISITUPDATER_EMPNUMBER`,"; }
            $sql = $sql."`EMPLOYEEPROF_PROFESSIONID`, 
							  `REASONNOTOCCURRED_REASONID`, 
							  `SIGNATURE`, 
							  `SIGNATUREUPDATER`, 
							  `PHONECALLVISITIND`, 
							  `METAPELNAME`, 
							  `VINITDATE`, 
							  `VINITUSER_USERID`, 
							  `VUPDTDATE`, 
							  `VUPDTUSER_USERID`,
                              `FROMVISITWEBAPP`) 
							  VALUES (NULL, /*VISITID*/
									  '".$_POST['changes']."', /*CHANGESSINCELASTVISITDESC*/
									  '".$_POST['difficulties']."', /*DIFFICULTIESINTREATMENT*/
									  '".$_POST['generalimp']."', /*GENERALIMPRESTION*/
									  '".$_POST['homedesc']."',"; /*HOMEDESC*/
if ($lastVisitExists) { $sql = $sql.$rowLastVisitStr.","; }
/*LASTVISITDATE*/
$sql = $sql.$_POST['metupallivealone'].",                                 /*METUPALLIVEALONE*/
									  ".$_POST['visitexceptionexists'].", /*VISITEXCEPTIONEXISTS*/
									  '0', /*NUMOFTREATMENTHOURS*/
									  '0', /*NUMOFHOSPITALIZATIONDAYS*/
									  '0', /*MOBILITYACCESSORIES*/
									  ".$_POST['metupalpresent'].", /*METUPALPRESENT*/
									  '".$_POST['metupalpresentdesc']."', /*METUPALPRESENTDESC*/
									  '".$_POST['nutritiondesc']."', /*NUTRITIONDESC*/
									  ".$_POST['onschedualtime'].", /*ONSCHEDUALTIME*/
									  '".$_POST['personalapperance']."', /*PERSONALAPPERANCEDESC*/
									  '".$_POST['receiveal']."', /*RECEIVEALLORDERHOURS*/
									  '".$_POST['requests']."', /*REQUESTS*/
									  '".$_POST['treatmentsatis']."', /*TREATMENTSATISFACTIONDESC*/				  '".$_POST['visitDate']."'/*CURRENT_TIMESTAMP()*/, /*VISITDATE*/
									  '".$_POST['whopresentdesc']."', /*WHOPRESENTDESC*/
									  NULL, /*SEMECHORDERDESC*/
									  NULL, /*SEMECHACTIONDESC*/
									  NULL, /*SEMECHSUMMERYDESC*/
									  NULL, /*SEMECHFAMILYREPORTDESC*/
									  '0', /*SEMECHVISIT*/
									  ".$_POST['empnumber'].", /*EMPLOYEEVISIT_EMPNUMBER*/
									  ".$_POST['metupalnumber'].","; /*METUPALVISIT_METUPALNUMBER*/
                                      if (isset($_POST['employeevisitupdater'])) { 
                                        $sql = $sql.$_POST['employeevisitupdater'].","; 
                                          /*EMPLOYEEVISITUPDATER_EMPNUMBER*/
                                      }
									  $sql = $sql.$_POST['professionid'].", /*EMPLOYEEPROF_PROFESSIONID111*/
									  NULL, /*REASONNOTOCCURRED_REASONID*/
									  '".urlencode($_POST['sigData'])."', /*SIGNATURE*/
									  NULL, /*SIGNATUREUPDATER*/
									  '0', /*PHONECALLVISITIND*/
									  '".$_POST['metapelname']."', /*METAPELNAME*/
									  CURRENT_TIMESTAMP(), /*VINITDATE*/
									  ".$_POST['userid'].", /*VINITUSER_USERID*/
									  NULL, /*VUPDTDATE*/
									  NULL, /*VUPDTUSER_USERID*/
                                      1) "; /*FROMVISITWEBAPP*/

if ($conn->query($sql) === TRUE) {
    $lastUpd = false;
    $last_id = $conn->insert_id;
    $sqlm = "UPDATE `metupal` SET `metupal`.`LASTVISIT_VISITID` = ".$last_id." 
    WHERE `metupal`.`METUPALNUMBER` = ".$_POST['metupalnumber'];
    if ($lastVisitExists){
        if (strtotime($_POST['visitDate'])>strtotime($rowLastVisitFullStr)){
            if ($conn->query($sqlm) === TRUE) {
                $lastUpd = true;            
            }
        }
    } else {
        if ($conn->query($sqlm) === TRUE) {
            $lastUpd = true;            
        }
    }

    $myObj->visitId = $last_id.'';
    $myObj->resStatus = 0;
    $myObj->lastVisitUpd = $lastUpd;
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