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
                <h1 class="col-xs-12 text-center">עדכון ביקור קיים</h1>
                <br>
                <h2 class="text-center">
                    <strong>
                        <span id="empname"></span>
                    </strong>
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6-offset-6 text-center" style="direction: ltr">
                    <input type="text" name="project" id="suggestion" class="text-center input-borderless SearchBox" placeholder="הכנס שם בקר" autocomplete="off">
                    <input type="text" name="slct" id="selectemp_id" class="selectmet"/>
                </div>
                <br><br>
                <div class="col-md-6-offset-6 text-center" style="direction: ltr">
                    <input type="text" name="metupalSearchBox" id="metupalSearchBox" list="sel1" class="text-center input-borderless SearchBox" placeholder="חפש מטופל" autofocus autocomplete="off">
                    <input type="text" name="slct" id="selectmet_id" class="selectmet"/>
                </div>
                <br><br>
                <div class="col-md-6-offset-6 text-center" style="direction: ltr">
                    <input type="text" name="vdateSearchBox" id="vdateSearchBox" list="sel2"  class="text-center input-borderless SearchBox" placeholder="בחר תאריך ביקור" autofocus autocomplete="off">
                    <br>
                    <p><span class="selectmet">תאריך ביקור</span></p>

                </div>
            </div>

            <div class="row">
                <ol class="col-xs-12 text-center" style="padding-right: 20px; padding-left: 20px;">
                    <li>
                        <div class="form-group">
                            <label>נוכחים</label>
                            <textarea class="input14" id="whopresent" rows="3"></textarea>
                        </div>
                    </li>
                    <li>
                        <label class="lblSelect">קיימת חריגה מול ביקור קודם</label>
                        <br>
                        <textarea class="input14" id="slct_exception" rows="1"></textarea>
                    </li>
                    <li>
                        <label class="lblSelect">קשיש גר לבד:</label>
                        <br>
                        <textarea class="input14" id="slct_liveAlone" rows="1"></textarea>
                    </li>
                    <li>
                        <label class="lblSelect">ביקור בזמן שיבוץ:</label>
                        <br>
                        <textarea class="input14" id="slct_onAssign" rows="1"></textarea>
                    </li>
                    <li>
                        <label class="lblSelect">מטפלת נוכחת:</label>
                        <br>
                        <textarea class="input14" id="slct_mpresent" rows="1"></textarea>
                        <br>
                        <input type="text" id="mname_present" class="input14" style="display: inline-block;">
                    </li>
                    <li>
                        <label class="lblSelect">סיבת העדרות המטפל:</label>
                        <br>
                        <textarea class="input14" id="rni_descr" rows="1"></textarea>
                    </li>
                    <li>
                        <label class="lblSelect">הופעה חיצונית:</label>
                        <br>
                        <textarea class="input14" id="mcl_descr" rows="1"></textarea>
                    </li>
                    <li>
                        <label class="lblSelect">מצב תזונתי:</label>
                        <br>
                        <textarea class="input14" id="eat_descr" rows="1"></textarea>
                    </li>
                    <li>
                        <div class="form-group">
                            <label class="lblSelect">אירועים מביקור אחרון:</label>
                            <textarea class="input14" id="changesDesc" rows="3"></textarea>
                        </div>
                    </li>
                    <li>
                        <label class="lblSelect">מצב הניקיון בבית:</label>
                        <br>
                        <textarea class="input14" id="cln_descr" rows="1"></textarea>
                    </li>
                    <li>
                        <label class="lblSelect">שביעות רצון מהטיפול:</label>
                        <br>
                        <textarea class="input14" id="rcm_descr" rows="1"></textarea>
                    </li>
                    <li>
                        <label class="lblSelect">מקבל/ת את כל השעות:</label>
                        <textarea class="input14" id="receiveAllHours" rows="3"></textarea>
                    </li>
                    <li>
                        <label class="lblSelect">קשיים בטיפול:</label>
                        <br>
                        <textarea class="input14" id="difficulties" rows="3"></textarea>
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
                        <label class="lblSelect">חתימת העובד המקצועי: </label>
                        <div data-role="content">
                            <div id="signature-pad"></div>
                            <button id="clear">נקה</button>
                            <br/>
                        </div>
                    </li>
                </ol>

                <div>
                    <input type="submit" id="updVisit" name="updVisit" class="btn btn-primary send" value="שלח" style="display: inline-block; margin-left: 30px;">
                    <a href="#" style="display: inline-block;" >
                        <img class="sticky" src="images/up-arrow.png" alt="scrollUp" id="bottom1" style="vertical-align: super !important;">
                    </a>
                </div>
            </div>
        </div>
        <div id="empnum" style="display: none;"></div>
        <div id="empprof" style="display: none;"></div>
        <div id="userid" style="display: none;"></div>
        <div id="empbranch" style="display: none;"></div>
        <div id="metnumber" style="display: none;"></div>
        <div id="sigData" style="display: none;"></div>
        <div id="resStatus" style="display: none;"></div>
        <div id="visitid" style="display: none;"></div>

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

        <script type="text/javascript" src="js/visits.js"></script>

        <script type="text/javascript">

            var pparam = "<?php Print($_SESSION['empname']); ?>";
            var pparam2 = "<?php Print($_SESSION['empnum']); ?>";
            var pprof = "<?php Print($_SESSION['empprof']); ?>";
            var userid = "<?php Print($_SESSION['userid']); ?>";
            var empbranch = "<?php Print($_SESSION['empbranch']); ?>";
            console.log('pparam: ' + pparam + ', pprof: ' + pprof + ', empnum: ' + pparam2 + 'userid: ' + userid + ', empbranch: ' + empbranch);

            document.getElementById("empnum").value = pparam2;
            document.getElementById("empprof").value = pprof;
            document.getElementById("empname").value = pparam;
            document.getElementById("empname").innerHTML = pparam;
            document.getElementById("userid").value = userid;
            document.getElementById("empbranch").value = userid;


            //var urlEmp = "resources/employee_prof.json";
            var urlEmp = "api/get_employee_profCurl.php";
            $("#suggestion").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: urlEmp,
                        dataType: "json",
                        cache: false,
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
                                    var itemn1 = item.EMP_FNAME + ' ' + item.EMP_LNAME;
                                    var itemn2 = item.EMP_LNAME + ' ' + item.EMP_FNAME;
                                    var empIdNum = item.EMP_IDNUM;
                                    var empnumber = item.EMP_NUMBER;
                                    if (itemn1.search(request.term) >= 0 || itemn2.search(request.term) >= 0 || empIdNum.search(request.term) === 0 || empnumber === request.term){
                                        return {
                                            label: item.EMP_FNAME + ' ' + item.EMP_LNAME + ',' +item.EMP_NUMBER 
                                            + ',' +  item.EMP_BRANCHNAME,
                                            value: item
                                        }
                                    }
                                }));
                            }
                        }
                    });
                },
                change: function(event, ui) {
                    if (ui.item == null) {
                        $("#selectemp_id").val("");
                        $("#empprof").val("");
                        $("#suggestion").val("");
                        $("#suggestion").focus();
                    }
                },

                minLength: 3,
                focus: function(event, ui) {
                    event.preventDefault();
                    // $("#subject_name").val(ui.item.label);
                    var empname = ui.item.value.EMP_FNAME + ' ' + ui.item.value.EMP_LNAME;
                    $("#selectemp_id").val(empname);
                },

                select: function(event, ui) {
                    if (ui.item.label == "Subject not found") {

                        $("#selectemp_id").val('');
                        $("#suggestion").val('');
                        event.preventDefault();
                        return false;
                    }
                    //console.log( "Selected: " + ui.item.label + " aka " + ui.item.value);
                    var empname = ui.item.value.EMP_FNAME + ' ' + ui.item.value.EMP_LNAME;
                    var empn = ui.item.value.EMP_NUMBER;
                    var empprof = ui.item.value.EMP_PROFID;
                    $("#selectemp_id").val(empname);
                    $("#suggestion").val(ui.item.value.EMP_NUMBER);
                    getMetupalimL(empn,empprof)
                    return false;
                }
            });


            function getMetupalimL(empn,empprof) {
                var phpUrl='api/get_visitCurl.php';
                $.ajax({
                    url: phpUrl,
                    method:"POST",
                    cache: false,
                    data:{ 
                        empn: empn,
                        prof: empprof
                    },
                    dataType:"JSON",
                    success:function(data)
                    {
                        if (!data.length) {
                            console.log('no data found'); 
                            return false;
                        }
                        console.log('success php ' + phpUrl);
                        var metn='0';
                        var dl = data.length;
                        if (dl>0){
                            console.log('dl: ' + dl);
                            $.map(data, function(val, key) {
                                if (val!=null && (metn==='0' || metn!=val.metIdNum)){
                                    metupalOption = "<option value=\"" + val.metupalvisit_metupalnumber + "\" label=\"" + val.metFname + " " + val.metLname + "\">" + val.metFname + " " + val.metLname + ',' + val.metIdNum + "</option>";
                                    $('#sel1').append(metupalOption);
                                }
                                metn=val.metIdNum;
                            });
                        }
                    },
                });
            }


            var metlist = document.getElementById("metupalSearchBox");
            var empList = document.getElementById("suggestion");

            metlist.onchange = function () {

                const lblmet = document.querySelector('option[value="' + metlist.value + '"]').label;
                document.getElementById("selectmet_id").value = lblmet;
                getVisitDateL(empList.value,3,metlist.value);
            }

            function getVisitDateL(empn,pprof,metn) {
                var phpUrl='api/get_visitCurl.php';
                $.ajax({
                    url: phpUrl,
                    method:"POST",
                    cache: false,
                    data:{ 
                        empn: empn,
                        prof: pprof,
                        isSigned: 0,
                        metn: metn
                    },
                    dataType:"JSON",
                    success:function(data)
                    {
                        if (!data.length) {
                            console.log('no data found'); 
                            return false;
                        }
                        console.log('success2 php '+ phpUrl);
                        var dl = data.length;
                        if (dl>0){
                            $.map(data, function(val, key) {

                                dateOption = "<option value=\"" + val.visitdate + "\">" + val.visitdate + "</option>";
                                $('#sel2').append(dateOption);
                            });
                        }
                    },
                });
            }

            var vdateList = document.getElementById("vdateSearchBox");

            vdateList.onchange = function () {
                getVisit(empList.value,3,metlist.value,vdateList.value);
            }

            function getVisit(empn,pprof,metn,vdate) {
                var phpUrl='api/get_visitCurl.php';
                $.ajax({
                    url: phpUrl,
                    method:"POST",
                    cache: false,
                    data:{ 
                        empn: empn,
                        prof: pprof,
                        isSigned: 0,
                        metn: metn,
                        visitd: vdate
                    },
                    dataType:"JSON",
                    success:function(data)
                    {
                        if (!data.length) {
                            console.log('no data found'); 
                            return false;
                        }
                        console.log('success3 php ' + phpUrl);
                        var flag=true;
                        var dl = data.length;
                        if (dl>0){
                            $.map(data, function(model, key) {

                                if (flag){
                                    //console.log('model.visitid: ' + model.visitid)
                                    document.getElementById("visitid").value = model.visitid;
                                    document.getElementById("whopresent").value = model.whopresentdesc;
                                    if (model.visitexceptionexists==1){
                                        document.getElementById("slct_exception").value = "כן";
                                    } else {
                                        document.getElementById("slct_exception").value = "לא";
                                    }
                                    if (model.metupallivealone==1){
                                        document.getElementById("slct_liveAlone").value = "כן";
                                    } else {
                                        document.getElementById("slct_liveAlone").value = "לא";
                                    }
                                    if (model.onschedualtime==1){
                                        document.getElementById("slct_onAssign").value = "כן";
                                    } else {
                                        document.getElementById("slct_onAssign").value = "לא";
                                    }
                                    if (model.metupalpresent==1){
                                        document.getElementById("slct_mpresent").value = "כן";
                                    } else {
                                        document.getElementById("slct_mpresent").value = "לא";
                                    }
                                    document.getElementById("rni_descr").value = model.metupalpresentdesc;
                                    document.getElementById("mname_present").value = model.metapelname;
                                    document.getElementById("mcl_descr").value = model.personalapperancedesc;
                                    document.getElementById("eat_descr").value = model.nutritiondesc;
                                    document.getElementById("changesDesc").value = model.changessincelastvisitdesc;
                                    document.getElementById("cln_descr").value = model.homedesc;
                                    document.getElementById("rcm_descr").value = model.treatmentsatisfactiondesc;
                                    document.getElementById("receiveAllHours").value = model.receiveallorderhours;
                                    document.getElementById("difficulties").value = model.difficultiesintreatment;
                                    document.getElementById("generalimp").value = model.generalimprestion;
                                    document.getElementById("metnumber").value = model.metupalvisit_metupalnumber;
                                    document.getElementById("requests").value = model.requests;
                                    flag=false;
                                }
                            });
                        }
                    },
                });
            }


        </script>

        <script type="text/javascript">

            $(document).ready(function() {

                // Initialize jSignature
                $("#signature-pad").jSignature();
                $("#signature-pad").jSignature("reset") 
                $('#clear').click(function (e) {
                    $("#signature-pad").jSignature('clear');
                });

                $('#signature-pad').change(function() {    
                    var data = $('#signature-pad').jSignature('getData');
                    // Storing in textarea
                    $('#sigData').val(data);
                    $('#signature-pad').focus();

                });

                //$('#signature-pad').hide();

            });

            document.querySelector("#updVisit").addEventListener("click", function() {

                var sigData64 = document.getElementById("sigData").value;
                var resUpdate=-1;
                var visitid = document.getElementById("visitid");
                var uid = document.getElementById("userid");
                var uempn = document.getElementById("empnum");
                console.log('visitid: ' + visitid.value)
                console.log('uempn: ' + uempn.value)

                if(!sigData64){
                    $("#signature-pad").addClass("notvalid");
                    document.getElementById("signature-pad").focus();
                    return false;
                } else {
                    $("#signature-pad").removeClass("notvalid");
                }

                Swal.fire({
                    title: 'האם אתה בטוח?',
                    text: "אישור עדכון ביקור",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'בטל',
                    confirmButtonText: 'אשר'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var phpUrl='api/update_visitCurl.php';
                        console.log('uid: ' + uid)
                        var cons_slct_liveAlone;
                        if (document.getElementById("slct_liveAlone").value=="כן"){
                            cons_slct_liveAlone=1;
                        } else {
                            cons_slct_liveAlone=0;
                        }
                        var cons_slct_exception;
                        if (document.getElementById("slct_exception").value=="כן"){
                            cons_slct_exception=1;
                        } else {
                            cons_slct_exception=0;
                        }
                        var cons_slct_mpresent;
                        if (document.getElementById("slct_mpresent").value=="כן"){
                            cons_slct_mpresent=1;
                        } else {
                            cons_slct_mpresent=0;
                        }
                        var cons_slct_onAssign;
                        if (document.getElementById("slct_onAssign").value=="כן"){
                            cons_slct_onAssign=1;
                        } else {
                            cons_slct_onAssign=0;
                        }
                        var pprof = document.getElementById("empprof").value;
                        $.ajax({
                            url: phpUrl,
                            method:"POST",
                            cache: false,
                            data:{ 
                                sigData: sigData64,
                                updempn: uempn.value,
                                vid: visitid.value,
                                updUserId: uid.value,
                                empprof: pprof,
                                metupalnumber: document.getElementById('metnumber').value,
                                changes: document.getElementById('changesDesc').value, 
                                difficulties: document.getElementById('difficulties').value,
                                generalimp: document.getElementById('generalimp').value,
                                homedesc: document.getElementById('cln_descr').value,
                                metupallivealone: cons_slct_liveAlone,
                                visitexceptionexists: cons_slct_exception,
                                metupalpresent: cons_slct_mpresent,
                                metapelname: document.getElementById('mname_present').value,
                                metupalpresentdesc: document.getElementById('rni_descr').value,
                                nutritiondesc: document.getElementById('eat_descr').value,
                                onschedualtime: cons_slct_onAssign,
                                personalapperance: document.getElementById('mcl_descr').value,
                                receiveal: document.getElementById("receiveAllHours").value,
                                requests: document.getElementById('requests').value,
                                treatmentsatis: document.getElementById('rcm_descr').value,
                                whopresentdesc: document.getElementById('whopresent').value
                            },
                            dataType:"JSON",
                            success:function(data)
                            {
                                var visitIdN = 0;
                                console.log('success4 php ' + phpUrl);
                                $.each(data, function(index, value) {
                                    console.log('updated');
                                    if (index==="resStatus"){
                                        $('#resStatus').val(value);
                                        console.log('resStatus: ' + value)
                                    } else if (index==="resStatusDesc"){
                                        $('#resStatusDesc').val(value);
                                        console.log('resStatusDesc: ' + value)
                                    }
                                    const updVisitButton = document.querySelector("#updVisit");
                                    updVisitButton.disabled = true;
                                    Swal.fire(
                                        'ביקור עודכן בהצלחה!',
                                        'ישתקף בזמן הקרוב',
                                        'success'
                                    )
                                });
                            },
                            error: function(xhr, status, error) {
                                alert(xhr.responseText);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'כשלון בעדכון הביקור',
                                    text: 'שגיאה לא צפויה.'
                                    /*footer: '<a href>Why do I have this issue?</a>'*/
                                })
                            }
                        });

                    }
                });
            });


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
        <script type="text/javascript" src="js/navbar.js"></script>

        <datalist id="sel1"></datalist>
        <datalist id="sel2"></datalist>

    </body>
</html>