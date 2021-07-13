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
if (!isset($_REQUEST['apiKey']) || is_null($_REQUEST['apiKey']) || $strd!='api4webapp!vlimit') return;
header('Content-Type: text/html; charset=windows-1255');

require '../../webapps/connect.visits.php';

$metnum = mysqli_real_escape_string($conn,$_POST['metnum']);
$empnum = mysqli_real_escape_string($conn,$_POST['empnum']);
$visitdate = mysqli_real_escape_string($conn,$_POST['visitdate']);

if ($metnum != "" && $empnum != "" && $visitdate != ""){

    $sql = "SELECT IFNULL((SELECT DISTINCT 1 FROM `metupal_hospitalizations`
               WHERE `metupal_hospitalizations`.`METUPAL_METUPALNUMBER`= `metupal`.`METUPALNUMBER`
               AND `metupal_hospitalizations`.`HOSPITALIZETYPE_HOSPITALIZETYPECODE` IN ('HOS','HXS','XXX')  
              AND `metupal_hospitalizations`.`FROMDATE` < '".$visitdate."'
              AND (`metupal_hospitalizations`.`TODATE` > '".$visitdate."' OR `metupal_hospitalizations`.`TODATE` IS NULL)  ),0) AS HOS_EXISTS,
              IFNULL((SELECT DISTINCT 1 FROM `metupal_visits`
               WHERE `metupal_visits`.`METUPALVISIT_METUPALNUMBER`= `metupal`.`METUPALNUMBER`
               AND `metupal_visits`.`REASONNOTOCCURRED_REASONID` IS NULL 
              AND DATE(`metupal_visits`.`VISITDATE`) = DATE('".$visitdate."')),0) AS VISIT_METUPAL_EXISTS,
              IFNULL((SELECT DISTINCT 1 FROM `metupal_visits`
               WHERE `metupal_visits`.`EMPLOYEEVISIT_EMPNUMBER`= `employee`.`EMPNUMBER`
              AND `metupal_visits`.`REASONNOTOCCURRED_REASONID` IS NULL 
              AND DATE(`metupal_visits`.`VISITDATE`) = DATE('".$visitdate."')
              AND TIMESTAMPDIFF(MINUTE, `metupal_visits`.`VISITDATE`, '".$visitdate."') <=10),0) AS VISIT_EMPLOYEE_EXISTS,
			  IFNULL((SELECT DISTINCT 1 
                      FROM `metupal_visits` 
                      WHERE `metupal`.`LASTVISIT_VISITID` =`metupal_visits`.`VISITID` 
                      AND TIMESTAMPDIFF(DAY, `metupal_visits`.`VISITDATE`, '".$visitdate."') > 62),0) AS VISIT_FREQ_IND               
FROM `employee`,`metupal`
WHERE `metupal`.`METUPALNUMBER` = ".$metnum." 
AND `employee`.`EMPNUMBER` = ".$empnum. " 
AND `metupal`.duplicatedRecord = 0";

    $result = mysqli_query($conn,$sql);

    if(!$result = $conn->query($sql)){
        echo  'There was an error running the query [' . $conn->error . ']';
        $myObj= (object) null;
        $myObj-> HOS_EXISTS = 0;
        $myObj-> VISIT_METUPAL_EXISTS = 0;
        $myObj-> VISIT_EMPLOYEE_EXISTS = 0;
        $myObj-> VISIT_FREQ_IND = 0;
        $myObj->resStatus = $conn->errno;
        $myObj->resStatusDesc = $conn->error;
        $myJSON = json_encode($myObj);
    }

    $len1 = 0;
    $len1 = $result->num_rows;

    if ($len1>=1){
        $row = mysqli_fetch_array($result);
        
        $myObj= (object) null;
        $myObj-> HOS_EXISTS = $row['HOS_EXISTS'];
        $myObj-> VISIT_METUPAL_EXISTS = $row['VISIT_METUPAL_EXISTS'];
        $myObj-> VISIT_EMPLOYEE_EXISTS = $row['VISIT_EMPLOYEE_EXISTS'];
        $myObj-> VISIT_FREQ_IND = $row['VISIT_FREQ_IND'];
        $myObj->resStatus = 0;
        $myObj->resStatusDesc = 'OK';
    } else if ($len1==0){
        $myObj= (object) null;
        $myObj-> HOS_EXISTS = 0;
        $myObj-> VISIT_METUPAL_EXISTS = 0;
        $myObj-> VISIT_EMPLOYEE_EXISTS = 0;
        $myObj-> VISIT_FREQ_IND = 0;
        $myObj->resStatus = -1;
        $myObj->resStatusDesc = 'no values';
        $myJSON = json_encode($myObj);

    } 

    $conn->close();

    $myJSON = json_encode($myObj);

    echo $myJSON;

}