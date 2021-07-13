<?php
include "../../webapps/config.visits.php";


$apiKeyStr = 'api4webapp!vdoc';
$apiKey = strtr(base64_encode($apiKeyStr), '+/=', '-_,');
$apiKeyParam = "apiKey=".$apiKey;

if (!isset($_POST['visitid']) || !isset($_POST['metn']))
    return;

$kashish = $_POST['metn'];
$visit = $_POST['visitid'];
//echo 'kashish: ' . $kashish;
//echo '  visit: ' . $visit;
//echo $apiKey ;

$ch = curl_init();
//$url = "http://localhost/publicationWrapp.php?id=http%3A%2F%2Flocalhost%2Fvisit_report1Sign3.php%3Fkashish%3D75846%26visit%3D265144";
$url = $nogawin."/publicationWrapp.php?id=";
$inner = urlencode ($servern."/VISITS/api-dest/visit_report1Sign3Secure.php?apiKey=".$apiKey."&kashish=".$kashish."&visit=".$visit);

$phpurl = $url.$inner;
$idn="visitDoc";
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
