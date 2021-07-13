<?php
include "../../webapps/config.visits.php";


$apiKeyStr = 'api4webapp!vrep';
$apiKey = strtr(base64_encode($apiKeyStr), '+/=', '-_,');
$apiKeyParam = "apiKey=".$apiKey;

if (!isset($_POST['empnumber']) || !isset($_POST['empprof'])
   || !isset($_POST['month']) || !isset($_POST['userid'])
   || !isset($_POST['empbranch']))
    return;

$branch = $_POST['empbranch'];
$user = $_POST['userid'];
if ($_POST['empprof'] == "3") {
    $swtype = "sw2";
} else {
    $swtype = "sw";
}
$empnum = $_POST['empnumber'];
$mon = $_POST['month'];
$monthDate = date("d-m-Y", strtotime($mon));
$month = date("m/Y", strtotime($mon));
//echo 'kashish: ' . $kashish;
//echo '  visit: ' . $visit;
//echo $apiKey ;

$ch = curl_init();
//$url = "http://localhost/publicationWrapp.php?id=http%3A%2F%2Flocalhost%2Fvisit_report1Sign3.php%3Fkashish%3D75846%26visit%3D265144";
$url = $nogawin."/publicationWrapp.php?id=";
$inner = urlencode ($servern."/VISITS/api-dest/visitPlan2Secure.php?apiKey=".$apiKey."&branch=".$branch."&user=".$user."&toPrint="."0"."&".$swtype."=".$empnum."&orderLimit="."0"."&monthDate=".$monthDate."&month=".$month);

$phpurl = $url.$inner;

//echo "phpurl: " . $phpurl;

$idn="visitRep";
$filename='file_'.time().'_'.$idn.'.pdf';

$fname = "../files/".$filename;
$fp = fopen($fname, "w+");
//echo $phpurl;

curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_URL, $phpurl);
$server_output = curl_exec($ch);
curl_close($ch);
fclose($fp);

$path = $appUrl."/files/".$filename;
//$type = pathinfo($path, PATHINFO_EXTENSION);
//$data = file_get_contents($path);
//$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
//if (!unlink($path)) {
//    echo ("$path cannot be deleted due to an error");
//}

echo $path;

?>
