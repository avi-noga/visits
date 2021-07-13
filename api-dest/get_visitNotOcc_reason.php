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
if (!isset($_REQUEST['apiKey']) || is_null($_REQUEST['apiKey']) || $strd!='api4webapp!reas') return;
header('Content-Type: application/json; charset=windows-1255');

require '../../webapps/connect.visits.php';

$sql = "SELECT * FROM `metupal_visits_reasons` ";

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
        $myObj->REASONID = $blist[$i]['REASONID'].'';
        $myObj->REASONDESC = $blist[$i]['REASONDESC'];
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