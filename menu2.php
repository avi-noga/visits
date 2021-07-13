<?php

include "../webapps/config.visits.php";
include "../webapps/session.visits.php";


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Noga-visits</title>
        <link href="main.css" rel="stylesheet" type="text/css">
        <!-- JQuery-ui -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!--sweetalert2>-->
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
        <!--select2-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/balloon-css/1.2.0/balloon.min.css" integrity="sha512-6jHrqOB5TcbWsW52kWP9TTx06FHzpj7eTOnuxQrKaqSvpcML2HTDR2/wWWPOh/YvcQQBGdomHL/x+V1Hn+AWCA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/balloon-css/1.2.0/balloon.css" integrity="sha512-0EeUVcqQfqgoHPhMQo5bCOHrK72R4UwXEaCI4cFM5yk4ZP0aAxy1RbSDQiUsN1qe7ZUcYjY5TIPvsAEmQzi/+A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="main2.css" rel="stylesheet" type="text/css">



        <!--[if lt IE 9]>
<script type="text/javascript" src="libs/flashcanvas.js"></script>
<![endif]-->


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#theNav" aria-expended="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php" id="homepagepad">
                        <span id="clock" style='padding-left: 10px'></span>
                        <span><img src="homepage.png" alt="homepage" style='padding-bottom: 5px'></span>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="theNav">
                    <ul class="nav navbar-nav navbar-right" id="navulist">

                    </ul>
                </div>
            </div>
        </div>
        <div class="navbar navbar-inverse navbar-fixed-bottom">
            <div class="container">
                <h4 class="text-center" style="color: aliceblue; position: sticky">כל הזכויות שמורות לנגה פתרונות לסיעוד©</h4>
            </div>
        </div>	
        <div class="container menu1">
            <div class="row" id="logo">
                <a href="#bottom1"><img src="/webapps/logo.png" alt="logo"></a>
            </div>
            <div class="row">
                <h1 class="col-xs-12 text-center">הוספת ביקור חדש</h1>
                <br>
                <h2 class="text-center">
                    <p>
                        <strong> שם המבקר: </strong>
                        <span id="empname"></span>
                    </p>
                </h2>
                <br>
            </div>

            <!--div class="row">
<input type="text" list="sel" id="metupalSearchBox" name="metupalSearchBox" 
class="col-md-9-offset-12 text-center input-borderless" placeholder="חפש מטופל" 
autofocus autocomplete="off">
<input type="text" name="slct" id="selMetupal" class="selectmet">
</div-->

            <div class="row">
                <div class="col-md-6-offset-6 text-center" style="direction: ltr">
                    <input type="text" name="project" id="suggestion" class="text-center input-borderless SearchBox" placeholder="בחר מטופל" autocomplete="off">
                    <p type="text" name="slct" id="selectmet_id" class="selectmet"></p>
                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-md-6-offset-6 text-center" style="direction: ltr">
                    <input type="text" name="project" id="suggestion2" class="text-center input-borderless SearchBox" placeholder="שינוי עובד מקצועי" autocomplete="off" style="display: none;">
                    <p type="text" name="slct" id="selectemp_id" class="selectemp" style="display: none;"></p>
                </div>

            </div>

            <div class="row">
                <ol class="col-xs-12 text-center" style="padding-right: 20px; padding-left: 20px;">
                    <li>
                        <label class="lblSelect">תאריך ביקור</label>
                        <br>
                        <input type="datetime-local" class="input input14 text-right" name="visitDate" id="visitDate" value="" placeHolder="הזן תאריך ביקור" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}" required/>
                    </li>
                    <li>
                        <label class="lblSelect">תאריך ביקור קודם</label>
                        <br>
                        <input type="text" class="input input14 text-right" name="lastVisitDate" id="lastVisitDate" value=""  disabled="disabled"/>
                    </li>
                    <li>
                        <div class="form-group">
                            <label>נוכחים</label>
                            <textarea class="input14" id="whopresent" rows="3"></textarea>
                        </div>
                    </li>
                    <li>
                        <label class="lblSelect">קיימת חריגה מול ביקור קודם</label>
                        <br>
                        <select id="slct_exception" class="input input14">
                            <option value="0" selected="selected">לא</option>
                            <option value="1">כן</option>
                        </select>
                    </li>
                    <li>
                        <label class="lblSelect">קשיש גר לבד:</label>
                        <br>
                        <select id="slct_liveAlone" class="input input14">
                            <option value="0" selected="selected">לא</option>
                            <option value="1">כן</option>
                        </select>
                    </li>
                    <li>
                        <label class="lblSelect">ביקור בזמן שיבוץ:</label>
                        <br>
                        <select id="slct_onAssign" class="input input14">
                            <option value="0" selected="selected">לא</option>
                            <option value="1">כן</option>
                        </select>
                    </li>
                    <li>
                        <label class="lblSelect" id="lblmpresent">מטפלת נוכחת:</label>
                        <br>
                        <select id="slct_mpresent" class="input input14">
                            <option value="0" selected="selected">לא</option>
                            <option value="1">כן</option>
                        </select>
                        <br>
                        <div class="form-group" id="divass" style="display: none">
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#spnass">מידע על שיבוצים
                            </button>
                            <div id="spnass" class="collapse notice">
                            </div>
                        </div>
                        <input type="text" id="mname_present" class="input14" placeholder="נא הזן שם מטפל/ת:" style="display: inline-block;">
                    </li>
                    <li>
                        <label class="lblSelect">סיבת העדרות המטפל:</label>
                        <br>
                        <select class="js-example-tags input14" id="rni_descr" value="RNI" multiple>
                            <!--option select="selected"></option-->
                        </select>
                    </li>
                    <li>
                        <label class="lblSelect">הופעה חיצונית:</label>
                        <br>
                        <select class="js-example-tags input14" id="mcl_descr" value="MCL" multiple>
                            <!--option select="selected"></option-->
                        </select>
                    </li>
                    <li>
                        <label class="lblSelect">מצב תזונתי:</label>
                        <br>
                        <select class="js-example-tags input14" id="eat_descr" value="EAT" multiple>
                            <!--option select="selected"></option-->
                        </select>
                    </li>
                    <li>
                        <div class="form-group">
                            <label class="lblSelect">אירועים מביקור אחרון:</label>
                            <div class="form-group" id="divhos" style="display: none">
                                <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#spnhos">מידע על אשפוזים
                                </button>
                                <div id="spnhos" class="collapse notice">
                                </div>
                            </div>
                            <textarea class="input14" id="changesDesc" rows="3"></textarea>
                        </div>
                    </li>
                    <li>
                        <label class="lblSelect">מצב הניקיון בבית:</label>
                        <br>
                        <select class="js-example-tags input14" id="cln_descr" value="CLN" multiple>
                            <!--option select="selected"></option-->
                        </select>
                    </li>
                    <li>
                        <label class="lblSelect">שביעות רצון מהטיפול:</label>
                        <br>
                        <select class="js-example-tags input14" id="rcm_descr" value="RCM" multiple>
                            <!--option select="selected"></option-->
                        </select>
                    </li>
                    <li>
                        <label class="lblSelect">מקבל/ת את כל השעות:</label>
                        <br>
                        <select class="input14" id="ful_descr" value="FUL">
                            <option select="selected"></option>
                        </select>
                        <br>
                        <div class="form-group" style='display:none;' id="ful_details">
                            <label class="lblSelect">פרט:</label>
                            <textarea class="input14" id="receiveAllHours" rows="3"></textarea>
                        </div>
                    </li>
                    <li>
                        <label class="lblSelect">קשיים בטיפול:</label>
                        <br>
                        <select class="input14" id="hard_descr" value="HARD">
                            <option select="selected"></option>
                        </select>
                        <br>
                        <div class="form-group" style='display:none;' id="hard_details">
                            <label class="lblSelect">פרט:</label>
                            <textarea class="input14" id="difficulties" rows="3"></textarea>
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <label class="lblSelect">התרשמות כללית:</label>
                            <textarea class="input14" id="generalimp" rows="3"></textarea>
                        </div>
                    </li>
                    <li>
                        <div class="form-group">
                            <label class="lblSelect">בקשות:</label>
                            <textarea class="input14" id="requests" rows="3"></textarea>
                        </div>
                    </li>
                    <input type="image" src="images/down-arrow.png" onclick="toggleFunction()">
                    <li>
                        <label class="lblSelect">חתימת העובד: </label>
                        <div data-role="content">
                            <div id="signature-pad"></div>
                            <button id="clear">נקה</button>
                            <br/>
                        </div>
                    </li>
                </ol>
                <div>
                    <input type="submit" id="sendVisit" name="sendVisit" class="btn btn-primary send" value="שלח" style="display: inline-block; margin-left: 30px;">
                    <a href="#" style="display: inline-block;" >
                        <img class="sticky" src="images/up-arrow.png" alt="scrollUp" id="bottom1" style="vertical-align: super !important;">
                    </a>
                    <img class="wheel" src="images/ajax-loader.gif" alt="loader" style="vertical-align: super !important;display: none;">
                </div>
            </div>
        </div>
        <div id="empnum" style="display: none;"></div>
        <div id="empprof" style="display: none;"></div>
        <div id="userid" style="display: none;"></div>
        <div id="empbranch" style="display: none;"></div>
        <div id="sigData" style="display: none;"></div>
        <div id="sign_prev" style="display: none;"></div>
        <div id="resStatus" style="display: none;"></div>
        <div class="modal"><!-- Place at bottom of page --></div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
        <!--sweet alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" integrity="sha512-3n19xznO0ubPpSwYCRRBgHh63DrV+bdZfHK52b1esvId4GsfwStQNPJFjeQos2h3JwCmZl0/LgLxSKMAI55hgw==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jSignature/2.1.2/flashcanvas.js" integrity="sha512-La2Eh5E5rjqSFrTIgJXLOr3EvkJZ7N+rMOsCr7yVGGE4FUTBKPDmkycf9NsdXTTFBs7PUKOTxTQyNf1Pp1Xb7A==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jSignature/2.1.2/jSignature.min.js" integrity="sha512-8BEqqM8Cb/Zh6amkTnZVCK0e4iGnIzv9Q3NXhqYyvwkYxSU2+HJPZv++TITaYVWf7jLxaaaFjknWVwbv40cQuA==" crossorigin="anonymous"></script>
        <!-- select2 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

        <script type="text/javascript" src="js/visits.js"></script>

        <script type="text/javascript">
            $( function() {
                //$.getJSON("resources/metupal_visit_line_option.json", function(data) {
                $.getJSON("api/get_metupal_visit_line_optionCurl.php", function(data) {
                    $.each(data, function (key, model) {
                        var optionss = '<option value="' + model.LINE + '">' + model.LINE + '</option>';
                        if (model.FIELDTYPE.localeCompare('RNI')==0) {
                            $("#rni_descr").append(optionss);
                        } else if (model.FIELDTYPE.localeCompare('MCL')==0) {
                            $("#mcl_descr").append(optionss);
                        } else if (model.FIELDTYPE.localeCompare('EAT')==0) {
                            $("#eat_descr").append(optionss);
                        } else if (model.FIELDTYPE.localeCompare('CLN')==0) {
                            $("#cln_descr").append(optionss);
                        } else if (model.FIELDTYPE.localeCompare('RCM')==0) {
                            $("#rcm_descr").append(optionss);
                        } else if (model.FIELDTYPE.localeCompare('FUL')==0) {
                            $("#ful_descr").append(optionss);
                        } else if (model.FIELDTYPE.localeCompare('HARD')==0) {
                            $("#hard_descr").append(optionss);
                        }
                    })
                });
            });

        </script>

        <script type="text/javascript">
            $currdt = "<?php date_default_timezone_set('Asia/Tel_Aviv');
            Print(date("Y-m-d")."T".date("H:i")); ?>";
            $("#visitDate").val($currdt);
            console.log('$currdt: ' + $currdt);


            $(document).ready(function(){
                $('#hard_descr').on('change', function() {
                    if ( this.selectedIndex === 2)
                    {
                        $("#hard_details").show();
                    }
                    else
                    {
                        $("#hard_details").hide();
                    }
                });
            });

        </script>

        <script>
            $("#rni_descr").select2({
                tags: true,
                dir: "rtl"
            });

            $("#mcl_descr").select2({
                tags: true,
                dir: "rtl"
            });

            $("#eat_descr").select2({
                tags: true,
                dir: "rtl"
            });

            $("#cln_descr").select2({
                tags: true,
                dir: "rtl"
            });

            $("#rcm_descr").select2({
                tags: true,
                dir: "rtl"
            });

        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#ful_descr').on('change', function() {
                    if ( this.selectedIndex === 2)
                    {
                        $("#ful_details").show();
                    }
                    else
                    {
                        $("#ful_details").hide();
                    }
                });
            });

        </script>

        <script type="text/javascript">
            $("#mname_present").hide();
            $(document).ready(function(){
                $('#slct_mpresent').on('change', function() {
                    if ( this.selectedIndex === 1)
                    {
                        $("#mname_present").show();
                    }
                    else
                    {
                        $("#mname_present").hide();
                    }
                });
            });

        </script>


        <script type="text/javascript">

            $(document).ready(function() {

                // Initialize jSignature
                $("#signature-pad").jSignature();
                $("#signature-pad").jSignature("reset") 


                $('#signature-pad').change(function() {    
                    var data = $('#signature-pad').jSignature('getData');
                    // Storing in textarea
                    $('#sigData').val(data);
                    $('#signature-pad').focus();

                });

                $('#clear').click(function (e) {
                    $("#signature-pad").jSignature('clear');
                });

                // $('#signature-pad').hide();

            });


            document.querySelector("#sendVisit").addEventListener("click", function() {

                var sigData64 = document.getElementById("sigData").value;
                var resAppend=-1;
                /*var cln_descr = $("#cln_descr").val();
                if(!cln_descr){
                    $("#cln_descr").addClass("notvalid");
                    document.getElementById("cln_descr").focus();
                    return false;
                } else {
                    $("#cln_descr").removeClass("notvalid");
                }
                */
                if(!sigData64){
                    $("#signature-pad").addClass("notvalid");
                    document.getElementById("signature-pad").focus();
                    return false;
                } else {
                    $("#signature-pad").removeClass("notvalid");
                }

                var suggestionVal = $('#suggestion').val();
                if(!suggestionVal){
                    $("#suggestion").addClass("notvalid");
                    document.getElementById("suggestion").focus();
                    return false;
                } else {
                    $("#suggestion").removeClass("notvalid");
                }

                var currVisitDate = document.getElementById('visitDate').value.replace("T"," ");
                var empNumber = document.getElementById('empnum').value;
                var metupalNumber = document.getElementById('suggestion').value;
                var changeempnumber = document.getElementById('suggestion2').value;

                var phpUrl='api/checkVisitLimitationsCurl.php';
                console.log('empNumber: ' + empNumber + ', metupalNumber: ' + metupalNumber + ', currVisitDate: ' + currVisitDate);
                var swl = true;
                $.ajax({
                    url: phpUrl,
                    method:"POST",
                    cache: false,
                    data:{ 
                        empnum: empNumber,
                        metnum: metupalNumber,
                        visitdate: currVisitDate
                    },
                    dataType:"JSON",
                    success:function(data)
                    {
                        var iconswal = 'info';
                        var titleswal = 'האם להמשיך?';
                        var textswal = 'אישור הזנת ביקור';
                        console.log('success5 php ' + phpUrl);
                        var flag=true;
                        var rowNum=0;
                        if (data.HOS_EXISTS != 0 ){
                            console.log('in HOS')    
                            iconswal = 'warning';
                            textswal = 'שים לב! מטופל באשפוז';
                        } else if (data.VISIT_METUPAL_EXISTS != 0){
                            console.log('in VISIT_METUPAL_EXISTS')    

                            iconswal = 'warning';
                            textswal =  'שים לב! חפיפה עם ביקור אחר של מטופל';

                        } else if (data.VISIT_EMPLOYEE_EXISTS != 0 ){
                            console.log('in VISIT_EMPLOYEE_EXISTS')    
                            iconswal = 'warning';
                            textswal =  'שים לב! חפיפה עם ביקור אחר של עובד';

                        } else if (data.VISIT_FREQ_IND != 0 ){ 
                            console.log('in VISIT_FREQ_IND')    
                            iconswal = 'warning';
                            textswal =  'שים לב! 62 יום מאז הביקור הקודם';
                        }

                        Swal.fire({
                            title: titleswal,
                            text: textswal,
                            icon: iconswal,
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            cancelButtonText: 'בטל',
                            confirmButtonText: 'אשר'
                        }).then((result) => {
                            if (result.isConfirmed) {

                                var fullHourStr = document.getElementById('ful_descr').value;
                                var fullHourDescr = document.getElementById('receiveAllHours').value;
                                if (fullHourDescr){
                                    fullHourStr += '. ' + fullHourDescr;
                                }
                                var hardDescrStr = document.getElementById('hard_descr').value;
                                var hardDetailsDescr = document.getElementById('difficulties').value;
                                if (hardDetailsDescr){
                                    hardDescrStr += '. ' + hardDetailsDescr;
                                }


                                /*console.log('changesDesc: ' + document.getElementById('changesDesc').value)
                console.log('difficulties: ' + document.getElementById('difficulties').value)
                console.log('generalimp: ' + document.getElementById('generalimp').value)
                console.log('cln_descr: ' + document.getElementById('cln_descr').value)
                console.log('slct_liveAlone: ' + document.getElementById('slct_liveAlone').value)
                console.log('slct_exception: ' + document.getElementById('slct_exception').value)
                console.log('slct_mpresent: ' + document.getElementById('slct_mpresent').value)
                console.log('mname_present: ' + document.getElementById('mname_present').value)
                console.log('eat_descr: ' + document.getElementById('eat_descr').value)
                console.log('slct_onAssign: ' + document.getElementById('slct_onAssign').value)
                console.log('mcl_descr: ' + document.getElementById('mcl_descr').value)
                console.log('ful_descr: ' + document.getElementById('ful_descr').value)
                console.log('requests: ' + document.getElementById('requests').value)
                console.log('rcm_descr: ' + document.getElementById('rcm_descr').value)
                console.log('whopresent: ' + document.getElementById('whopresent').value)
                console.log('empNumber: ' + document.getElementById('empNumber').value)
                console.log('metupalNumber: ' + metupalNumber)
                console.log('empProf: ' + document.getElementById('empProf').value)*/
                                var phpUrl='api/append_visitCurl.php';
                                $.ajax({
                                    url: phpUrl,
                                    method:"POST",
                                    cache: false,
                                    data:{ 
                                        sigData: sigData64,
                                        visitDate: currVisitDate,
                                        changes: document.getElementById('changesDesc').value, 
                                        difficulties: hardDescrStr,
                                        generalimp: document.getElementById('generalimp').value,
                                        homedesc: getDescrArr($('#cln_descr').select2('data')),//document.getElementById('cln_descr').value,
                                        metupallivealone: document.getElementById('slct_liveAlone').value,
                                        visitexceptionexists: document.getElementById('slct_exception').value,
                                        metupalpresent: document.getElementById('slct_mpresent').value,
                                        metapelname: document.getElementById('mname_present').value,
                                        metupalpresentdesc: getDescrArr($('#rni_descr').select2('data')),//document.getElementById('rni_descr').value,
                                        nutritiondesc: getDescrArr($('#eat_descr').select2('data')),//document.getElementById('eat_descr').value,
                                        onschedualtime: document.getElementById('slct_onAssign').value,
                                        personalapperance: getDescrArr($('#mcl_descr').select2('data')),//document.getElementById('mcl_descr').value,
                                        receiveal: fullHourStr,
                                        requests: document.getElementById('requests').value,
                                        treatmentsatis: getDescrArr($('#rcm_descr').select2('data')),//document.getElementById('rcm_descr').value,
                                        whopresentdesc: document.getElementById('whopresent').value,
                                        empnumber: empNumber,
                                        metupalnumber: metupalNumber,
                                        professionid:  document.getElementById('empprof').value,
                                        userid: document.getElementById('userid').value, // TO BE DEFINED
                                        employeevisitupdater: changeempnumber
                                    },
                                    dataType:"JSON",
                                    success:function(data)
                                    {
                                        var visitIdN = 0;
                                        console.log('success php');
                                        $.each(data, function(index, value) {
                                            console.log('index: ' + index + ' value: ' + value);

                                            if (index==="visitId") {
                                                visitIdN = value;    
                                            } else if (index==="resStatus"){
                                                $('#resStatus').val(value);
                                            } else if (index==="resStatusDesc"){
                                                $('#resStatusDesc').val(value);
                                            }
                                            const sendVisitButton = document.querySelector("#sendVisit");
                                            sendVisitButton.disabled = true;
                                            Swal.fire(
                                                'ביקור הוזן בהצלחה!',
                                                'קוד זיהוי: ' + visitIdN,
                                                'success'
                                            )
                                        });
                                    },
                                    error: function(xhr, status, error) {
                                        alert(xhr.responseText);
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'כשלון בהזנת ביקור',
                                            text: 'שגיאה לא צפויה.'
                                            /*footer: '<a href>Why do I have this issue?</a>'*/
                                        })
                                    }
                                });

                            }
                        });

                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });



            });

            function getDescrArr(jsObjArr){
                var tmpStr;
                if (jsObjArr){
                    jsObjArr.forEach(function (arrayItem) {
                        if (!tmpStr)
                            tmpStr = arrayItem.text;
                        else 
                            tmpStr += ' ' + arrayItem.text;
                    });
                }
                return tmpStr;
            }


        </script>

        <script>
            //function getMetupalimB() {


            $(document).ready(function () {
                var pparam = "<?php Print($_SESSION['empname']); ?>";
                var pparam2 = "<?php Print($_SESSION['empnum']); ?>";
                var pprof = "<?php Print($_SESSION['empprof']); ?>";
                var userid = "<?php Print($_SESSION['userid']); ?>";
                var empbranch = "<?php Print($_SESSION['empbranch']); ?>";
                console.log('pparam: ' + pparam + ', pprof: ' + pprof + ', empnum: ' + pparam2 + ', userid: ' + userid + ', empbranch: ' + empbranch);

                document.getElementById("empname").value = pparam;
                document.getElementById("empname").innerHTML = pparam;
                document.getElementById("empnum").value = pparam2;
                document.getElementById("empprof").value = pprof;
                document.getElementById("userid").value = userid;
                document.getElementById("empbranch").value = empbranch;

                var dataIn = {};
                dataIn['empbranch'] = empbranch;

                var x = document.getElementById("suggestion2");
                var y = document.getElementById("selectemp_id");
                if (pprof === "3") {
                    if (x.style.display === "none") {
                        x.style.display = "block";
                        y.style.display = "block";
                    } else {
                        x.style.display = "none";
                        y.style.display = "none";
                    }
                }


                //var urlmet = "resources/metupal.json";
                var urlmet = "api/get_metupalCurl.php";
                $("#suggestion").autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: urlmet,
                            method:"POST",
                            cache: false,
                            data: dataIn,
                            dataType: "json",
                            success: function(data) {

                                if (!data.length) {
                                    var result = [{
                                        label: 'Subject not found',
                                        value: response.term
                                    }];
                                    response(result);
                                } else {
                                    console.log('suggestion1' )
                                    response($.map(data, function(item) {
                                        if (item.MIDNUM != "" /*&& ((item.VINSEMPLOYEEVISITTYPE_EMPNUMBER==pparam2 && pprof != '3')||(item.VINSEMPLOYEEBAKARALTERNAT_EMPNUMBER==pparam2 && pprof=== '3'))*/){
                                            var addmet = item.ADDRESS + ', ' + item.CITY;
                                            var metid = item.FNAME + ' ' + item.LNAME + ', ' + item.MIDNUM + '<br>' + addmet + ', סניף ' +  item.BRANCHNAME;
                                            var itemn1 = item.FNAME + ' ' + item.LNAME;
                                            var itemn2 = item.LNAME + ' ' + item.FNAME;
                                            var metIdNum = item.MIDNUM;
                                            var metnumber = item.METUPALNUMBER;
                                            if (itemn1.search(request.term) >= 0 || itemn2.search(request.term) >= 0 || metIdNum.search(request.term) === 0 || metnumber === request.term){
                                                return {
                                                    label: itemn1 + ', ' + metIdNum,
                                                    value: item
                                                }
                                            }
                                        }
                                    }));
                                }
                            }
                        });
                    },
                    change: function(event, ui) {
                        if (ui.item == null) {
                            $("#selectmet_id").val("");
                            $("#lastVisitDate").val("");
                            $("#suggestion").val("");
                            $("#suggestion").focus();
                        }
                    },

                    minLength: 3,
                    focus: function(event, ui) {
                        event.preventDefault();
                        $("#selectmet_id").val(ui.item.label);
                    },

                    select: function(event, ui) {
                        if (ui.item.label == "Subject not found") {

                            $("#selectmet_id").val('');
                            $("#suggestion").val('');
                            $("#lastVisitDate").val('');
                            event.preventDefault();
                            return false;
                        }
                        //console.log( "Selected: " + ui.item.label + " aka " + ui.item.value);
                        var metn = ui.item.value.METUPALNUMBER;
                        var currVisitDate = document.getElementById('visitDate').value.replace("T"," ");
                        var urlMetDet = "api/get_metupal_detailsCurl.php";

                        $.ajax({
                            url: urlMetDet,
                            method:"POST",
                            cache: false,
                            data:{ 
                                metnum: metn,
                                visitdate: currVisitDate
                            },
                            dataType:"JSON",
                            success:function(data)
                            {
                                console.log('success5 php ' + urlMetDet);
                                var rowNum = 0;
                                $.each(data, function( index, value ) {
                                    var metLastVisitDate = value.LAST_VISIT_DATE;
                                    $("#lastVisitDate").val(metLastVisitDate);

                                    var addmet = value.ADDRESS + ', ' + value.CITY;
                                    var metid = value.FNAME + ' ' + value.LNAME + ', ' + value.MIDNUM + '<br>' + addmet + ', סניף ' + value.BRANCHNAME;
                                    var selectmetid =   document.getElementById("selectmet_id");                  selectmetid.innerHTML = 'מטופל: ' + metid;
                                    var firstl=true;
                                    var strSched;
                                    $.each(value.ASSIGN_LIST, function( index, value ) {    
                                        if (firstl){
                                            strSched = value.ASSIGN_EMP_NAME + '<br>' + 'יום ' + value.ASSIGN_WEEKDAY + ': ' + '<br>';
                                            console.log('VISIT_TIME: ' + value.VISIT_TIME)
                                            var isOnSched = 
                                                value.ASSIGN_ON_VISIT; document.getElementById('slct_onAssign').value = isOnSched;
                                            firstl=false;

                                        }
                                        strSched+= value.SCHED_FROM1 + '-' + value.SCHED_TO1;
                                        if (value.SCHED_FROM2){
                                            strSched+= ',' + value.SCHED_FROM2 + '-' + value.SCHED_TO2;
                                        }
                                        strSched+='<br>------------------';

                                    });
                                    if (value.ASSIGN_LIST!=''){

                                        var x = document.getElementById("divass");
                                        if (x.style.display === "none") {
                                            x.style.display = "block";
                                        } else {
                                            x.style.display = "none";
                                        }

                                        var spnass = document.getElementById("spnass");
                                        spnass.innerHTML = strSched;


                                    }

                                    var strHos='';
                                    $.each(value.HOSPITAL_LIST, function( index, value ) {    
                                        var hosToDate='';
                                        if (value.HOS_TODATE){
                                            hosToDate=value.HOS_TODATE;
                                        }
                                        var hosname='';
                                        if (value.HOS_NAME){
                                            hosname=value.HOS_NAME;
                                        }
                                        var hoscomment='';
                                        if (value.HOS_COMMENT){
                                            hoscomment=value.HOS_COMMENT;
                                        }


                                        strHos += value.HOS_TYPE + '-' + hosname + ':<br>'  +
                                            value.HOS_FROMDATE + '-' +  hosToDate  + '<br>'+
                                            hoscomment + '<br>' +
                                            '-------------------------------<br>' ;

                                        console.log('VISIT_DATE: ' + value.VISIT_DATE)
                                        var isOnHos = value.HOS_ON_VISIT; //document.getElementById('slct_onAssign').value = isOnSched;
                                        firsth=false;




                                    });
                                    if (value.HOSPITAL_LIST!=''){

                                        var y = document.getElementById("divhos");
                                        if (y.style.display === "none") {
                                            y.style.display = "block";
                                        } else {
                                            y.style.display = "none";
                                        }

                                        var spnhos = document.getElementById("spnhos");
                                        spnhos.innerHTML = strHos;


                                    }


                                })
                            },
                            error: function(xhr, status, error) {

                                alert(xhr.responseText);
                            }
                        });

                        $("#suggestion").val(metn);

                        return false;
                    }
                });

                if (pprof ==="3"){
                    //var urlmet = "resources/metupal.json";
                    var urlemp = "api/get_employee_profCurl.php";
                    $("#suggestion2").autocomplete({
                        source: function(request, response) {
                            $.ajax({
                                url: urlemp,
                                dataType: "json",
                                method: "POST",
                                data: { profind: 1 },
                                success: function(data) {
                                    console.log('success6 php ' + urlemp);
                                    if (!data.length) {
                                        var result = [{
                                            label: 'Subject not found',
                                            value: response.term
                                        }];
                                        response(result);
                                    } else {
                                        console.log('suggestion2' )
                                        response($.map(data, function(item) {
                                            var itemn1 = item.EMP_FNAME + ' ' + item.EMP_LNAME;
                                            var itemn2 = item.EMP_LNAME + ' ' + item.EMP_FNAME;
                                            var empIdNum = item.EMP_IDNUM;
                                            var empnumber = item.EMP_NUMBER;
                                            if (itemn1.search(request.term) >= 0 || itemn2.search(request.term) >= 0 || empIdNum.search(request.term) === 0 || empnumber === request.term){
                                                return {

                                                    label: item.EMP_FNAME + ' ' + item.EMP_LNAME + ',' +item.EMP_NUMBER 
                                                    + ',' +  item.EMP_BRANCHNAME + ',' + item.EMP_PROF_DESC,
                                                    value: item
                                                }
                                            }
                                        }));

                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.log('error get_employee_profCurl.php' + xhr.responseText + '-' + status + '-' + error);
                                }
                            });
                        },
                        change: function(event, ui) {
                            if (ui.item == null) {
                                $("#selectemp_id").val("");
                                $("#suggestion2").val("");
                                $("#suggestion2").focus();
                            }
                        },

                        minLength: 3,
                        focus: function(event, ui) {
                            event.preventDefault();
                            $("#selectemp_id").val(ui.item.label);
                        },

                        select: function(event, ui) {
                            if (ui.item.label == "Subject not found") {

                                $("#selectemp_id").val('');
                                $("#suggestion2").val('');
                                event.preventDefault();
                                return false;
                            }

                            var changen = ui.item.value.EMP_NUMBER;
                            console.log( "Selected: " + changen );
                            console.log( "Selected label: " + ui.item.label );
                            $("#suggestion2").val(changen);
                            var empdetails = ui.item.label;
                            var empelem = document.getElementById("selectemp_id");         
                            empelem.innerHTML = 'עובד מקצועי: ' + empdetails;
                            return false;
                        }
                    });
                }

            });
            //}
        </script>

        <script>
            function toggleFunction() {
                /*var x = document.getElementById("signature-pad");
                if (x.style.display === "none") {
                    $("#signature-pad").show();
                    $("#clear").show();
                } else {
                    $("#signature-pad").hide();
                    $("#clear").hide();
                }*/
                $('#signature-pad').focus();
            }
        </script>
        <script>

            $wheel = $('.wheel');

            $(document).on({
                ajaxStart: function() { 
                    $wheel.show(); 
                },
                ajaxStop: function() { 
                    $wheel.hide(); 
                }    
            });

        </script>

        <!--datalist id="sel"></datalist-->
        <!--script>window.onload=getMetupalimB;</script-->
        <script type="text/javascript" src="js/navbar.js"></script>

    </body>
</html>