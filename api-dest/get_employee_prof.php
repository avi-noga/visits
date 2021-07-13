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
if (!isset($_REQUEST['apiKey']) || is_null($_REQUEST['apiKey']) || $strd!='api4webapp!prof') return;
header('Content-Type: application/json; charset=windows-1255');

require '../../webapps/connect.visits.php';

$sql = "SELECT `employee`.`fname` AS EMP_FNAME,`employee`.`lname` AS EMP_LNAME, 
        CONCAT(TRIM(`employee`.`idnum`),TRIM(`employee`.`idnumsec`)) AS EMP_IDNUM,
        `employee`.`empnumber` AS EMP_NUMBER,
        `branch`.`BRANCHID` AS EMP_BRANCHID,
        `branch`.`branchname` AS EMP_BRANCHNAME,
        `employee`.`PROFESSION_PROFESSIONID` AS EMP_PROFID,
        `employee_profession`.`PROFESSIONDESC` AS EMP_PROF_DESC
        FROM `employee` , `branch` , `employee_profession`
        WHERE `employee`.`DUPLICATEDRECORD` = 0 
        AND `employee`.`BRANCH_BRANCHID` = `branch`.`BRANCHID`
        AND `employee`.`CURRENTSTATUS_STATUSID` = 1 
        AND `employee`.`PROFESSION_PROFESSIONID` = `employee_profession`.`PROFESSIONID`";
if (isset($_POST['profind'])){
    $sql = $sql . " AND `employee_profession`.`PROFESSIONID`!=3 ";
} 
$sql = $sql . "ORDER BY `branch`.`branchid`,`employee`.`empnumber` ";

if(!$result = $conn->query($sql)){
    echo  'There was an error running the query [' . $conn->error . ']';

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
        $myObj->EMP_FNAME = $blist[$i]['EMP_FNAME'];
        $myObj->EMP_LNAME = $blist[$i]['EMP_LNAME'];
        $myObj->EMP_IDNUM = $blist[$i]['EMP_IDNUM'];
        $myObj->EMP_NUMBER = $blist[$i]['EMP_NUMBER'].'';
        $myObj->EMP_BRANCHID = $blist[$i]['EMP_BRANCHID'].'';
        $myObj->EMP_BRANCHNAME = $blist[$i]['EMP_BRANCHNAME'];
        $myObj->EMP_PROFID = $blist[$i]['EMP_PROFID'].'';
        $myObj->EMP_PROF_DESC = $blist[$i]['EMP_PROF_DESC'];

        $newArr[] = $myObj;
    }

    $myJSON = json_encode($newArr, JSON_PRETTY_PRINT);

} else if ($len1==0){
    $myObj= (object) null;
    $myObj->resStatus = -1;
    $myObj->resStatusDesc = 'no values';
    $myJSON = json_encode($myObj);

} 

$conn->close();

echo $myJSON;

?>
