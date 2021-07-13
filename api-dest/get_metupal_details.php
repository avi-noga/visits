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
if (!isset($_REQUEST['apiKey']) || is_null($_REQUEST['apiKey']) || $strd!='api4webapp!custdet') return;
header('Content-Type: application/json; charset=windows-1255');

require '../../webapps/connect.visits.php';

if (isset($_POST['metnum'])){

    $sql = "SELECT `metupal`.`METUPALNUMBER`,
	   `metupal`.`ADDRESS`,
       `metupal`.`ADDRESS2`,
       `metupal`.`CITY`,
       `metupal`.`CITYPART`,
       `metupal`.`EMAIL`,
       `metupal`.`FNAME`,
       `metupal`.`LNAME`,
       CONCAT(TRIM(`metupal`.`IDNUM`),TRIM(`metupal`.`IDNUMSEC`)) AS MIDNUM,
       `metupal`.`BRANCH_BRANCHID`,
       (SELECT `branch`.`BRANCHNAME` FROM `branch` WHERE `branch`.`BRANCHID` = `metupal`.`BRANCH_BRANCHID`) AS BRANCHNAME,
       `metupal`.`VINSVISITNEEDED`,
       `metupal`.`VINSVISITCOORDINATE`,
       `metupal`.`VINSALTERNATE`,
       `metupal`.`VINSSOCIALWORKERONLY`,
       `metupal`.`VINSVISITFREQUENCY_FREQUENCYID`,
       `metupal`.`VINSINSPECTORTYPENEEDED_PROFESSIONID`,
       `metupal`.`VINSEMPLOYEEVISITTYPE_EMPNUMBER`,
       `metupal`.`VINSEMPLOYEEBAKARALTERNAT_EMPNUMBER`,
       (SELECT DATE(`metupal_visits`.`VISITDATE`) FROM `metupal_visits` 
        WHERE `metupal_visits`.`VISITID` = `metupal`.`LASTVISIT_VISITID`) AS LAST_VISIT_DATE
FROM `metupal` 
WHERE `metupal`.`DUPLICATEDRECORD` = 0
AND `metupal`.`CURRENTSTATUS_STATUSID` =1 
AND `metupal`.`METUPALNUMBER` = ".$_POST['metnum'];

    if(!$result = $conn->query($sql)){
        echo  'There was an error running the query [' . $conn->error . ']';
        $myObj= (object) null;
        $myObj->resStatus = $conn->errno;
        $myObj->resStatusDesc = $conn->error;
        $myJSON = json_encode($myObj);
    }

    $len1 = 0;
    $len1 = $result->num_rows;

    if ($len1>=1){

        $blist = array();
        while($row =mysqli_fetch_assoc($result))
        {
            $blist[] = $row;
        }

        for ($i=0; $i<$len1; $i++) {
            $myObj= (object) null;
            $myObj->METUPALNUMBER = $blist[$i]['METUPALNUMBER'].'';
            $myObj->LAST_VISIT_DATE = $blist[$i]['LAST_VISIT_DATE'].'';
            $myObj->ADDRESS = $blist[$i]['ADDRESS'];
            $myObj->ADDRESS2 = $blist[$i]['ADDRESS2'];
            $myObj->CITY = $blist[$i]['CITY'];
            $myObj->CITYPART = $blist[$i]['CITYPART'];
            $myObj->EMAIL = $blist[$i]['EMAIL'];
            $myObj->FNAME = $blist[$i]['FNAME'];
            $myObj->LNAME = $blist[$i]['LNAME'];
            $myObj->MIDNUM = $blist[$i]['MIDNUM'];
            $myObj->BRANCH_BRANCHID = $blist[$i]['BRANCH_BRANCHID'].'';
            $myObj->BRANCHNAME = $blist[$i]['BRANCHNAME'];
            $myObj->VINSEMPLOYEEVISITTYPE_EMPNUMBER = $blist[$i]['VINSEMPLOYEEVISITTYPE_EMPNUMBER'].'';
            $myObj->VINSEMPLOYEEBAKARALTERNAT_EMPNUMBER = $blist[$i]['VINSEMPLOYEEBAKARALTERNAT_EMPNUMBER'].'';
            $mySubObj->LAST_VISIT_DATE = $bsublist[$i]['LAST_VISIT_DATE'];

            if (isset($_POST['visitdate'])){
                
                $sqldetass = "
                SELECT vw_all.ASSIGN_EMP,vw_all.ASSIGN_EMP_NAME,vw_all.ASSIGN_WEEKDAYNUMBER,
                vw_all.ASSIGN_WEEKDAY,
                vw_all.SCHED_FROM1,vw_all.SCHED_TO1,
                vw_all.SCHED_FROM2,vw_all.SCHED_TO2,vw_all.VISIT_TIME 
                FROM (SELECT DISTINCT 
                `metupal_treatment_assign`.`EMPLOYEE_EMPNUMBER` AS ASSIGN_EMP,
                CONCAT(`employee`.`FNAME`,' ', `employee`.`LNAME`) AS ASSIGN_EMP_NAME,
                `metupal_treatment_assign_schedule`.`WEEKDAYNUMBER` AS ASSIGN_WEEKDAYNUMBER,
                `metupal_treatment_assign_schedule`.`WEEKDAY` AS ASSIGN_WEEKDAY,
                
                (CASE WHEN LENGTH(`metupal_treatment_assign_schedule`.`HFROM1`) = 1 THEN CONCAT('0',`metupal_treatment_assign_schedule`.`HFROM1`,'00') 
                WHEN LENGTH(`metupal_treatment_assign_schedule`.`HFROM1`) = 2 THEN 
                CONCAT(`metupal_treatment_assign_schedule`.`HFROM1`,'00') 
                WHEN LENGTH(`metupal_treatment_assign_schedule`.`HFROM1`) = 3 THEN 
                CONCAT('0',`metupal_treatment_assign_schedule`.`HFROM1`) ELSE 
                `metupal_treatment_assign_schedule`.`HFROM1` END) AS SCHED_FROM1,
                
                (CASE WHEN LENGTH(`metupal_treatment_assign_schedule`.`HTO1`) = 1 THEN CONCAT('0',`metupal_treatment_assign_schedule`.`HTO1`,'00') 
                WHEN LENGTH(`metupal_treatment_assign_schedule`.`HTO1`) = 2 THEN 
                CONCAT(`metupal_treatment_assign_schedule`.`HTO1`,'00') 
                WHEN LENGTH(`metupal_treatment_assign_schedule`.`HTO1`) = 3 THEN 
                CONCAT('0',`metupal_treatment_assign_schedule`.`HTO1`) ELSE 
                `metupal_treatment_assign_schedule`.`HTO1` END) AS SCHED_TO1,
                
                (CASE WHEN LENGTH(`metupal_treatment_assign_schedule`.`HFROM2`) = 1 THEN CONCAT('0',`metupal_treatment_assign_schedule`.`HFROM2`,'00') 
                WHEN LENGTH(`metupal_treatment_assign_schedule`.`HFROM2`) = 2 THEN 
                CONCAT(`metupal_treatment_assign_schedule`.`HFROM2`,'00') 
                WHEN LENGTH(`metupal_treatment_assign_schedule`.`HFROM2`) = 3 THEN 
                CONCAT('0',`metupal_treatment_assign_schedule`.`HFROM2`) ELSE 
                `metupal_treatment_assign_schedule`.`HFROM2` END) AS SCHED_FROM2,
                
                (CASE WHEN LENGTH(`metupal_treatment_assign_schedule`.`HTO2`) = 1 THEN CONCAT('0',`metupal_treatment_assign_schedule`.`HTO2`,'00') 
                WHEN LENGTH(`metupal_treatment_assign_schedule`.`HTO2`) = 2 THEN 
                CONCAT(`metupal_treatment_assign_schedule`.`HTO2`,'00') 
                WHEN LENGTH(`metupal_treatment_assign_schedule`.`HTO2`) = 3 THEN 
                CONCAT('0',`metupal_treatment_assign_schedule`.`HTO2`) ELSE 
         `metupal_treatment_assign_schedule`.`HTO2` END) AS SCHED_TO2,
         
         TIME('".$_POST['visitdate']."') AS VISIT_TIME,
         
          (SELECT DATE(`metupal_visits`.`VISITDATE`) FROM `metupal_visits` 
        WHERE `metupal_visits`.`VISITID` = `metupal`.`LASTVISIT_VISITID`) AS LAST_VISIT_DATE
        
         FROM `metupal` ,`metupal_treatment_assign` , `metupal_treatment_order`,`employee` ,
`common_institution`,`metupal_treatment_assign_schedule` 
WHERE `metupal`.`DUPLICATEDRECORD` = 0
AND `metupal_treatment_assign_schedule`.`TREATMENT_ASSIGN_ID` = `metupal_treatment_assign`.`RECORDID` 
AND `metupal_treatment_assign_schedule`.`WEEKDAYNUMBER` = DAYOFWEEK('".$_POST['visitdate']."') 
AND `metupal_treatment_order`.`INSTITUTION_INSTITUTIONID` = `common_institution`.`INSTITUTIONID` 
AND `common_institution`.`CATEGORY_CATEGORYID` = 1 
AND `metupal`.`CURRENTSTATUS_STATUSID` =1 
AND `employee`.`EMPNUMBER` = `metupal_treatment_assign`.`EMPLOYEE_EMPNUMBER` 
AND `metupal_treatment_order`.`METOPAL_METUPALNUMBER` = `metupal`.`METUPALNUMBER` 
AND `metupal_treatment_assign`.`ORDER_RECORDID` = `metupal_treatment_order`.`RECORDID`
AND `metupal`.`METUPALNUMBER` = ".$_POST['metnum']. " 
AND `metupal_treatment_assign`.`FROMDATE` < '".$_POST['visitdate']. "'
AND ( `metupal_treatment_assign`.`TODATE` IS NULL OR  `metupal_treatment_assign`.`TODATE` > '".$_POST['visitdate']."' ) 
AND `metupal_treatment_assign`.`MONTHDATE` = 
DATE(DATE_SUB('".$_POST['visitdate']."',INTERVAL DAYOFMONTH('".$_POST['visitdate']."')-1 DAY))) vw_all";

                if(!$resultsub = $conn->query($sqldetass)){
                    echo  'There was an error running the query det ass [' . $conn->error . ']';
                    $mySubObj= (object) null;
                    $mySubObj->resStatus = $conn->errno;
                    $mySubObj->resStatusDesc = $conn->error;
                    $newSubArrAssign[] = $mySubObj;
                }

                $lensub = 0;
                $lensub = $resultsub->num_rows;

                if ($lensub>=1){

                    $bsublist = array();
                    while($subrow =mysqli_fetch_assoc($resultsub))
                    {
                        $bsublist[] = $subrow;
                    }
                    $flagVisitOnSched = 0;
                    for ($j=0; $j<$lensub; $j++) {
                        
                        $mySubObj= (object) null;
                        $mySubObj->ASSIGN_EMP = $bsublist[$j]['ASSIGN_EMP'];
                        $mySubObj->ASSIGN_EMP_NAME = $bsublist[$j]['ASSIGN_EMP_NAME'];
                        $mySubObj->SCHED_FROM1 = $bsublist[$j]['SCHED_FROM1'];
                        $mySubObj->SCHED_TO1 = $bsublist[$j]['SCHED_TO1'];
                        $mySubObj->SCHED_FROM2 = $bsublist[$j]['SCHED_FROM2'];
                        $mySubObj->SCHED_TO2 = $bsublist[$j]['SCHED_TO2'];
                        $mySubObj->ASSIGN_WEEKDAY = $bsublist[$j]['ASSIGN_WEEKDAY'];
                        
                        $mySubObj->VISIT_TIME = $bsublist[$j]['VISIT_TIME'];
                        if ($flagVisitOnSched ==0){
                            if ((strtotime($bsublist[$j]['VISIT_TIME'])>
                                strtotime($bsublist[$j]['SCHED_FROM1']) && 
                                strtotime($bsublist[$j]['VISIT_TIME'])<
                                strtotime($bsublist[$j]['SCHED_TO1'])
                               ) || 
                               (strtotime($bsublist[$j]['VISIT_TIME'])>
                                strtotime($bsublist[$j]['SCHED_FROM2']) && 
                                strtotime($bsublist[$j]['VISIT_TIME'])<
                                strtotime($bsublist[$j]['SCHED_TO2'])
                               )){
                                $flagVisitOnSched =1;
                            }
                        }
                        $mySubObj->ASSIGN_ON_VISIT = $flagVisitOnSched;
                        $newSubArrAssign[] = $mySubObj;
                    }
                                        
                }
                if (count($newSubArrAssign) >0){
                    $myObj->ASSIGN_LIST = $newSubArrAssign;
                } else {
                    $myObj->ASSIGN_LIST = '';
                }
                
                $sqldethos = "
                SELECT (SELECT `metupal_hospitals`.`HNAME` 
                FROM `metupal_hospitals` WHERE `metupal_hospitals`.`HOSPITALID` = `metupal_hospitalizations`.`HNAME_HOSPITALID`) AS HOS_NAME,
                `metupal_hospitalizations`.`FROMDATE` AS HOS_FROMDATE,
                `metupal_hospitalizations`.`TODATE` AS HOS_TODATE,
                `metupal_hospitalizations`.`COMMENT` AS HOS_COMMENT,
        `metupal_hospitalization_type`.`HOSPITALIZETYPE` AS HOS_TYPE,
        DATE('".$_POST['visitdate']."') AS VISIT_DATE
         FROM `metupal_hospitalizations` ,`metupal_hospitalization_type`
WHERE 
`metupal_hospitalization_type`.`HOSPITALIZETYPECODE` = `metupal_hospitalizations`.`HOSPITALIZETYPE_HOSPITALIZETYPECODE`
AND `metupal_hospitalizations`.`METUPAL_METUPALNUMBER` = ".$_POST['metnum']. " 
AND TIMESTAMPDIFF(DAY,'".$_POST['visitdate']."', 
`metupal_hospitalizations`.`FROMDATE`) < 62
ORDER BY `metupal_hospitalizations`.`FROMDATE` DESC  ";

                if(!$resultsub = $conn->query($sqldethos)){
                    echo  'There was an error running the query det hosp [' . $conn->error . ']';
                    $mySubObj= (object) null;
                    $mySubObj->resStatus = $conn->errno;
                    $mySubObj->resStatusDesc = $conn->error;
                    $newSubArrHos[] = $mySubObj;
                }

                $lensub = 0;
                $lensub = $resultsub->num_rows;

                if ($lensub>=1){

                    $bsublist = array();
                    while($subrow =mysqli_fetch_assoc($resultsub))
                    {
                        $bsublist[] = $subrow;
                    }
                    $flagVisitOnHos = 0;
                    for ($j=0; $j<$lensub; $j++) {
                        
                        $mySubObj= (object) null;
                        $mySubObj->HOS_NAME = $bsublist[$j]['HOS_NAME'];
                        $mySubObj->HOS_FROMDATE = $bsublist[$j]['HOS_FROMDATE'];
                        $mySubObj->HOS_TODATE = $bsublist[$j]['HOS_TODATE'];
                        $mySubObj->HOS_COMMENT = $bsublist[$j]['HOS_COMMENT'];
                        $mySubObj->HOS_TYPE = $bsublist[$j]['HOS_TYPE'];
                        
                        $mySubObj->VISIT_DATE = $bsublist[$j]['VISIT_DATE'];
                        if ($flagVisitOnHos ==0){
                            if ((strtotime($bsublist[$j]['VISIT_TIME'])>
                                strtotime($bsublist[$j]['HOS_FROMDATE']) && 
                                (strtotime($bsublist[$j]['VISIT_TIME'])<
                                strtotime($bsublist[$j]['HOS_TODATE']) ||
                                is_null($bsublist[$j]['HOS_TODATE']))) ){
                                $flagVisitOnHos =1;
                            }
                        }
                        $mySubObj->HOS_ON_VISIT = $flagVisitOnHos;
                        $newSubArrHos[] = $mySubObj;
                    }
                                        
                }
                if (count($newSubArrHos) >0){
                    $myObj->HOSPITAL_LIST = $newSubArrHos;
                } else {
                    $myObj->HOSPITAL_LIST = '';
                }
                
            } else {
                $myObj->ASSIGN_LIST = '';
                $myObj->HOSPITAL_LIST = '';
            }

            $newArr[] = $myObj;
        }

        $myJSON = json_encode($newArr);

    } else if ($len1==0){
        $myObj= (object) null;
        $myObj->resStatus = -1;
        $myObj->resStatusDesc = 'no values';
        $myJSON = json_encode($myObj);

    } 
} else {
    $myObj= (object) null;
    $myObj->resStatus = -1;
    $myObj->resStatusDesc = 'no bakarnum or empbranch ';
    $myJSON = json_encode($myObj);
}

$conn->close();

echo $myJSON;

?>