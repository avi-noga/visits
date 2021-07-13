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
                <h1 class="col-xs-12 text-center">הוספת ביקור שלא בוצע</h1>
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
                        <label class="lblSelect">סיבה לאי ביקור:</label>
                        <br>
                        <select class="js-example-tags input14" id="novisit_rsn_descr" value="">
                            <option select="selected"></option>
                        </select>
                    </li>
                </ol>
                <div>
                    <input type="submit" id="sendVisit" name="sendVisit" class="btn btn-primary send input-button" value="שלח">
                </div>
            </div>
        </div>
        <div id="empnum" style="display: none;"></div>
        <div id="empprof" style="display: none;"></div>
        <div id="userid" style="display: none;"></div>
        <div id="empbranch" style="display: none;"></div>
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

        <script type="text/javascript" src="js/visits.js"></script>

        <script type="text/javascript">
            $( function() {
                //$.getJSON("resources/metupal_visit_line_option.json", function(data) {
                $.getJSON("api/get_visitNotOcc_reasonCurl.php", function(data) {
                    $.each(data, function (key, model) {
                        var optionss = '<option value="' + model.REASONID + '">' + model.REASONDESC + '</option>';
                        $("#novisit_rsn_descr").append(optionss);
                    })
                });
            });

        </script>

        <script type="text/javascript">
            $currdt = "<?php date_default_timezone_set('Asia/Tel_Aviv');
            Print(date("Y-m-d")."T".date("H:i")); ?>";
            $("#visitDate").val($currdt);
            console.log('$currdt: ' + $currdt);

        </script>




        <script type="text/javascript">

            document.querySelector("#sendVisit").addEventListener("click", function() {

                var suggestionVal = $('#suggestion').val();
                if(!suggestionVal){
                    $("#suggestion").addClass("notvalid");
                    document.getElementById("suggestion").focus();
                    return false;
                } else {
                    $("#suggestion").removeClass("notvalid");
                }

                var novisit_rsn_descrVal = $('#novisit_rsn_descr').val();
                if(!novisit_rsn_descrVal){
                    $("#novisit_rsn_descr").addClass("notvalid");
                    document.getElementById("novisit_rsn_descr").focus();
                    return false;
                } else {
                    $("#novisit_rsn_descrVal").removeClass("notvalid");
                }

                var currVisitDate = document.getElementById('visitDate').value.replace("T"," ");
                var empNumber = document.getElementById('empnum').value;
                var metupalNumber = document.getElementById('suggestion').value;

                console.log('empNumber: ' + empNumber + ', metupalNumber: ' + metupalNumber + ', currVisitDate: ' + currVisitDate);

                var phpUrl='api/append_visitNoOccCurl.php';
                $.ajax({
                    url: phpUrl,
                    method:"POST",
                    cache: false,
                    data:{ 
                        visitDate: currVisitDate,
                        empnumber: empNumber,
                        metupalnumber: metupalNumber,
                        professionid:  document.getElementById('empprof').value,
                        userid: document.getElementById('userid').value,
                        reasonNotOcc: $("#novisit_rsn_descr").val()
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

            });


        </script>

        <script>

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
                        var metLastVisitDate = ui.item.value.LAST_VISIT_DATE;
                        var addmet = ui.item.value.ADDRESS + ', ' + ui.item.value.CITY;
                        var metid = ui.item.value.FNAME + ' ' + ui.item.value.LNAME + ', ' + ui.item.value.MIDNUM + '<br>' + addmet + ', סניף ' +  ui.item.value.BRANCHNAME;

                        
                        var metn = ui.item.value.METUPALNUMBER;
                        var currVisitDate = document.getElementById('visitDate').value.replace("T"," ");
                        var urlMetDet = "api/get_metupal_detailsCurl.php";

                        $.ajax({
                            url: urlMetDet,
                            method:"POST",
                            data:{ 
                                metnum: metn
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
                                    var selectmetid =   document.getElementById("selectmet_id");                  selectmetid.innerHTML = metid;
                                  
                                    
                                });
                            },
                            error: function(xhr, status, error) {

                                alert(xhr.responseText);
                            }
                        });

                        $("#suggestion").val(metn);
                        return false;
                        
                    }
                });

            });

        </script>

        <script type="text/javascript" src="js/navbar.js"></script>

    </body>
</html>