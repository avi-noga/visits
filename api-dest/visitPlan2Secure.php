<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:dt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1255">
<link rel=File-List href="visitPlan_files/filelist.xml">
<style>
 @media print {
    @page {
        size: A4 portrait;
        margin: 4.0cm;
    }
 }
 div.page
      {
        /*page-break-after: always !important;
        page-break-inside: avoid !important;*/
      }
 </style>
<!--[if !mso]>
<style>
@page { size: A4 }
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
b\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<title>Page Title</title>
<style>
<!--
 /* Font Definitions */
@font-face
	{font-family:Arial;
	panose-1:2 11 6 4 2 2 2 2 2 4;}
@font-face
	{font-family:Aharoni;
	panose-1:2 1 8 3 2 1 4 3 2 3;}
 /* Style Definitions */
p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-right:0pt;
	text-indent:0pt;
	margin-top:0pt;
	margin-bottom:0pt;
	text-align:left;
	font-family:"Times New Roman";
	font-size:10.0pt;
	color:black;}
p.MsoAccentText, li.MsoAccentText, div.MsoAccentText
	{margin-right:0pt;
	text-indent:0pt;
	margin-top:0pt;
	margin-bottom:0pt;
	text-align:left;
	font-family:"Gill Sans MT";
	font-size:7.0pt;
	color:black;
	font-weight:bold;}
p.MsoAccentText2, li.MsoAccentText2, div.MsoAccentText2
	{margin-right:0pt;
	text-indent:0pt;
	margin-top:0pt;
	margin-bottom:0pt;
	text-align:left;
	font-family:"Gill Sans MT";
	font-size:7.0pt;
	color:black;}
ol
	{margin-top:0in;
	margin-bottom:0in;
	margin-right:-2197in;}
ul
	{margin-top:0in;
	margin-bottom:0in;
	margin-right:-2197in;}
@page
	{size:8.-1980in 11.2192in;}
-->
</style>
<!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="6150" fill="f" fillcolor="white [7]"
  strokecolor="black [0]">
  <v:fill color="white [7]" color2="white [7]" on="f"/>
  <v:stroke color="black [0]" color2="white [7]">
   <o:left v:ext="view" color="black [0]" color2="white [7]"/>
   <o:top v:ext="view" color="black [0]" color2="white [7]"/>
   <o:right v:ext="view" color="black [0]" color2="white [7]"/>
   <o:bottom v:ext="view" color="black [0]" color2="white [7]"/>
   <o:column v:ext="view" color="black [0]" color2="white [7]"/>
  </v:stroke>
  <v:shadow color="#ccc [4]"/>
  <v:textbox inset="2.88pt,2.88pt,2.88pt,2.88pt"/>
 </o:shapedefaults><o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1"/>
 </o:shapelayout></xml><![endif]-->
 <link href="Site.css" rel="stylesheet">
</head>
<script>
window.moveTo(0, 0);
function printthis()
{
window.focus(); //Hide the child as soon as it is opened.
window.print(); //Print the child.
window.close(); //Immediately close the child.
}</script>
<?php
header('Content-Type: text/html; charset=windows-1255');
// more content
?>
<?php if ($_REQUEST['toPrint']==1) echo "<body style='margin:0' onload=\"printthis()\">" ;
else echo "<body style='margin:0' >";
?>
<body style='margin:0'>
<?php if (!isset($_REQUEST['hidetoc'])) { echo "
<style type=\"text/css\">
@media print {
    #printbtn {
        display :  none;
    }
    #printbtn3 {
        display :  none;
    }
}
</style>
<input id =\"printbtn\" type=\"button\" value=\"הדפס\" onclick=\"window.print();\" style=\"position: fixed; z-index: 9999; top: 0; left: 0;\">
<input id =\"printbtn3\" type=\"button\" value=\"סגור\" onClick=\"window.close();\" style=\"position: fixed; z-index: 9999; top: 0; left: 75;\">

<p id =\"printbtn\">&nbsp;</p>
<p id =\"printbtn\">&nbsp;</p>
";}
?>

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
if (!isset($_REQUEST['apiKey']) || is_null($_REQUEST['apiKey']) || $strd!='api4webapp!vrep') return;

require '../../connect.php';

?>
    
<?php
 
  $query = "SELECT b.*
FROM BRANCH as b
WHERE b.BRANCHID=".$_REQUEST['branch'];

  if(!$result = $db->query($query)){
     echo  'There was an error running the query [' . $db->error . ']';
}
global $branch;
$branch = $result->fetch_assoc();

  
function repplace($h,$g,$s)
{
return $s;
} 
  
  
 
function nicerHour($h)
{
if (strlen ( $h )==1 || strlen ( $h )==2)
echo $h.':00';
else if (strlen ( $h )==3 )
echo substr($h, 0,1).':'.substr($h, 1);
else if (strlen ( $h )==4 )
echo substr($h, 0,2).':'.substr($h, 2);
}
  
  ?>
  
  <?php
  $query = "SELECT u.userfullname 
FROM USER u 
WHERE u.USERID =".$_REQUEST['user'];

  if(!$result = $db->query($query)){
     echo  'There was an error running the query [' . $db->error . ']';
}
//global $row2;
$row5 = $result->fetch_assoc();
date_default_timezone_set('Asia/Jerusalem');
  
 
 
 $tmpMonth = date("m/Y");
if (isset($_REQUEST['month'])){
	$tmpMonth = $_REQUEST['month'];
}


$flagSW = 0;
$tmpSW = 1;
if (isset($_REQUEST['sw'])){
	$tmpSW = $_REQUEST['sw'];
}
else
{
	$flagSW = 1;
}

if ($flagSW == 0){
$query = "SELECT concat(met.lname,' ',met.fname) AS name
FROM employee met 
WHERE met.EMPNUMBER =".$tmpSW;

  if(!$result = $db->query($query)){
     echo  'There was an error running the query [' . $db->error . ']';
}
//global $row2;
$row654 = $result->fetch_assoc();

}


  ?>

<!--div style='width:8.-1863in;height:8.0131in'-->
<!--[if gte vml 1]><v:shapetype id="_x0000_t202" coordsize="21600,21600" o:spt="202"
 path="m,l,21600r21600,l21600,xe">
 <v:stroke joinstyle="miter"/>
 <v:path gradientshapeok="t" o:connecttype="rect"/>
</v:shapetype><v:shape id="_x0000_s1025" type="#_x0000_t202" style='position:absolute;
 left:56.69pt;top:82.2pt;width:113.38pt;height:31.18pt;flip:x;z-index:1;
 visibility:visible;mso-wrap-edited:f;mso-wrap-distance-left:2.88pt;
 mso-wrap-distance-top:2.88pt;mso-wrap-distance-right:2.88pt;
 mso-wrap-distance-bottom:2.88pt' filled="f" fillcolor="white [7]" stroked="f"
 strokecolor="black [0]" strokeweight="0" insetpen="t" o:cliptowrap="t">
 <v:fill color2="white [7]"/>
 <v:stroke>
  <o:left v:ext="view" color="black [0]" color2="white [7]"/>
  <o:top v:ext="view" color="black [0]" color2="white [7]"/>
  <o:right v:ext="view" color="black [0]" color2="white [7]"/>
  <o:bottom v:ext="view" color="black [0]" color2="white [7]"/>
  <o:column v:ext="view" color="black [0]" color2="white [7]"/>
 </v:stroke>
 <v:shadow color="#ccc [4]"/>
 <o:lock v:ext="edit" shapetype="t"/>
 <v:textbox style='mso-column-margin:5.7pt' inset="2.85pt,2.85pt,2.85pt,2.85pt"/>
</v:shape><![endif]--><![if !vml]><![endif]><!--[if gte vml 1]><v:shape id="_x0000_s1026" type="#_x0000_t202"
 style='position:absolute;left:405.35pt;top:79.37pt;width:133.23pt;height:28.34pt;
 flip:x;z-index:2;visibility:visible;mso-wrap-edited:f;
 mso-wrap-distance-left:2.88pt;mso-wrap-distance-top:2.88pt;
 mso-wrap-distance-right:2.88pt;mso-wrap-distance-bottom:2.88pt' filled="f"
 fillcolor="white [7]" stroked="f" strokecolor="black [0]" strokeweight="0"
 insetpen="t" o:cliptowrap="t">
 <v:fill color2="white [7]"/>
 <v:stroke>
  <o:left v:ext="view" color="black [0]" weight="0" joinstyle="miter"
   insetpen="t"/>
  <o:top v:ext="view" color="black [0]" weight="0" joinstyle="miter"
   insetpen="t"/>
  <o:right v:ext="view" color="black [0]" weight="0" joinstyle="miter"
   insetpen="t"/>
  <o:bottom v:ext="view" color="black [0]" weight="0" joinstyle="miter"
   insetpen="t"/>
  <o:column v:ext="view" color="black [0]" color2="white [7]"/>
 </v:stroke>
 <v:shadow color="#ccc [4]"/>
 <o:lock v:ext="edit" shapetype="t"/>
 <v:textbox style='mso-column-margin:5.7pt' inset="0,1mm,0,0"/>
</v:shape><![endif]--><![if !vml]><![endif]><!--[if gte vml 1]><v:shape id="_x0000_s1027" type="#_x0000_t202"
 style='position:absolute;left:87.87pt;top:56.69pt;width:416.69pt;height:25.51pt;
 flip:x;z-index:3;visibility:visible;mso-wrap-edited:f;
 mso-wrap-distance-left:2.88pt;mso-wrap-distance-top:2.88pt;
 mso-wrap-distance-right:2.88pt;mso-wrap-distance-bottom:2.88pt' filled="f"
 fillcolor="white [7]" stroked="f" strokecolor="black [0]" strokeweight="0"
 insetpen="t" o:cliptowrap="t">
 <v:fill color2="white [7]"/>
 <v:stroke>
  <o:left v:ext="view" color="black [0]" color2="white [7]"/>
  <o:top v:ext="view" color="black [0]" color2="white [7]"/>
  <o:right v:ext="view" color="black [0]" color2="white [7]"/>
  <o:bottom v:ext="view" color="black [0]" color2="white [7]"/>
  <o:column v:ext="view" color="black [0]" color2="white [7]"/>
 </v:stroke>
 <v:shadow color="#ccc [4]"/>
 <o:lock v:ext="edit" shapetype="t"/>
 <v:textbox style='mso-column-margin:5.7pt' inset="2.85pt,2.85pt,2.85pt,2.85pt"/>
</v:shape><![endif]--><![if !vml]><span style='z-index:3;
left:117px;top:76px;width:656px;height:35px;margin-left:20pt'>

<table cellpadding=0 cellspacing=0>
 <tr>
  <td width=656 height=35 style='vertical-align:top'><![endif]>
  <div v:shape="_x0000_s1027" style='padding:2.85pt 2.85pt 2.85pt 2.85pt'
  class=shape>
  <p class=MsoAccentText style='text-align:center;line-height:100%;text-align:
  center;margin-left:20pt;margin-top:10pt'><span dir=rtl lang=he style='font-size:16.0pt;line-height:100%;
  text-decoration:underline;language:he;direction:rtl;
  unicode-bidi:embed;font-size:16.0pt'><?php echo $compName; ?><br>דו“ח ביקורי בית לביצוע</span></p>
  </div>
  <![if !vml]></td>
 </tr>
</table>

</span>
<!--span style='z-index:1;
left:76px;top:110px;width:202px;height:42px;margin-left:20pt'-->

<table cellpadding=0 cellspacing=0>
 <tr>
  <td width=202 height=42 style='vertical-align:top;margin-left:20pt'><![endif]>
  <div v:shape="_x0000_s1025" style='padding:2.85pt 2.85pt 2.85pt 2.85pt'
  class=shape>
  <p class=MsoAccentText2 style='text-align:right;direction:rtl;unicode-bidi:
  embed;margin-left:20pt'><span lang=he style='font-size:9.0pt;font-family:Arial;language:he;
  direction:rtl;unicode-bidi:normal;font-size:9.0pt'>תאריך הדפסה: </span><span lang=he style='font-size:9.0pt;font-family:Arial;language:he;
  direction:rtl;unicode-bidi:normal;font-size:9.0pt'><?php echo  date("j/n/Y");?></span></p>
  <p class=MsoAccentText2 style='text-align:right;direction:rtl;unicode-bidi:
  embed;margin-left:20pt'><span lang=he style='font-size:9.0pt;font-family:Arial;language:he;
  direction:rtl;unicode-bidi:normal;font-size:9.0pt'>ע"י:</span><span lang=he style='font-size:9.0pt;font-family:Arial;language:he;
  direction:rtl;unicode-bidi:normal;font-size:9.0pt'><b><?php echo iconv('UTF-8', 'Windows-1255', $row5['userfullname']);?></b></span><span lang=he style='font-size:9.0pt;font-family:Arial;language:he;
  direction:rtl;unicode-bidi:normal;font-size:9.0pt'>     בשעה:  </span><span lang=he style='font-size:9.0pt;font-family:Arial;language:he;
  direction:rtl;unicode-bidi:normal;font-size:9.0pt'><?php echo date("H:i");?></span></p>
  <p class=MsoAccentText2 style='text-align:right;direction:rtl;unicode-bidi:
  embed'><span dir=ltr lang=en-US style='font-size:9.0pt;font-family:Arial;
  language:en-US;direction:ltr;unicode-bidi:embed'>&nbsp;</span></p>
  </div>
  <![if !vml]></td>
 
 <td width=282 height=27 style='vertical-align:top'><![endif]>
  <div v:shape="_x0000_s1029" style='padding:2.85pt 2.85pt 2.85pt 2.85pt'
  class=shape>
  <p class=MsoAccentText style='text-align:right;direction:rtl;unicode-bidi:
  embed'><span lang=he style='font-size:11.0pt;font-family:Arial;font-weight:
  normal;language:he;direction:rtl;unicode-bidi:normal;font-size:11.0pt;
  font-weight:normal'><?php echo iconv('UTF-8', 'Windows-1255', $branch['BRANCHNAME']);?></span><span lang=he style='font-size:11.0pt;font-family:Arial;font-weight:
  normal;language:he;direction:rtl;unicode-bidi:normal;font-size:11.0pt;
  font-weight:normal'> טלפון: </span><span lang=he style='font-size:11.0pt;font-family:Arial;font-weight:
  normal;language:he;direction:rtl;unicode-bidi:normal;font-size:11.0pt;
  font-weight:normal'><?php echo "&nbsp;&nbsp;".$branch['PHONENUM'];?></span></p>
  </div>
  <![if !vml]></td> 
  
  <td width=178 height=38 style='vertical-align:top'><![endif]>
  <div v:shape="_x0000_s1026" style='padding:2.8346pt 0pt 0pt 0pt' class=shape>
  <p class=MsoAccentText2 style='text-align:right;direction:rtl;unicode-bidi:
  embed'><span lang=he style='font-size:11.0pt;font-family:Arial;font-weight:
  bold;language:he;direction:rtl;unicode-bidi:normal;font-size:11.0pt;
  font-weight:bold'>לתקופה: </span><span lang=he style='font-size:11.0pt;font-family:Arial;font-weight:
  bold;language:he;direction:rtl;unicode-bidi:normal;font-size:11.0pt;
  font-weight:bold'><?php echo $tmpMonth;?></span></p>
  <?php if ($flagSW == 0){ echo "
  <p class=MsoAccentText2 style='text-align:right;direction:rtl;unicode-bidi:
  embed'><span lang=he style='font-size:11.0pt;font-family:Arial;font-weight:
  bold;language:he;direction:rtl;unicode-bidi:normal;font-size:11.0pt;
  font-weight:bold'>עובד מקצועי: </span><span lang=he style='font-size:11.0pt;font-family:Arial;font-weight:
  bold;language:he;direction:rtl;unicode-bidi:normal;font-size:11.0pt;
  font-weight:bold'>";
  echo iconv('UTF-8', 'Windows-1255', $row654['name']);
  echo "</span></p>";}?>
  
  
  <p class=MsoAccentText2 style='text-align:right;direction:rtl;unicode-bidi:
  embed'><span dir=ltr lang=en-US style='font-size:8.0pt;font-family:Arial;
  language:en-US;direction:ltr;unicode-bidi:embed'>&nbsp;</span></p>
  </div>
  <![if !vml]></td>
  
  
 </tr>
</table>

</span>

<![endif]><!--[if gte vml 1]><v:line id="_x0000_s1028" style='position:absolute;
 z-index:4;mso-wrap-distance-left:2.88pt;mso-wrap-distance-top:2.88pt;
 mso-wrap-distance-right:2.88pt;mso-wrap-distance-bottom:2.88pt' from="56.69pt,113.38pt"
 to="538.58pt,113.38pt" strokecolor="black [0]" strokeweight="3pt"
 o:cliptowrap="t">
 <v:stroke color2="white [7]">
  <o:left v:ext="view" color="black [0]" color2="white [7]"/>
  <o:top v:ext="view" color="black [0]" color2="white [7]"/>
  <o:right v:ext="view" color="black [0]" color2="white [7]"/>
  <o:bottom v:ext="view" color="black [0]" color2="white [7]"/>
  <o:column v:ext="view" color="black [0]" color2="white [7]"/>
 </v:stroke>
 <v:shadow color="#ccc [4]"/>
</v:line><![endif]--><![if !vml]><span style='z-index:4;
left:73px;top:149px;width:648px;height:5px;margin-left:20pt'><img width=648 height=5
src="visitPlan_files/image329.gif" v:shapes="_x0000_s1028"></span><![endif]><!--[if gte vml 1]><v:shape
 id="_x0000_s1029" type="#_x0000_t202" style='position:absolute;left:221.1pt;
 top:82.2pt;width:136.06pt;height:19.84pt;flip:x;z-index:5;visibility:visible;
 mso-wrap-edited:f;mso-wrap-distance-left:2.88pt;mso-wrap-distance-top:2.88pt;
 mso-wrap-distance-right:2.88pt;mso-wrap-distance-bottom:2.88pt' filled="f"
 fillcolor="white [7]" stroked="f" strokecolor="black [0]" strokeweight="0"
 insetpen="t" o:cliptowrap="t">
 <v:fill color2="white [7]"/>
 <v:stroke>
  <o:left v:ext="view" color="black [0]" color2="white [7]"/>
  <o:top v:ext="view" color="black [0]" color2="white [7]"/>
  <o:right v:ext="view" color="black [0]" color2="white [7]"/>
  <o:bottom v:ext="view" color="black [0]" color2="white [7]"/>
  <o:column v:ext="view" color="black [0]" color2="white [7]"/>
 </v:stroke>
 <v:shadow color="#ccc [4]"/>
 <o:lock v:ext="edit" shapetype="t"/>
 <v:textbox style='mso-column-margin:5.7pt' inset="2.85pt,2.85pt,2.85pt,2.85pt"/>
</v:shape><![endif]--><![if !vml]><![endif]><!--[if gte vml 1]><![if mso | ie]><v:shapetype id="_x0000_t201"
 coordsize="21600,21600" o:spt="201" path="m,l,21600r21600,l21600,xe">
 <v:stroke joinstyle="miter"/>
 <v:path shadowok="f" o:extrusionok="f" strokeok="f" fillok="f" o:connecttype="rect"/>
 <o:lock v:ext="edit" shapetype="t"/>
</v:shapetype><v:shape id="_x0000_s1032" type="#_x0000_t201" style='position:absolute;
 left:56.69pt;top:116.22pt;width:481.89pt;height:160.66pt;z-index:6;
 mso-wrap-distance-left:2.88pt;mso-wrap-distance-top:2.88pt;
 mso-wrap-distance-right:2.88pt;mso-wrap-distance-bottom:2.88pt' stroked="f"
 strokecolor="black [0]" insetpen="t" o:cliptowrap="t">
 <v:stroke color2="white [7]">
  <o:left v:ext="view" color="black [0]" color2="white [7]" weight="0"/>
  <o:top v:ext="view" color="black [0]" color2="white [7]" weight="0"/>
  <o:right v:ext="view" color="black [0]" color2="white [7]" weight="0"/>
  <o:bottom v:ext="view" color="black [0]" color2="white [7]" weight="0"/>
  <o:column v:ext="view" color="black [0]" color2="white [7]"/>
 </v:stroke>
 <v:shadow color="#ccc [4]"/>
 <v:textbox inset="0,0,0,0">
 </v:textbox>
</v:shape><![endif]><![endif]-->

<?php

$flagSW2 = 0;
$tmpSW2 = 1;
if (isset($_REQUEST['sw2'])){
	$tmpSW2 = $_REQUEST['sw2'];
}
else
{
	$flagSW2 = 1;
}

$flagPROF = 0;
$flagPROF2 = 1;
$tmpPROF = 1;
if (isset($_REQUEST['sinon'])){
if ($_REQUEST['sinon']==1){
	$tmpPROF = 3;//$_REQUEST['sinon'];
	}
	else{
	$flagPROF = 1;
	$flagPROF2 = 0;
	}
}
else
{
	$flagPROF = 1;
}

$flagNOCHECH = 1;
$tmpNOCHECH = 0;
if (isset($_REQUEST['nochech'])){
	if ($_REQUEST['nochech']==1){
		$tmpNOCHECH = 1;
	}else{
		$tmpNOCHECH = 0;
		}
		$flagNOCHECH = 0;//$_REQUEST['sinon'];
}


$flagORDERBYLIMIT = 0;
if (isset($_REQUEST['orderLimit'])){
	$flagORDERBYLIMIT = $_REQUEST['orderLimit'];
}




$tmpDate = date("d-m-Y");
if (isset($_REQUEST['monthDate'])){
	$tmpDate = $_REQUEST['monthDate'];
}

  $query = "SELECT 1 AS ttt
FROM branch_month b
WHERE b.BRANCH_BRANCHID=".$_REQUEST['branch']." and DATE_FORMAT(b.MONTHOPENDATE,'%m/%Y') = '".$_REQUEST['month']."'";

  if(!$result = $db->query($query)){
     echo  'There was an error running the query [' . $db->error . ']';
}
global $branch_month;
$branch_month = $result->fetch_assoc();

  $query = "SELECT b.MINWEEKLYORDERHOURSFORHOMEVISIT FROM service_provider_constants b WHERE b.ID=1";

  if(!$result = $db->query($query)){
     echo  'There was an error running the query [' . $db->error . ']';
}
global $min_hours;
$min_hours = $result->fetch_assoc();


//echo ''.$min_hours['MINWEEKLYORDERHOURSFORHOMEVISIT'];
$flagMIN = 0;
$tmpMIN = 1;
if (isset($min_hours['MINWEEKLYORDERHOURSFORHOMEVISIT']) && $min_hours['MINWEEKLYORDERHOURSFORHOMEVISIT']>0){
	$tmpMIN = $min_hours['MINWEEKLYORDERHOURSFORHOMEVISIT']*60;
}
else
{
	$flagMIN = 1;
}

//echo $tmpMIN;

$tmpMonth = $_REQUEST['month'];
if (is_null($branch_month['ttt'])){

$tmpMonth = date("m/Y");

}

/* move visitInstructions to metupal. Avi 31.7.19 */
  $query = "
select  metupalnumber,
	name,
	address,ccity,aaddress,
	address2,
	id,
	phone1,
	phone2,
	DATE_FORMAT(visitLimit,'%d/%m/%Y') AS visitLimitS,
	DATE_FORMAT(lastVisit,'%d/%m/%Y') AS lastVisitS,
	isCoor,
	onSchedTime,
	onWithMetapel,
	serviceEmp,
	serviceEmpProf,
	serviceEmpNumber,
	serviceEmpNumber2,
	serviceEmpName,
	bakarName,
	hos,
	committee_id,committee_name
from ((select 	met.metupalnumber,
	concat(met.lname,' ',met.fname) AS name,
	concat(if(met.address is not null and met.address !='',met.address,met.city),',',met.city) AS address,met.city as ccity,met.address as aaddress,
	concat(if(met.address2 is not null and met.address2 !='',met.address2,met.city),',',met.city) AS address2,
	concat(met.idnum,'.',met.idnumsec) AS id,
	concat(met.PHONEPREFIX1_PHONEPREFIX,'-',met.PHONENUM1) AS phone1,
	concat(met.PHONEPREFIX2_PHONEPREFIX,'-',met.PHONENUM2) AS phone2,
	(SELECT date_add(v.VISITDATE, INTERVAL mvf.DAYSINTERVAL DAY)
	 FROM METUPAL_VISITS v ,METUPAL_VISIT_FREQUENCY mvf
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 AND mvf.FREQUENCYID = met.VINSVISITFREQUENCY_FREQUENCYID
	 AND v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS visitLimit,
	 met.VINSVISITCOORDINATE AS isCoor, 
	(SELECT v.VISITDATE
	 FROM METUPAL_VISITS v 
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS lastVisit,
	(SELECT v.ONSCHEDUALTIME
	 FROM METUPAL_VISITS v 
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS onSchedTime,
	(SELECT v.METUPALPRESENT
	 FROM METUPAL_VISITS v 
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS onWithMetapel,
	(SELECT concat(emp.LNAME,' ',emp.FNAME)
	 FROM METUPAL_VISITS v ,EMPLOYEE emp
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 and v.EMPLOYEEVISIT_EMPNUMBER = emp.EMPNUMBER
	 order by v.VISITDATE desc
	 limit 1) AS serviceEmp,
	 (SELECT emp.PROFESSION_PROFESSIONID 
	 FROM METUPAL_VISITS v ,EMPLOYEE emp
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 and v.EMPLOYEEVISIT_EMPNUMBER = emp.EMPNUMBER
	 order by v.VISITDATE desc
	 limit 1) AS serviceEmpProf,
	(SELECT emp.EMPNUMBER
	 FROM METUPAL_VISIT_FREQUENCY mvf,EMPLOYEE emp
	 WHERE mvf.FREQUENCYID = met.VINSVISITFREQUENCY_FREQUENCYID
	 AND emp.EMPNUMBER = met.VINSEMPLOYEEVISITTYPE_EMPNUMBER
	 /*order by v.VISITDATE desc*/
	 limit 1) AS serviceEmpNumber,
	(SELECT emp.EMPNUMBER
	 FROM EMPLOYEE emp
	 WHERE emp.EMPNUMBER = met.VINSEMPLOYEEBAKARALTERNAT_EMPNUMBER 
	 limit 1) AS serviceEmpNumber2,
	(SELECT concat(emp.LNAME,' ',emp.FNAME) 
	 FROM METUPAL_VISIT_FREQUENCY mvf,EMPLOYEE emp
	 WHERE mvf.FREQUENCYID = met.VINSVISITFREQUENCY_FREQUENCYID
	 AND emp.EMPNUMBER = met.VINSEMPLOYEEVISITTYPE_EMPNUMBER
	 /*order by v.VISITDATE desc*/
	 limit 1) AS serviceEmpName,
	(SELECT concat(emp.LNAME,' ',emp.FNAME) 
	 FROM METUPAL_VISITS v ,EMPLOYEE emp
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 and emp.EMPNUMBER = met.VINSEMPLOYEEBAKARALTERNAT_EMPNUMBER
	 order by v.VISITDATE desc
	 limit 1) AS bakarName,
	(SELECT 1 
	 FROM metupal_hospitalizations mh 
	 WHERE mh.METUPAL_METUPALNUMBER = met.metupalnumber
	 and mh.HOSPITALIZETYPE_HOSPITALIZETYPECODE in ('HOS','HXS')
	 and ((mh.FROMDATE <= LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')) 
	      and mh.FROMDATE >= DATE_SUB(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')), 
              INTERVAL DAY(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')))-1 DAY)) 
	     OR
	      (mh.TODATE <= LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')) 
	       and mh.TODATE >= DATE_SUB(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')), 
               INTERVAL DAY(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')))-1 DAY)))
	LIMIT 1) AS hos,
	(select to0.COMMITTEE_COMMITTEEID from metupal_treatment_order to0,common_institution ci where (ci.CATEGORY_CATEGORYID = 1 OR ci.CATEGORY_CATEGORYID = 5 OR ci.CATEGORY_CATEGORYID = 2) and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$tmpMonth."' LIMIT 1) AS committee_id,
	(select com.COMMITTEENAME from metupal_treatment_order to0,common_institution ci,metupal_treatment_committee com where (ci.CATEGORY_CATEGORYID = 1 OR ci.CATEGORY_CATEGORYID = 5 OR ci.CATEGORY_CATEGORYID = 2) and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$tmpMonth."' and to0.COMMITTEE_COMMITTEEID= com.COMMITTEEID limit 1) AS committee_name
from METUPAL met
where met.CURRENTSTATUS_STATUSID = 1 
and met.DUPLICATEDRECORD = 0 
and met.BRANCH_BRANCHID = ".$_REQUEST['branch']."
and exists (select 1 from metupal_treatment_order to0,common_institution ci where (ci.CATEGORY_CATEGORYID = 1 OR ci.CATEGORY_CATEGORYID = 5 OR ci.CATEGORY_CATEGORYID = 2) and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$tmpMonth."' and ((1=".$flagMIN.") OR (to0.WEEKLYMINUTESCOUNT > ".$tmpMIN."))) 

)
UNION ALL
(
select 	met.metupalnumber,
	concat(met.lname,' ',met.fname) AS name,
	concat(if(met.address is not null and met.address !='',met.address,met.city),',',met.city) AS address,met.city as ccity,met.address as aaddress,
	concat(if(met.address2 is not null and met.address2 !='',met.address2,met.city),',',met.city) AS address2,
	concat(met.idnum,'.',met.idnumsec) AS id,
	concat(met.PHONEPREFIX1_PHONEPREFIX,'-',met.PHONENUM1) AS phone1,
	concat(met.PHONEPREFIX2_PHONEPREFIX,'-',met.PHONENUM2) AS phone2,
	(SELECT date_add(v.VISITDATE, INTERVAL DAYSINTERVAL DAY)
	 FROM METUPAL_VISITS v ,METUPAL_VISIT_FREQUENCY mvf
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 AND met.VINSVISITFREQUENCY_FREQUENCYID = mvf.FREQUENCYID
	 and v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS visitLimit,
	 met.VINSVISITCOORDINATE AS isCoor,
	(SELECT v.VISITDATE
	 FROM METUPAL_VISITS v 
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS lastVisit,
	(SELECT v.ONSCHEDUALTIME
	 FROM METUPAL_VISITS v 
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS onSchedTime,
	(SELECT v.METUPALPRESENT
	 FROM METUPAL_VISITS v 
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS onWithMetapel,
	(SELECT concat(emp.LNAME,' ',emp.FNAME)
	 FROM METUPAL_VISITS v ,EMPLOYEE emp
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 and v.EMPLOYEEVISIT_EMPNUMBER = emp.EMPNUMBER
	 order by v.VISITDATE desc
	 limit 1) AS serviceEmp,
	 (SELECT emp.PROFESSION_PROFESSIONID 
	 FROM METUPAL_VISITS v ,EMPLOYEE emp
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 and v.EMPLOYEEVISIT_EMPNUMBER = emp.EMPNUMBER
	 order by v.VISITDATE desc
	 limit 1) AS serviceEmpProf,
	(SELECT emp.EMPNUMBER
	 FROM METUPAL_VISIT_FREQUENCY mvf,EMPLOYEE emp
	 WHERE mvf.FREQUENCYID = met.VINSVISITFREQUENCY_FREQUENCYID
	 /*and v.REASONNOTOCCURRED_REASONID is null*/
	 and emp.EMPNUMBER = met.VINSEMPLOYEEVISITTYPE_EMPNUMBER
	 /*order by v.VISITDATE desc*/
	 limit 1) AS serviceEmpNumber,
	 (SELECT emp.EMPNUMBER
	 FROM EMPLOYEE emp
	 WHERE emp.EMPNUMBER = met.VINSEMPLOYEEBAKARALTERNAT_EMPNUMBER 
	 limit 1) AS serviceEmpNumber2,
	(SELECT concat(emp.LNAME,' ',emp.FNAME) 
	 FROM METUPAL_VISIT_FREQUENCY mvf,EMPLOYEE emp
	 WHERE mvf.FREQUENCYID = met.VINSVISITFREQUENCY_FREQUENCYID
	 /*and v.REASONNOTOCCURRED_REASONID is null*/
	 AND emp.EMPNUMBER = met.VINSEMPLOYEEVISITTYPE_EMPNUMBER
	 /*order by v.VISITDATE desc*/
	 limit 1) AS serviceEmpName,
	 (SELECT concat(emp.LNAME,' ',emp.FNAME) 
	 FROM METUPAL_VISITS v ,EMPLOYEE emp
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 and emp.EMPNUMBER = met.VINSEMPLOYEEBAKARALTERNAT_EMPNUMBER
	 order by v.VISITDATE desc
	 limit 1) AS bakarName,
	(SELECT 1 
	 FROM metupal_hospitalizations mh 
	 WHERE mh.METUPAL_METUPALNUMBER = met.metupalnumber
	 and mh.HOSPITALIZETYPE_HOSPITALIZETYPECODE in ('HOS','HXS')
	 and ((mh.FROMDATE <= LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')) 
	      and mh.FROMDATE >= DATE_SUB(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')), 
              INTERVAL DAY(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')))-1 DAY)) 
	     OR
	      (mh.TODATE <= LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')) 
	       and mh.TODATE >= DATE_SUB(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')), 
               INTERVAL DAY(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')))-1 DAY)))
	LIMIT 1) AS hos,
	(select to0.COMMITTEE_COMMITTEEID from metupal_treatment_order to0,common_institution ci where (ci.CATEGORY_CATEGORYID = 9) and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$tmpMonth."' LIMIT 1) AS committee_id,
	(select com.COMMITTEENAME from metupal_treatment_order to0,common_institution ci,metupal_treatment_committee com where (ci.CATEGORY_CATEGORYID = 9) and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$tmpMonth."' and to0.COMMITTEE_COMMITTEEID= com.COMMITTEEID limit 1) AS committee_name
from METUPAL met
where met.CURRENTSTATUS_STATUSID = 1 
and met.DUPLICATEDRECORD = 0 
and met.BRANCH_BRANCHID = ".$_REQUEST['branch']."
and not exists (select 1 from metupal_treatment_order to0,common_institution ci where (ci.CATEGORY_CATEGORYID = 1 OR ci.CATEGORY_CATEGORYID = 5 OR ci.CATEGORY_CATEGORYID = 2) and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$tmpMonth."') 
and exists (select 1 from metupal_treatment_order to0,common_institution ci where (ci.CATEGORY_CATEGORYID = 9) and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$tmpMonth."' and ((1=".$flagMIN.") OR (to0.WEEKLYMINUTESCOUNT > ".$tmpMIN."))) 

)
UNION ALL
(
select 	met.metupalnumber,
	concat(met.lname,' ',met.fname) AS name,
	concat(if(met.address is not null and met.address !='',met.address,met.city),',',met.city) AS address,met.city as ccity,met.address as aaddress,
	concat(if(met.address2 is not null and met.address2 !='',met.address2,met.city),',',met.city) AS address2,
	concat(met.idnum,'.',met.idnumsec) AS id,
	concat(met.PHONEPREFIX1_PHONEPREFIX,'-',met.PHONENUM1) AS phone1,
	concat(met.PHONEPREFIX2_PHONEPREFIX,'-',met.PHONENUM2) AS phone2,
	(SELECT date_add(v.VISITDATE, INTERVAL mvf.DAYSINTERVAL DAY)
	 FROM METUPAL_VISITS v ,METUPAL_VISIT_FREQUENCY mvf
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and mvf.FREQUENCYID = met.VINSVISITFREQUENCY_FREQUENCYID 
	 and v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS visitLimit,
	 met.VINSVISITCOORDINATE AS isCoor,
	(SELECT v.VISITDATE
	 FROM METUPAL_VISITS v 
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS lastVisit,
	(SELECT v.ONSCHEDUALTIME
	 FROM METUPAL_VISITS v 
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS onSchedTime,
	(SELECT v.METUPALPRESENT
	 FROM METUPAL_VISITS v 
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS onWithMetapel,
	(SELECT concat(emp.LNAME,' ',emp.FNAME)
	 FROM METUPAL_VISITS v ,EMPLOYEE emp
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 and v.EMPLOYEEVISIT_EMPNUMBER = emp.EMPNUMBER
	 order by v.VISITDATE desc
	 limit 1) AS serviceEmp,
	 (SELECT emp.PROFESSION_PROFESSIONID 
	 FROM METUPAL_VISITS v ,EMPLOYEE emp
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 and v.EMPLOYEEVISIT_EMPNUMBER = emp.EMPNUMBER
	 order by v.VISITDATE desc
	 limit 1) AS serviceEmpProf,
	(SELECT emp.EMPNUMBER
	 FROM METUPAL_VISIT_FREQUENCY mvf,EMPLOYEE emp
	 WHERE mvf.FREQUENCYID = met.VINSVISITFREQUENCY_FREQUENCYID
	 /*and mvi.METUPALVISITTYPE_METUPALNUMBER = v.METUPALVISIT_METUPALNUMBER*/
	 /*and v.REASONNOTOCCURRED_REASONID is null*/
	 AND emp.EMPNUMBER = met.VINSEMPLOYEEVISITTYPE_EMPNUMBER
	 /*order by v.VISITDATE desc*/
	 limit 1) AS serviceEmpNumber,
	 (SELECT emp.EMPNUMBER
	 FROM EMPLOYEE emp
	 WHERE emp.EMPNUMBER = met.VINSEMPLOYEEBAKARALTERNAT_EMPNUMBER 
	 limit 1) AS serviceEmpNumber2,
	(SELECT concat(emp.LNAME,' ',emp.FNAME) 
	 FROM METUPAL_VISIT_FREQUENCY mvf,EMPLOYEE emp
	 WHERE mvf.FREQUENCYID = met.VINSVISITFREQUENCY_FREQUENCYID
	 /*and mvi.METUPALVISITTYPE_METUPALNUMBER =  v.METUPALVISIT_METUPALNUMBER*/
	 /*and v.REASONNOTOCCURRED_REASONID is null*/
	 and emp.EMPNUMBER = met.VINSEMPLOYEEVISITTYPE_EMPNUMBER 
	 /*order by v.VISITDATE desc*/
	 limit 1) AS serviceEmpName,
	 (SELECT concat(emp.LNAME,' ',emp.FNAME) 
	 FROM METUPAL_VISITS v ,EMPLOYEE emp
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 AND emp.EMPNUMBER = met.VINSEMPLOYEEBAKARALTERNAT_EMPNUMBER 
	 order by v.VISITDATE desc
	 limit 1) AS bakarName,
	(SELECT 1 
	 FROM metupal_hospitalizations mh 
	 WHERE mh.METUPAL_METUPALNUMBER = met.metupalnumber
	 and mh.HOSPITALIZETYPE_HOSPITALIZETYPECODE in ('HOS','HXS')
	 and ((mh.FROMDATE <= LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')) 
	      and mh.FROMDATE >= DATE_SUB(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')), 
              INTERVAL DAY(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')))-1 DAY)) 
	     OR
	      (mh.TODATE <= LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')) 
	       and mh.TODATE >= DATE_SUB(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')), 
               INTERVAL DAY(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')))-1 DAY)))
	LIMIT 1) AS hos,
	(select to0.COMMITTEE_COMMITTEEID from metupal_treatment_order to0,common_institution ci where ci.CATEGORY_CATEGORYID != 1 and ci.CATEGORY_CATEGORYID != 5 and ci.CATEGORY_CATEGORYID != 2 and ci.CATEGORY_CATEGORYID != 9 and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$tmpMonth."' LIMIT 1) AS committee_id,
	(select com.COMMITTEENAME from metupal_treatment_order to0,common_institution ci,metupal_treatment_committee com where ci.CATEGORY_CATEGORYID != 1 and ci.CATEGORY_CATEGORYID != 5 and ci.CATEGORY_CATEGORYID != 2 and ci.CATEGORY_CATEGORYID != 9 and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$tmpMonth."' and to0.COMMITTEE_COMMITTEEID= com.COMMITTEEID limit 1) AS committee_name
from METUPAL met
where met.CURRENTSTATUS_STATUSID = 1 
and met.DUPLICATEDRECORD = 0 
and met.BRANCH_BRANCHID = ".$_REQUEST['branch']."
and not exists (select 1 from metupal_treatment_order to0,common_institution ci where (ci.CATEGORY_CATEGORYID = 1 OR ci.CATEGORY_CATEGORYID = 5 OR ci.CATEGORY_CATEGORYID = 2 OR ci.CATEGORY_CATEGORYID = 9) and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$tmpMonth."') 
and exists (select 1 from metupal_treatment_order to0,common_institution ci where ci.CATEGORY_CATEGORYID != 1 and ci.CATEGORY_CATEGORYID != 5 and ci.CATEGORY_CATEGORYID != 2 and ci.CATEGORY_CATEGORYID != 9 and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$tmpMonth."') 
and 1= (SELECT `COMPANYNATHAN` FROM `service_provider_constants` limit 1) 
and 1= met.VINSVISITNEEDED ))
 AS nir
WHERE (DATE(nir.visitLimit) <= LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')) OR nir.lastVisit is null OR nir.visitLimit is null)
and (1=".$flagSW." or (nir.serviceEmpNumber = ".$tmpSW.")) 
and (1=".$flagSW2." or (nir.serviceEmpNumber2 = ".$tmpSW2.")) 
and (1=".$flagNOCHECH." or nir.onWithMetapel = ".$tmpNOCHECH.") 
and (1=".$flagPROF." or (nir.serviceEmpProf = ".$tmpPROF."))
and (1=".$flagPROF2." or (nir.serviceEmpProf != 3 ))";


if ($flagORDERBYLIMIT==2){ $query = $query." order by name asc ";}
else if ($flagORDERBYLIMIT==0){ $query = $query." order by ccity,aaddress asc ";}
else if ($flagORDERBYLIMIT==3){ $query = $query." order by address2,name asc ";}
else if ($flagORDERBYLIMIT==5){ $query = $query." order by address2,ccity,aaddress asc ";}
else if ($flagORDERBYLIMIT==1){ $query = $query." order by /*nir.committee_id,*/nir.visitLimit";}
else if ($flagORDERBYLIMIT==4){ $query = $query." order by address2,nir.visitLimit";}

//else if ($flagORDERBYLIMIT==2){

//$query = $query." order by name";
//}
//else
//{
//$query = $query." order by nir.committee_id";
//}

  if(!$result = $db->query($query)){
     echo  'There was an error running the query [' . $db->error . ']';
}
//global $result_set1;
$result_set1 = array();
//global $len1;
$len1 = $result->num_rows;
while($row3 = $result->fetch_assoc()){
	$result_set1[] = $row3;
	//echo '1';

}
  /* move visitInstructions to metupal. Avi 31.7.19 */
    $query = "
select  metupalnumber,
	name,
	address,
	address2,
	id,
	phone1,
	phone2,
	DATE_FORMAT(visitLimit,'%d/%m/%Y') AS visitLimitS,
	DATE_FORMAT(lastVisit,'%d/%m/%Y') AS lastVisitS,
	onSchedTime,
	onWithMetapel,
	serviceEmp,
	serviceEmpNumber,
	serviceEmpName,
	hos,
	committee_id,committee_name
from (select 	met.metupalnumber,
	concat(met.lname,' ',met.fname) AS name,
	concat(if(met.address is not null and met.address !='',met.address,met.city),',',met.city) AS address,
	concat(if(met.address2 is not null and met.address2 !='',met.address2,met.city),',',met.city) AS address2,
	concat(met.idnum,'.',met.idnumsec) AS id,
	concat(met.PHONEPREFIX1_PHONEPREFIX,'-',met.PHONENUM1) AS phone1,
	concat(met.PHONEPREFIX2_PHONEPREFIX,'-',met.PHONENUM2) AS phone2,
	(SELECT date_add(v.VISITDATE, INTERVAL mvf.DAYSINTERVAL DAY)
	 FROM METUPAL_VISITS v ,METUPAL_VISIT_FREQUENCY mvf
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 AND mvf.FREQUENCYID = met.VINSVISITFREQUENCY_FREQUENCYID
	 and v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS visitLimit,
	(SELECT v.VISITDATE
	 FROM METUPAL_VISITS v 
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS lastVisit,
	(SELECT v.ONSCHEDUALTIME
	 FROM METUPAL_VISITS v 
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS onSchedTime,
	(SELECT v.METUPALPRESENT
	 FROM METUPAL_VISITS v 
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 order by v.VISITDATE desc
	 limit 1) AS onWithMetapel,
	(SELECT concat(emp.LNAME,' ',emp.FNAME)
	 FROM METUPAL_VISITS v ,EMPLOYEE emp
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 and v.REASONNOTOCCURRED_REASONID is null
	 and v.EMPLOYEEVISIT_EMPNUMBER = emp.EMPNUMBER
	 order by v.VISITDATE desc
	 limit 1) AS serviceEmp,
	(SELECT emp.EMPNUMBER
	 FROM METUPAL_VISITS v ,METUPAL_VISIT_FREQUENCY mvf,EMPLOYEE emp
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 AND mvf.FREQUENCYID = met.VINSVISITFREQUENCY_FREQUENCYID
	 and v.REASONNOTOCCURRED_REASONID is null
	 AND emp.EMPNUMBER = met.VINSEMPLOYEEVISITTYPE_EMPNUMBER
	 order by v.VISITDATE desc 
	 limit 1) AS serviceEmpNumber,
	 (SELECT concat(emp.LNAME,' ',emp.FNAME) 
	 FROM METUPAL_VISITS v ,METUPAL_VISIT_FREQUENCY mvf,EMPLOYEE emp
	 WHERE v.METUPALVISIT_METUPALNUMBER = met.metupalnumber
	 AND mvf.FREQUENCYID = met.VINSVISITFREQUENCY_FREQUENCYID
	 and v.REASONNOTOCCURRED_REASONID is null
	 AND emp.EMPNUMBER = met.VINSEMPLOYEEVISITTYPE_EMPNUMBER
	 order by v.VISITDATE desc
	 limit 1) AS serviceEmpName,
	(SELECT 1 
	 FROM metupal_hospitalizations mh 
	 WHERE mh.METUPAL_METUPALNUMBER = met.metupalnumber
	 and mh.HOSPITALIZETYPE_HOSPITALIZETYPECODE in ('HOS','HXS')
	 and ((mh.FROMDATE <= LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')) 
	      and mh.FROMDATE >= DATE_SUB(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')), 
              INTERVAL DAY(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')))-1 DAY)) 
	     OR
	      (mh.TODATE <= LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')) 
	       and mh.TODATE >= DATE_SUB(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')), 
               INTERVAL DAY(LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')))-1 DAY)))
	LIMIT 1) AS hos,
	(select to0.COMMITTEE_COMMITTEEID from metupal_treatment_order to0,common_institution ci where (ci.CATEGORY_CATEGORYID = 9) and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$tmpMonth."' LIMIT 1) AS committee_id,
	(select com.COMMITTEENAME from metupal_treatment_order to0,common_institution ci,metupal_treatment_committee com where (ci.CATEGORY_CATEGORYID = 9) and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$tmpMonth."' and to0.COMMITTEE_COMMITTEEID= com.COMMITTEEID limit 1) AS committee_name
from METUPAL met
where met.CURRENTSTATUS_STATUSID = 1 
and met.DUPLICATEDRECORD = 0 
and met.BRANCH_BRANCHID = ".$_REQUEST['branch']."
and not exists (select 1 from metupal_treatment_order to0,common_institution ci where (ci.CATEGORY_CATEGORYID = 1 OR ci.CATEGORY_CATEGORYID = 5) and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$tmpMonth."') 
and exists (select 1 from metupal_treatment_order to0,common_institution ci where (ci.CATEGORY_CATEGORYID = 9) and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$tmpMonth."') 
";
if ($flagORDERBYLIMIT==2){ $query = $query." order by name asc ";}
else if ($flagORDERBYLIMIT==3){ $query = $query." order by address2,name asc ";}
else{ $query = $query." order by met.city,address asc ";}
$query = $query." 
) AS nir
WHERE (DATE(nir.visitLimit) <= LAST_DAY(STR_TO_DATE('".$tmpDate."','%d-%m-%Y')) OR nir.lastVisit is null OR nir.visitLimit is null)
and (1=".$flagSW." or (nir.serviceEmpNumber = ".$tmpSW."))";

if ($flagORDERBYLIMIT==1){

$query = $query." order by nir.visitLimit";
}


//  if(!$result = $db->query($query)){
//    echo  'There was an error running the query [' . $db->error . ']';
//}

//global $len1;
//$lentt1 = $result->num_rows;
//while($row33 = $result->fetch_assoc()){
//	$result_set1[] = $row33;
	//echo '1';

//}

  //$len1 = $len1 + $lentt1;
  
  
  $result_vaada = array();
  
   for ($i=0; $i<$len1; $i++)
  {
	$boolFlag=0;
	for($i_h=0;$i_h<count($result_vaada);$i_h++)
	{
		if ($result_set1[$i]['committee_id']==$result_vaada[$i_h]){
			$boolFlag=1;
			break;
		}
	}
	if ($boolFlag==0){
		$result_vaada[] = $result_set1[$i]['committee_id'];
		//echo $result_set1[$i]['committee_id'];
	
	}
  }
  
  ?>



<div class="page">
<table v:shapes="_x0000_s1032" cellpadding=0 cellspacing=0 width=643
 height=214 border=0 dir=rtl style='width:481.89pt;height:160.66pt;border-collapse:
 collapse;left:56.69pt;z-index:6;margin-left:20pt'>

 
 <?php 
 $j = 3;
 
 $comm = 0;
 
 
 	for($i_h=0;$i_h<count($result_vaada);$i_h++)
	{

	$flagFirst = 1;
 
 $lastEzor='';
 $countEzor=0;
 for ($i=0; $i<$len1; $i++)
  {
  //if ($comm!=$result_set1[$i]['committee_id']){
	//$comm=$result_set1[$i]['committee_id'];
	if ($result_vaada[$i_h]==$result_set1[$i]['committee_id']){
	if ($flagFirst==1){
	echo "
	<tr>
 
  <td width=113 colspan=8 valign=Top dir=rtl style='width:85.0393pt;height:
  40.6563pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;
  padding-bottom:2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'><br>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:9.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:9.0pt;font-weight:bold'>".iconv('UTF-8', 'Windows-1255', $result_set1[$i]['committee_id'].' - '.$result_set1[$i]['committee_name'])."</span></p><br>
  </td></tr><tr>
	<tr>
 
  <td width=113 height=65 valign=Top dir=rtl style='width:85.0393pt;height:
  40.6563pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;
  padding-bottom:2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:9.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:9.0pt;font-weight:bold'>שם המטופל</span></p>
  </td>
  <td width=178 height=65 valign=Top dir=rtl style='width:133.2283pt;
  height:40.6563pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;
  padding-bottom:2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:9.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:9.0pt;font-weight:bold'>כתובת</span></p>
  </td>
  <td width=84 height=65 valign=Top dir=rtl style='width:65.2102pt;height:40.6563pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:9.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:9.0pt;font-weight:bold'>טלפון</span></p>
  </td>
  <td width=63 height=65 valign=Top dir=rtl style='width:47.3547pt;height:40.6563pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;direction:rtl;unicode-bidi:embed;
  text-align:center'><span lang=he style='font-size:8.0pt;font-family:Arial;
  language:he;direction:rtl;unicode-bidi:normal;font-size:8.0pt;font-weight:bold'>תאריך ביקור קודם/בזמן שיבוץ?</span></p>
  </td>
    <td width=48 height=65 valign=Top dir=rtl style='width:35.4569pt;height:40.6563pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;direction:rtl;unicode-bidi:embed;
  text-align:center'><span lang=he style='font-size:8.0pt;font-family:Arial;
  language:he;direction:rtl;unicode-bidi:normal;font-size:8.0pt;font-weight:bold'>מטפל נוכח בביקור קודם</span></p>
  </td>

  <td width=63 height=65 valign=Top dir=rtl style='width:47.6712pt;height:40.6563pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;direction:rtl;unicode-bidi:embed;
  text-align:center'><span lang=he style='font-size:9.0pt;font-family:Arial;
  language:he;direction:rtl;unicode-bidi:normal;font-size:9.0pt;font-weight:bold'>תאריך סופי לביקור</span></p>
  </td>
  <td width=48 height=65 valign=Top dir=rtl style='width:35.4569pt;height:40.6563pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;direction:rtl;unicode-bidi:embed;
  text-align:center'><span lang=he style='font-size:8.0pt;font-family:Arial;
  language:he;direction:rtl;unicode-bidi:normal;font-size:8.0pt;font-weight:bold'>המטופל היה מאושפז</span></p>
  </td>
  <td width=103 height=65 valign=Top dir=rtl style='width:77.9288pt;height:
  40.6563pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;
  padding-bottom:2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;direction:rtl;unicode-bidi:embed;
  text-align:center'><span lang=he style='font-size:8.0pt;font-family:Arial;
  language:he;direction:rtl;unicode-bidi:normal;font-size:8.0pt;font-weight:bold'> מבצע הביקור הקודם>הבא</span></p>
  </td>
 </tr>";
 $j++;
 $flagFirst=0;
  }
  
  
  	
	if (($flagORDERBYLIMIT>2)&&($lastEzor!=$result_set1[$i]['address2'])){
	
	if ($countEzor>0){
	echo "
	<tr>
 
  <td width=113 colspan=8 valign=Top dir=rtl style='width:85.0393pt;height:
  20.6563pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;
  padding-bottom:2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:9.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:9.0pt;font-weight:bold'>סה\"כ לאיזור ".iconv('UTF-8', 'Windows-1255', $lastEzor)." : ".$countEzor."</span></p>
  </td></tr>";
	}
	
	echo "
	<tr>
 
  <td width=113 colspan=8 valign=Top dir=rtl style='width:85.0393pt;padding-left:2.88pt;padding-right:7.88pt;padding-top:2.88pt;
  padding-bottom:2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:9.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:9.0pt;font-weight:bold'>".iconv('UTF-8', 'Windows-1255', $result_set1[$i]['address2'])."</span></p>
  </td></tr>";
 
 $lastEzor=$result_set1[$i]['address2'];
 $countEzor=0;
  }
  
  
  $countEzor++;
$j++;
 
 echo "
 <tr>
  <td width=113 height=33 valign=Top dir=rtl style='width:85.0393pt;height:
  25.1583pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;
  padding-bottom:2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:8.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:8.0pt'>".iconv('UTF-8', 'Windows-1255', $result_set1[$i]['name']);
  
  if ($result_set1[$i]['isCoor']==1){
  echo "&nbsp<b>(ת)</b>";
  }
  
  echo "</span></p>
  <p class=MsoNormal style='direction:rtl;unicode-bidi:embed;text-align:left'><span
  lang=he style='font-size:8.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:8.0pt'><span dir=rtl></span>".$result_set1[$i]['id']."</span></p>
  </td>
  <td width=178 height=33 valign=Top dir=rtl style='width:133.2283pt;
  height:25.1583pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;
  padding-bottom:2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:8.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:8.0pt'>".iconv('UTF-8', 'Windows-1255', $result_set1[$i]['address'])."</span></p>
  </td>
  <td width=84 height=33 valign=Top dir=rtl style='width:65.2102pt;height:25.1583pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:8.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:8.0pt'>".$result_set1[$i]['phone1']."</span></p>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:8.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:8.0pt'><span dir=rtl></span>".$result_set1[$i]['phone2']."</span></p>
  </td>
  <td width=63 height=33 valign=Top dir=rtl style='width:47.3547pt;height:25.1583pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  dir=ltr lang=en-US style='font-size:8.0pt;font-family:Arial;language:en-US;
  direction:ltr;unicode-bidi:embed'>".$result_set1[$i]['lastVisitS']."</span></p>
  <p class=MsoNormal style='text-align:center;direction:rtl;unicode-bidi:embed;
  text-align:center'><span lang=he style='font-size:8.0pt;font-family:Arial;
  language:he;direction:rtl;unicode-bidi:normal;font-size:8.0pt'>";
  if (is_null($result_set1[$i]['onSchedTime'])){
	echo "&nbsp";
  }
  else
  {
	if ($result_set1[$i]['onSchedTime']==1){
		echo "כן";
	}
	else{
		echo "לא";
	}
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=33 valign=Top dir=rtl style='width:35.4569pt;height:25.1583pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;direction:rtl;unicode-bidi:embed;
  text-align:center'><span lang=he style='font-size:8.0pt;font-family:Arial;
  language:he;direction:rtl;unicode-bidi:normal;font-size:8.0pt'>";
  if (is_null($result_set1[$i]['onWithMetapel'])){
	echo "&nbsp";
  }
  else
  {
	if ($result_set1[$i]['onWithMetapel']==1){
		echo "כן";
	}
	else{
		echo "לא";
	}
  }
  
  echo "</span></p>
  </td>
  <td width=63 height=33 valign=Top dir=rtl style='width:47.6712pt;height:25.1583pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:8.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:8.0pt'><span dir=rtl></span>".$result_set1[$i]['visitLimitS']."</span></p>
  </td>
  <td width=48 height=33 valign=Top dir=rtl style='width:35.4569pt;height:25.1583pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;direction:rtl;unicode-bidi:embed;
  text-align:center'><span lang=he style='font-size:8.0pt;font-family:Arial;
  language:he;direction:rtl;unicode-bidi:normal;font-size:8.0pt'>";
  if (is_null($result_set1[$i]['hos'])){
	echo "לא";
  }
  else
  {
	if ($result_set1[$i]['hos']==1){
		echo "כן";
	}
	else{
		echo "לא";
	}
  }
  
  echo "</span></p>
  </td>
  <td width=103 height=33 valign=Top dir=rtl style='width:77.9288pt;height:
  25.1583pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;
  padding-bottom:2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:8.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:8.0pt'>";
  echo iconv('UTF-8', 'Windows-1255', $result_set1[$i]['serviceEmp']);
  if ($result_set1[$i]['serviceEmpProf']==1) echo '(ע)';
	else if ($result_set1[$i]['serviceEmpProf']==2) echo '(א)';
	else if ($result_set1[$i]['serviceEmpProf']==3){ echo '(ב)';
		if (!is_null($result_set1[$i]['serviceEmpName']))  echo '<br/>>'.iconv('UTF-8', 'Windows-1255', $result_set1[$i]['serviceEmpName']);
	}
	else if ($result_set1[$i]['serviceEmpProf']==4) echo '(ג)';
	else if ($result_set1[$i]['serviceEmpProf']==5) echo '(ר)';
	
	if ($result_set1[$i]['serviceEmpProf']!=3 && (!is_null($result_set1[$i]['bakarName']))){
		echo '<br/>>'.iconv('UTF-8', 'Windows-1255', $result_set1[$i]['bakarName']);
	}
	
	
	
  echo "</span></p>
  </td>
 </tr>";
 
 
 if (isset($_REQUEST['expand'])){
 
  echo "
	<tr>
 
  <td width=113 colspan=8 valign=Top dir=rtl style='width:85.0393pt;padding-left:2.88pt;padding-right:7.88pt;padding-top:2.88pt;
  padding-bottom:2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:9.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:9.0pt;font-weight:bold'>";
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////	START     ///////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$query = "select *,
	(select r.TYPENAME 
	from metupal_treatment_order_type r 
	where r.TYPEID = nir.TREATMENTTYPE_TYPEID) AS TYPENAME,
(select concat( r.COMMITTEENUMBER,'-',r.COMMITTEENAME)
	from metupal_treatment_committee r 
	where r.COMMITTEEID = nir.COMMITTEE_COMMITTEEID) AS committee
from (
		select met.metupalnumber,
concat(met.lname,' ',met.fname) AS name,
			concat(met.idnum,'.',met.idnumsec) AS id,
			concat(met.ADDRESS,',',met.CITY) AS address,
			concat(met.PHONEPREFIX1_PHONEPREFIX,'-',met.PHONENUM1) AS phone,
			to0.*,
			DATE_FORMAT(to0.ORDERTODATE,'%d/%m/%Y') AS toDate,
			DATE_FORMAT(to0.ORDERFROMDATE,'%d/%m/%Y') AS fromDate
		from metupal met,metupal_treatment_order to0,common_institution ci
		where met.CURRENTSTATUS_STATUSID = 1 
		and met.DUPLICATEDRECORD = 0 
		and to0.METOPAL_METUPALNUMBER = met.METUPALNUMBER 
		and ci.BL = 1
		and DATE_FORMAT(to0.MONTHDATE,'%m/%Y') = '".$_REQUEST['month']."'
and to0.INSTITUTION_INSTITUTIONID = ci.INSTITUTIONID
and metupalnumber = ".$result_set1[$i]['metupalnumber'].") AS nir
		order by nir.name";

  if(!$result = $db->query($query)){
     echo  'There was an error running the query [' . $db->error . ']';
}
$metupals_num = $result->num_rows;
$metupals = array();
while($row = $result->fetch_assoc()){
	$metupals[] = $row;
}

for ($c_met=0; $c_met<$metupals_num; $c_met++)
  {

$query = "SELECT mr.* ,(select k.KINSHIP from common_kinship k where k.KINSHIPID= mr.RELATIVITY_KINSHIPID ) kin
FROM metupal_relative mr 
WHERE mr.METUPAL_METUPALNUMBER = ".$metupals[$c_met]['metupalnumber']."
 LIMIT 1";
  
   if(!$result = $db->query($query)){
     echo  'There was an error running the query [' . $db->error . ']';
}
//global $row1;
$relative = $result->fetch_assoc();


 $query = "select * from (SELECT tas.*,emp.empnumber,concat(emp.lname,' ',emp.fname) AS name,
			concat(emp.idnum,'.',emp.idnumsec) AS id,
			concat(emp.ADDRESS,',',emp.CITY) AS address,
			concat(emp.PHONEPREFIX1_PHONEPREFIX,'-',emp.PHONENUM1) AS phone,
DATE_FORMAT(tas.TODATE,'%d/%m/%Y') AS toDate0,
			DATE_FORMAT(tas.FROMDATE,'%d/%m/%Y') AS fromDate0
FROM metupal_treatment_assign tas,employee emp
WHERE tas.ORDER_RECORDID=".$metupals[$c_met]['RECORDID']."
and tas.TEMPORARY = 0 
AND tas.EMPLOYEE_EMPNUMBER = emp.EMPNUMBER) AS nir
order by nir.name";

  if(!$result = $db->query($query)){
     echo  'There was an error running the query [' . $db->error . ']';
}
$assigns_num = $result->num_rows;
$assigns = array();
while($row = $result->fetch_assoc()){
	$assigns[] = $row;
}

for ($c_ass=0; $c_ass<$assigns_num; $c_ass++)
  {
 
 
$query = "SELECT * FROM `metupal_treatment_assign_schedule` WHERE `TREATMENT_ASSIGN_ID`=".$assigns[$c_ass]['RECORDID']." order by `WEEKDAYNUMBER`";

  if(!$result = $db->query($query)){
     echo  'There was an error running the query [' . $db->error . ']';
}
unset($result_set001);
$result_set001 = array();
$len001 = 0;
$len001 = $result->num_rows;
while($row = $result->fetch_assoc()){
	$result_set001[] = $row;
}


echo "

<table v:shapes=\"_x0000_s1025\" cellpadding=0 cellspacing=0 width=559
  border=0 dir=rtl style='width:419.53pt;border-collapse:
 collapse;left:93.54pt;margin-left:20pt;z-index:1'>";
 
 
 
	 echo "
 

 
 
 <tr>
 
  
  <td width=77 height=17 valign=Top dir=rtl  style='width:52.7594pt;
  height:12.1592pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;
  padding-bottom:0;border-right:solid black 1pt;border-top:solid black 1pt;
  border-left:solid black 1pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  lang=he style='font-size:8pt;line-height:75%;font-family:Arial;font-weight:
  bold;language:he;direction:rtl;unicode-bidi:normal;font-size:8pt;
  font-weight:bold'>שם המטפל:</span></p>
  </td>
  
 
  <td width=49 height=16 valign=Top dir=rtl style='width:36.9563pt;height:11.6592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  0.88pt;border-top:solid black 1.0pt;border-left:solid black 1.0pt;border-bottom:
  solid black 1.0pt'>
  <p class=MsoNormal style='line-height:75%'><span dir=ltr lang=he
  style='font-size:8pt;line-height:75%;font-family:Arial;language:he;
  direction:ltr;unicode-bidi:embed'>&nbsp;</span></p>
  </td>
  <td width=48 height=16 valign=Top dir=rtl style='width:35.803pt;height:11.6592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  lang=he style='font-size:8pt;line-height:75%;font-family:Arial;text-decoration:
  underline;font-weight:bold;language:he;direction:rtl;unicode-bidi:normal;
  font-size:8pt;font-weight:bold'>ראשון</span></p>
  </td>
  <td width=48 height=16 valign=Top dir=rtl style='width:35.8031pt;height:11.6592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  lang=he style='font-size:8pt;line-height:75%;font-family:Arial;text-decoration:
  underline;font-weight:bold;language:he;direction:rtl;unicode-bidi:normal;
  font-size:8pt;font-weight:bold'>שני</span></p>
  </td>
  <td width=46 height=16 valign=Top dir=rtl style='width:35.1111pt;height:11.6592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  lang=he style='font-size:8pt;line-height:75%;font-family:Arial;text-decoration:
  underline;font-weight:bold;language:he;direction:rtl;unicode-bidi:normal;
  font-size:8pt;font-weight:bold'>שלישי</span></p>
  </td>
  <td width=48 height=16 valign=Top dir=rtl style='width:35.8031pt;height:11.6592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  lang=he style='font-size:8pt;line-height:75%;font-family:Arial;text-decoration:
  underline;font-weight:bold;language:he;direction:rtl;unicode-bidi:normal;
  font-size:8pt;font-weight:bold'>רביעי</span></p>
  </td>
  <td width=48 height=16 valign=Top dir=rtl style='width:35.8031pt;height:11.6592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  lang=he style='font-size:8pt;line-height:75%;font-family:Arial;text-decoration:
  underline;font-weight:bold;language:he;direction:rtl;unicode-bidi:normal;
  font-size:8pt;font-weight:bold'>חמישי</span></p>
  </td>
  <td width=48 height=16 valign=Top dir=rtl style='width:35.803pt;height:11.6592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  lang=he style='font-size:8pt;line-height:75%;font-family:Arial;text-decoration:
  underline;font-weight:bold;language:he;direction:rtl;unicode-bidi:normal;
  font-size:8pt;font-weight:bold'>שישי</span></p>
  </td>
  <td width=47 height=16 valign=Top dir=rtl style='width:35.8031pt;height:11.6592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  lang=he style='font-size:8pt;line-height:75%;font-family:Arial;text-decoration:
  underline;font-weight:bold;language:he;direction:rtl;unicode-bidi:normal;
  font-size:8pt;font-weight:bold'>שבת</span></p>
  </td>
  <!--td width=54 height=16 valign=Top dir=rtl colspan=2 style='width:39.998pt;height:11.6592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;border-left:solid black 1.0pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%'><span
  lang=he style='font-size:8pt;line-height:75%;font-family:Arial;font-weight:bold;language:he;direction:rtl;unicode-bidi:normal;
  font-size:8pt;'>טלפון:</span></p>
  </td-->
  
 </tr>
 <tr>
 
  <td width=92 height=17 valign=Top dir=rtl style='width:76.7174pt;
  height:12.1592pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:1.88pt;
  padding-bottom:0;border-left:solid black 1pt;border-right:solid black 1pt;
  border-bottom:solid black 1pt'>
  <p class=MsoNormal style='line-height:75%;text-align:right'><span lang=he style='font-size:
  8.0pt;line-height:75%;font-family:Arial;font-weight:bold;language:he;
  direction:rtl;unicode-bidi:normal;font-size:8pt;font-weight:bold'>".iconv('UTF-8', 'Windows-1255', $assigns[$c_ass]['name'])."</span></p>
  </td>
 
 
  <td width=49 height=16 valign=Top dir=rtl style='width:36.9563pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:1.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='line-height:75%'><span lang=he style='font-size:
  8.0pt;line-height:75%;font-family:Arial;font-weight:bold;language:he;
  direction:rtl;unicode-bidi:normal;font-size:8pt;font-weight:bold'>משעה</span></p>
  </td>
  <td width=48 height=16 valign=Top dir=rtl style='width:35.803pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:1.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=en-US style='font-size:8pt;line-height:75%;font-family:Arial;
  language:en-US;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==1)
  {
  echo nicerHour($result_set001[$j]['HFROM1']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=16 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:1.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=en-US style='font-size:8pt;line-height:75%;font-family:Arial;
  language:en-US;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==2)
  {
  echo nicerHour($result_set001[$j]['HFROM1']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=46 height=16 valign=Top dir=rtl style='width:35.1111pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:1.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==3)
  {
  echo nicerHour($result_set001[$j]['HFROM1']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=16 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:1.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==4)
  {
  echo nicerHour($result_set001[$j]['HFROM1']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=16 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:1.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==5)
  {
  echo nicerHour($result_set001[$j]['HFROM1']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=16 valign=Top dir=rtl style='width:35.803pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:1.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==6)
  {
  echo nicerHour($result_set001[$j]['HFROM1']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=47 height=16 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:1.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==7)
  {
  echo nicerHour($result_set001[$j]['HFROM1']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <!--td width=54 height=16 valign=Top dir=rtl style='width:39.998pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:1.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt'>
  <p class=MsoNormal style='line-height:75%'><span dir=ltr lang=he
  style='font-size:8pt;line-height:75%;font-family:Arial;language:he;
  direction:ltr;unicode-bidi:embed'>&nbsp;</span></p>
  </td-->
  <!--td width=47 height=16 valign=Top colspan=2 dir=rtl style='width:35.803pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:1.88pt;border-bottom:solid black 1.0pt;border-left:solid black 1.0pt;padding-bottom:
  2.88pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%'><span dir=ltr lang=he
  style='font-size:8pt;line-height:75%;font-family:Arial;language:he;
  direction:ltr;unicode-bidi:embed'>".$assigns[$c_ass]['phone']."</span></p>
  </td-->
 
 </tr>
 <tr>
 <td width=48 height=17 valign=Top dir=rtl style='width:35.8031pt;height:12.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  '>
  <p class=MsoNormal style='line-height:75%;text-align:center;'><span lang=he style='font-size:
  8.0pt;line-height:75%;font-family:Arial;font-weight:bold;language:he;
  direction:rtl;unicode-bidi:normal;font-size:8pt;font-weight:bold'>ת.שיבוץ:</span></p>
  </td>
 
  <td width=49 height=17 valign=Top dir=rtl style='width:36.9563pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='line-height:75%'><span lang=he style='font-size:
  8.0pt;line-height:75%;font-family:Arial;font-weight:bold;language:he;
  direction:rtl;unicode-bidi:normal;font-size:8pt;font-weight:bold'>עד שעה</span></p>
  </td>
  <td width=48 height=17 valign=Top dir=rtl style='width:35.803pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=en-US style='font-size:8pt;line-height:75%;font-family:Arial;
  language:en-US;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==1)
  {
  echo nicerHour($result_set001[$j]['HTO1']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=17 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=en-US style='font-size:8pt;line-height:75%;font-family:Arial;
  language:en-US;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==2)
  {
  echo nicerHour($result_set001[$j]['HTO1']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=46 height=17 valign=Top dir=rtl style='width:35.1111pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==3)
  {
  echo nicerHour($result_set001[$j]['HTO1']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=17 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==4)
  {
  echo nicerHour($result_set001[$j]['HTO1']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=17 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==5)
  {
  echo nicerHour($result_set001[$j]['HTO1']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=17 valign=Top dir=rtl style='width:35.803pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==6)
  {
  echo nicerHour($result_set001[$j]['HTO1']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=47 height=17 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==7)
  {
  echo nicerHour($result_set001[$j]['HTO1']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <!--td width=54 height=17 valign=Top dir=rtl style='width:39.998pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt'>
  <p class=MsoNormal style='line-height:75%'><span dir=ltr lang=he
  style='font-size:8pt;line-height:75%;font-family:Arial;language:he;
  direction:ltr;unicode-bidi:embed'>&nbsp;</span></p>
  </td>
  <td width=47 height=17 colspan=2 valign=Top dir=rtl style='width:35.803pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;border-bottom:solid black 1.0pt;border-left:solid black 1.0pt;padding-bottom:
  2.88pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%'><span dir=ltr lang=he
  style='font-size:8pt;line-height:75%;font-family:Arial;font-weight:bold;text-align:center;language:he;
  direction:ltr;unicode-bidi:embed'>";
  if ($assigns[$c_ass]['TEMPORARY']==1){echo 'החלפה';}else{echo 'שיבוץ קבוע';}
  echo "</span></p>
  </td-->
 
 </tr>
 <tr>
 <td width=72 height=17 valign=Top dir=rtl style='width:54.2475pt;
  height:12.1592pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;
  padding-bottom:0;border-left:solid black 1.0pt;border-right:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='line-height:75%;text-align:right'><span lang=he style='font-size:
  8.0pt;line-height:75%;font-family:Arial;language:he;direction:rtl;unicode-bidi:
  normal;font-size:9.5pt'>".$assigns[$c_ass]['fromDate0'].'-';
  if (!is_null($assigns[$c_ass]['toDate0'])){ echo $assigns[$c_ass]['toDate0'];}else{ echo '&infin;';}
  echo "</span></p>
  </td>
  <td width=49 height=16 valign=Top dir=rtl style='width:36.9563pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='line-height:75%'><span lang=he style='font-size:
  8.0pt;line-height:75%;font-family:Arial;font-weight:bold;language:he;
  direction:rtl;unicode-bidi:normal;font-size:8pt;font-weight:bold'>משעה</span></p>
  </td>
  <td width=48 height=16 valign=Top dir=rtl style='width:35.803pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==1)
  {
  echo nicerHour($result_set001[$j]['HFROM2']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=16 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==2)
  {
  echo nicerHour($result_set001[$j]['HFROM2']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=46 height=16 valign=Top dir=rtl style='width:35.1111pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==3)
  {
  echo nicerHour($result_set001[$j]['HFROM2']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=16 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==4)
  {
  echo nicerHour($result_set001[$j]['HFROM2']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=16 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==5)
  {
  echo nicerHour($result_set001[$j]['HFROM2']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=16 valign=Top dir=rtl style='width:35.803pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==6)
  {
  echo nicerHour($result_set001[$j]['HFROM2']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=47 height=16 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==7)
  {
  echo nicerHour($result_set001[$j]['HFROM2']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <!--td width=177 height=16 valign=Top dir=rtl colspan=2 style='width:132.6413pt;
  height:11.1592pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;
  padding-bottom:0;border-right:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  lang=he style='font-size:8pt;line-height:75%;font-family:Arial;font-weight:
  bold;language:he;direction:rtl;unicode-bidi:normal;font-size:8pt;
  font-weight:bold'>סה“כ</span></p>
  </td-->
 </tr>
 <tr>
 <td width=47 height=16 valign=Top dir=rtl style='width:35.803pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:1.88pt;border-bottom:solid black 1.0pt;border-left:solid black 1.0pt;border-right:solid black 1.0pt;padding-bottom:
  2.88pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%'><span dir=ltr lang=he
  style='font-size:8pt;line-height:75%;font-family:Arial;language:he;
  direction:ltr;unicode-bidi:embed'>".$assigns[$c_ass]['phone']."</span></p>
  </td>
  <td width=49 height=17 valign=Top dir=rtl style='width:36.9563pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='line-height:75%'><span lang=he style='font-size:
  8.0pt;line-height:75%;font-family:Arial;font-weight:bold;language:he;
  direction:rtl;unicode-bidi:normal;font-size:8pt;font-weight:bold'>עד שעה</span></p>
  </td>
  <td width=48 height=17 valign=Top dir=rtl style='width:35.803pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==1)
  {
  echo nicerHour($result_set001[$j]['HTO2']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=17 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==2)
  {
  echo nicerHour($result_set001[$j]['HTO2']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=46 height=17 valign=Top dir=rtl style='width:35.1111pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==3)
  {
  echo nicerHour($result_set001[$j]['HTO2']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=17 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==4)
  {
  echo nicerHour($result_set001[$j]['HTO2']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=17 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==5)
  {
  echo nicerHour($result_set001[$j]['HTO2']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=48 height=17 valign=Top dir=rtl style='width:35.803pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==6)
  {
  echo nicerHour($result_set001[$j]['HTO2']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <td width=47 height=17 valign=Top dir=rtl style='width:35.8031pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-left:solid black 1.0pt;
  border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  dir=ltr lang=he style='font-size:8pt;line-height:75%;font-family:Arial;
  language:he;direction:ltr;unicode-bidi:embed'>";
  
  $flag=0;
  for ($j=0; $j<$len001; $j++)
  {
  if ($result_set001[$j]['WEEKDAYNUMBER']==7)
  {
  echo nicerHour($result_set001[$j]['HTO2']);
  $flag=1;
  break;
  }
  }
  if ($flag==0)
  {
  echo '&nbsp;';
  }
  
  echo "</span></p>
  </td>
  <!--td width=54 height=17 valign=Top dir=rtl style='width:39.998pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  lang=he style='font-size:8pt;line-height:75%;font-family:Arial;font-weight:
  bold;language:he;direction:rtl;unicode-bidi:normal;font-size:8pt;
  font-weight:bold'>שעות</span></p>
  </td>
  <td width=47 height=17 valign=Top dir=rtl style='width:35.803pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  lang=he style='font-size:8pt;line-height:75%;font-family:Arial;font-weight:
  bold;language:he;direction:rtl;unicode-bidi:normal;font-size:8pt;
  font-weight:bold'>ימים</span></p>
  </td-->
  <!--td width=100 height=17 valign=Top dir=rtl style='width:80.8402pt;height:11.1592pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;padding-bottom:
  0.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;line-height:75%;text-align:center'><span
  lang=he style='font-size:8pt;line-height:75%;font-family:Arial;font-weight:
  bold;language:he;direction:rtl;unicode-bidi:normal;font-size:8pt;
  font-weight:bold'>שעות הזמנה</span></p>
  </td-->
 </tr>
 
 </table>
 
  ";


 
 
 
 unset($result_set001);
 unset($len001);
 
 
 
  
  
 
 
 }} 

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////////////////////////////////////////////   	END       ///////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
  //echo 'php SumSchedFormForMetupalIner.php?toPrint=0&monthDate='.$tmpDate.'&month='.$tmpMonth.'&metupal='.$result_set1[$i]['metupalnumber'];
  //$j = './SumSchedFormForMetupalIner.php?toPrint=0&monthDate='.$tmpDate.'&month='.$tmpMonth.'&metupal='.$result_set1[$i]['metupalnumber'];
  //include($j);
  
  //$output = shell_exec('php '.$j.';');
  
   //$output = shell_exec();
   //echo $output;
  
  echo "</span></p>
  </td></tr>";
 
 
 }
 
 if ($j>22){
 /*echo "</tr>
</table></div>
 <div class=\"page\">
<table v:shapes=\"_x0000_s1032\" cellpadding=0 cellspacing=0 width=643
 height=214 border=0 dir=rtl style='width:481.89pt;height:160.66pt;border-collapse:
 collapse;left:56.69pt;z-index:6;margin-left:20pt'>
<tr>
	<tr>
 
  <td width=113 height=65 valign=Top dir=rtl style='width:85.0393pt;height:
  40.6563pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:0.88pt;
  padding-bottom:0;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:9.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:9.0pt;font-weight:bold'>שם המטופל</span></p>
  </td>
  <td width=178 height=65 valign=Top dir=rtl style='width:133.2283pt;
  height:40.6563pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;
  padding-bottom:2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:9.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:9.0pt;font-weight:bold'>כתובת</span></p>
  </td>
  <td width=84 height=65 valign=Top dir=rtl style='width:65.2102pt;height:40.6563pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:9.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:9.0pt;font-weight:bold'>טלפון</span></p>
  </td>
  <td width=63 height=65 valign=Top dir=rtl style='width:47.3547pt;height:40.6563pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;direction:rtl;unicode-bidi:embed;
  text-align:center'><span lang=he style='font-size:8.0pt;font-family:Arial;
  language:he;direction:rtl;unicode-bidi:normal;font-size:8.0pt;font-weight:bold'>תאריך ביקור קודם/בזמן שיבוץ?</span></p>
  </td>
  <td width=48 height=65 valign=Top dir=rtl style='width:35.4569pt;height:40.6563pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;direction:rtl;unicode-bidi:embed;
  text-align:center'><span lang=he style='font-size:8.0pt;font-family:Arial;
  language:he;direction:rtl;unicode-bidi:normal;font-size:8.0pt;font-weight:bold'>מטפל נוכח בביקור קודם</span></p>
  </td>

  <td width=63 height=65 valign=Top dir=rtl style='width:47.6712pt;height:40.6563pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;direction:rtl;unicode-bidi:embed;
  text-align:center'><span lang=he style='font-size:9.0pt;font-family:Arial;
  language:he;direction:rtl;unicode-bidi:normal;font-size:9.0pt;font-weight:bold'>תאריך סופי לביקור</span></p>
  </td>
  <td width=48 height=65 valign=Top dir=rtl style='width:35.4569pt;height:40.6563pt;
  padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;padding-bottom:
  2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;direction:rtl;unicode-bidi:embed;
  text-align:center'><span lang=he style='font-size:8.0pt;font-family:Arial;
  language:he;direction:rtl;unicode-bidi:normal;font-size:8.0pt;font-weight:bold'>המטופל היה מאושפז</span></p>
  </td>
  <td width=103 height=65 valign=Top dir=rtl style='width:77.9288pt;height:
  40.6563pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;
  padding-bottom:2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:center;direction:rtl;unicode-bidi:embed;
  text-align:center'><span lang=he style='font-size:8.0pt;font-family:Arial;
  language:he;direction:rtl;unicode-bidi:normal;font-size:8.0pt;font-weight:bold'>עו“ס בביקור קודם</span></p>
  </td>
 </tr>";*/
 $j=0;
} 
 
 
 }
 }
 
 if ($countEzor>0){
	echo "
	<tr>
 
  <td width=113 colspan=8 valign=Top dir=rtl style='width:85.0393pt;height:
  20.6563pt;padding-left:2.88pt;padding-right:2.88pt;padding-top:2.88pt;
  padding-bottom:2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal style='text-align:right;direction:rtl;unicode-bidi:embed'><span
  lang=he style='font-size:9.0pt;font-family:Arial;language:he;direction:rtl;
  unicode-bidi:normal;font-size:9.0pt;font-weight:bold'>סה\"כ לאיזור ".iconv('UTF-8', 'Windows-1255', $lastEzor)." : ".$countEzor."</span></p>
  </td></tr>";
	}
 
 }
 
 ?>
 
 <tr>
  <td width=642 height=82 valign=Top dir=rtl colspan=8 style='width:481.8897pt;
  height:61.4551pt;padding-left:200.88pt;padding-right:2.88pt;padding-top:2.88pt;
  padding-bottom:2.88pt;border-right:solid black 1.0pt;border-top:solid black 1.0pt;
  border-left:solid black 1.0pt;border-bottom:solid black 1.0pt'>
  <p class=MsoNormal><span dir=rtl lang=he style='font-size:12.0pt;font-family:
  Arial;font-weight:bold;language:he;direction:rtl;unicode-bidi:embed;
  font-size:12.0pt;font-weight:bold'>סה“כ מטופלים: </span><span dir=rtl lang=he style='font-size:12.0pt;font-family:
  Arial;font-weight:bold;language:he;direction:rtl;unicode-bidi:embed;
  font-size:12.0pt;font-weight:bold'><?php echo $len1;?></span></p>
  </td>
 </tr>
</table>

<!--[if gte vml 1]><![if mso | ie]><v:shape id="_x0000_s1034" type="#_x0000_t201"
 style='position:absolute;left:73.7pt;top:569.76pt;width:161.57pt;height:73.7pt;
 z-index:7;mso-wrap-distance-left:2.88pt;mso-wrap-distance-top:2.88pt;
 mso-wrap-distance-right:2.88pt;mso-wrap-distance-bottom:2.88pt' stroked="f"
 strokecolor="black [0]" insetpen="t" o:cliptowrap="t">
 <v:stroke color2="white [7]">
  <o:left v:ext="view" color="black [0]" color2="white [7]" weight="0"/>
  <o:top v:ext="view" color="black [0]" color2="white [7]" weight="0"/>
  <o:right v:ext="view" color="black [0]" color2="white [7]" weight="0"/>
  <o:bottom v:ext="view" color="black [0]" color2="white [7]" weight="0"/>
  <o:column v:ext="view" color="black [0]" color2="white [7]"/>
 </v:stroke>
 <v:shadow color="#ccc [4]"/>
 <v:textbox inset="0,0,0,0">
 </v:textbox>
</v:shape><![endif]><![endif]-->



</div>

</body>

</html>
