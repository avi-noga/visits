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
if (!isset($_REQUEST['apiKey']) || is_null($_REQUEST['apiKey']) || $strd!='api4webapp!vlist') return;
header('Content-Type: application/json; charset=windows-1255');

require '../../webapps/connect.visits.php';

$sql ="";
$sqlnum = 0;

if (!isset($_POST['vid'])){
    $sqlnum = 1;
    $sql = "SELECT v.* , m.fname AS MET_FNAME, m.lname AS MET_LNAME, 
        CONCAT(TRIM(m.idnum),TRIM(m.idnumsec)) AS MET_IDNUM,
        (SELECT r.REASONDESC FROM `metupal_visits_reasons` r 
        WHERE r.REASONID = v.REASONNOTOCCURRED_REASONID ) AS REASONDESC,
        e.FNAME AS EMP_FNAME,
        e.LNAME AS EMP_LNAME,
        DATE_FORMAT(v.visitdate,'%e/%c/%y %k:%i') AS VISIT_DATE_STR
        FROM `metupal_visits` v, `employee` e , `metupal` m
        WHERE e.empNumber = v.EMPLOYEEVISIT_EMPNUMBER 
        /* AND v.FROMVISITWEBAPP = 1 */
        AND m.metupalnumber = v.METUPALVISIT_METUPALNUMBER 
        AND v.visitdate > DATE_ADD(CURRENT_TIMESTAMP(),INTERVAL -180 DAY ) ";
    if (isset($_POST['emp'])){
        $sql = $sql . "AND CONCAT(TRIM(e.idnum),TRIM(e.idnumsec)) = '".$_POST['emp']."' " ;
    }
    if (isset($_POST['empn'])){
        $sql = $sql . "AND e.empnumber = ".$_POST['empn']." " ;
    }
    if (isset($_POST['profemp'])){
     $sql = $sql . "AND ((v.EMPLOYEEVISITUPDATER_EMPNUMBER IS NULL AND m.VINSEMPLOYEEVISITTYPE_EMPNUMBER = ".$_POST['profemp']." )
                    OR v.EMPLOYEEVISITUPDATER_EMPNUMBER = ".$_POST['profemp']." ) " ;
    }
    if (isset($_POST['met'])){
        $sql = $sql . "AND CONCAT(TRIM(m.idnum),TRIM(m.idnumsec)) = '".$_POST['met']."' " ;
    }
    if (isset($_POST['metn'])){
        $sql = $sql . "AND m.metupalnumber = ".$_POST['metn']." " ;
    }
    if (isset($_POST['isSigned']) && $_POST['isSigned']==1){
        $sql = $sql . "AND v.SIGNATURE != '' AND e.PROFESSION_PROFESSIONID = 3 
                   AND v.REASONNOTOCCURRED_REASONID IS NULL 
                   AND (v.SIGNATUREUPDATER = '' OR v.SIGNATUREUPDATER IS NULL) " ;
    }
    if (isset($_POST['visitd'])){
        $sql = $sql . "AND v.visitdate = '".$_POST['visitd']."' " ;
    }
    if (isset($_POST['prof'])){
        $sql = $sql . "AND e.PROFESSION_PROFESSIONID = ".$_POST['prof']." " ;
    }
    if (isset($_POST['brn'])){
        $sql = $sql . "AND m.BRANCH_BRANCHID = ".$_POST['brn']." " ;
    }
    $sql = $sql . "ORDER BY v.visitdate DESC ";

} else {
    $sqlnum = 2;
    $sql = "SELECT v.*,
                   m.FNAME AS MET_FNAME, 
                   m.LNAME AS MET_LNAME, 
                   CONCAT(TRIM(m.idnum),TRIM(m.idnumsec)) AS MET_IDNUM,
                   e.FNAME AS EMP_FNAME,
                   e.LNAME AS EMP_LNAME,
        (SELECT r.REASONDESC FROM `metupal_visits_reasons` r 
        WHERE r.REASONID = v.REASONNOTOCCURRED_REASONID ) AS REASONDESC,
        DATE_FORMAT(v.visitdate,'%e/%c/%y %k:%i') AS VISIT_DATE_STR
        FROM `metupal_visits` v, `metupal` m, `employee` e 
        WHERE v.METUPALVISIT_METUPALNUMBER = m.METUPALNUMBER 
        AND e.empNumber = v.EMPLOYEEVISIT_EMPNUMBER 
        AND m.DUPLICATEDRECORD = 0 
        AND v.visitId = ".$_POST['vid'];  
}

$result = $conn->query($sql);
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
        $myObj->visitid = $blist[$i]['VISITID'].'';
        $myObj->changessincelastvisitdesc = $blist[$i]['CHANGESSINCELASTVISITDESC'];
        $myObj->difficultiesintreatment = $blist[$i]['DIFFICULTIESINTREATMENT'];
        $myObj->generalimprestion = $blist[$i]['GENERALIMPRESTION'];
        $myObj->homedesc = $blist[$i]['HOMEDESC'];
        $lastvd = $blist[$i]['LASTVISITDATE'];
        if (!is_null($lastvd)){
            $lastvds = strtotime($lastvd);
            $lastvdf = date( 'Y-m-d', $lastvds );
            $myObj->lastvisitdate = $lastvdf;
        } else {
            $myObj->lastvisitdate = $blist[$i]['LASTVISITDATE'];
        }
        $myObj->metupallivealone = $blist[$i]['METUPALLIVEALONE'].'';
        $myObj->visitexceptionexists = $blist[$i]['VISITEXCEPTIONEXISTS'].'';
        $myObj->numoftreatmenthours = $blist[$i]['NUMOFTREATMENTHOURS'].'';
        $myObj->numofhospitalizationdays = $blist[$i]['NUMOFHOSPITALIZATIONDAYS'].'';
        $myObj->mobilityaccessories = $blist[$i]['MOBILITYACCESSORIES'];
        $myObj->metupalpresent = $blist[$i]['METUPALPRESENT'].'';
        $myObj->metupalpresentdesc = $blist[$i]['METUPALPRESENTDESC'];
        $myObj->nutritiondesc = $blist[$i]['NUTRITIONDESC'];
        $myObj->onschedualtime = $blist[$i]['ONSCHEDUALTIME'].'';
        $myObj->personalapperancedesc = $blist[$i]['PERSONALAPPERANCEDESC'];
        $myObj->receiveallorderhours = $blist[$i]['RECEIVEALLORDERHOURS'];
        $myObj->requests = $blist[$i]['REQUESTS'];
        $myObj->treatmentsatisfactiondesc = $blist[$i]['TREATMENTSATISFACTIONDESC'];
        $vd = $blist[$i]['VISITDATE'];
        if (!is_null($vd)){
            $vds = strtotime($vd);
            $vdf = date( 'Y-m-d H:i:s', $vds );
            $myObj->visitdate = $vdf;
            $myObj->visitdatestr = $blist[$i]['VISIT_DATE_STR'];
        } else {
            $myObj->visitdate = $blist[$i]['VISITDATE'];
            $myObj->visitdatestr = $blist[$i]['VISIT_DATE_STR'];
        }
        
        $myObj->whopresentdesc = $blist[$i]['WHOPRESENTDESC'];
        $myObj->employeevisit_empnumber = $blist[$i]['EMPLOYEEVISIT_EMPNUMBER'].'';
        $myObj->employeevisitupdater_empnumber = $blist[$i]['EMPLOYEEVISITUPDATER_EMPNUMBER'].'';
        $myObj->metupalvisit_metupalnumber = $blist[$i]['METUPALVISIT_METUPALNUMBER'].'';
        $midnum = $blist[$i]['MET_IDNUM'];
        if (!is_null($midnum)){
            $myObj->metFname = $blist[$i]['MET_FNAME'].'';
            $myObj->metLname = $blist[$i]['MET_LNAME'].'';
            $myObj->metIdNum = $blist[$i]['MET_IDNUM'].'';
        }
        $myObj->employeeprof_professionid = $blist[$i]['EMPLOYEEPROF_PROFESSIONID'].'';
        $myObj->reasonnotoccurred_reasonid = $blist[$i]['REASONNOTOCCURRED_REASONID'].'';
        $myObj->reasondesc = $blist[$i]['REASONDESC'].'';
        if ($len1==1){
            $myObj->signature = $blist[$i]['SIGNATURE'];
            $myObj->signatureupdater = $blist[$i]['SIGNATUREUPDATER'];
        }
        $myObj->phonecallvisitind = $blist[$i]['PHONECALLVISITIND'].'';
        $myObj->metapelname = $blist[$i]['METAPELNAME'];
        $myObj->empFname = $blist[$i]['EMP_FNAME'];
        $myObj->empLname = $blist[$i]['EMP_LNAME'];
        $vind = $blist[$i]['VINITDATE'];
        if (!is_null($vind)){
            $vinds = strtotime($vind);
            $vindf = date( 'Y-m-d H:i:s', $vinds );
            $myObj->vinitdate = $vindf;
        } else {
            $myObj->vinitdate = $blist[$i]['VINITDATE'];
        }
        $myObj->vinituser_userid = $blist[$i]['VINITUSER_USERID'].'';
        $vupd = $blist[$i]['VUPDTDATE'];
        if (!is_null($vupd)){
            $vupds = strtotime($vupd);
            $vupdf = date( 'Y-m-d H:i:s', $vupds );
            $myObj->vupdtdate = $vupdf;
        } else {
            $myObj->vupdtdate = $blist[$i]['VUPDTDATE'];
        }
        $myObj->vupdtuser_userid = $blist[$i]['VUPDTUSER_USERID'].'';

        $newArr[] = $myObj;
    }

    $myJSON = json_encode($newArr);

} else if ($len1==0){
    $myObj= (object) null;
    $myObj->resStatus = -1;
    $myObj->resStatusDesc = 'no values';
    $myJSON = json_encode($myObj);

} 

$conn->close();

echo $myJSON;

?>