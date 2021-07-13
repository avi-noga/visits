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
if (!isset($_REQUEST['apiKey']) || is_null($_REQUEST['apiKey']) || $strd!='api4webapp!cust') return;
header('Content-Type: application/json; charset=windows-1255');

require '../../webapps/connect.visits.php';

if (isset($_POST['bakarnum']) || isset($_POST['empbranch'])){
    
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
       `metupal`.`VINSEMPLOYEEBAKARALTERNAT_EMPNUMBER`
FROM `metupal` 
WHERE `metupal`.`DUPLICATEDRECORD` = 0
AND `metupal`.`CURRENTSTATUS_STATUSID` =1 ";
if (isset($_POST['bakarnum'])){
    $sql = $sql . "AND (`metupal`.`VINSEMPLOYEEVISITTYPE_EMPNUMBER` = ".$_POST['bakarnum']." 
    OR `metupal`.`VINSEMPLOYEEBAKARALTERNAT_EMPNUMBER` = ".$_POST['bakarnum'].") ";
} 
if (isset($_POST['empbranch'])){    
    $sql=$sql." AND `metupal`.`BRANCH_BRANCHID` =".$_POST['empbranch']." ";
}  

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