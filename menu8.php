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
                <h1 class="col-xs-12 text-center">שליפת דוח ביקורי בית לביצוע</h1>
                <br>
                <h2 class="text-center">
                    <p>
                        <strong> שם העובד: </strong>
                        <span id="empname"></span>
                    </p>
                </h2>
                <br>
            </div>

            <div class="container bg-light">
                <div class="col-md-12 text-center">
                    <label class="lblSelect">בחר תקופה</label>
                    <br>
                    <input type="month" class="input input14 text-center per_date_inputs" name="periodDate" id="periodDate" value="<?=date('Y-m')?>" placeHolder="הזן חודש" />
                    <br>
                    <input type="submit" id="getReport" name="getReport" class="btn btn-primary btn-lg btn-block" value="הפק">
                    <img class="wheel" src="images/ajax-loader.gif" alt="loader" style="vertical-align: super !important;display: none;">
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
            $currdt = "<?php date_default_timezone_set('Asia/Tel_Aviv');
                           Print(date("Y-m-01")); ?>";
            $("#periodDate").val($currdt);
            console.log('$currdt: ' + $currdt);

        </script>

        <script type="text/javascript">

            document.querySelector("#getReport").addEventListener("click", function() {

                var periodDate = document.getElementById('periodDate').value;
                var empNumber = document.getElementById('empnum').value;
                var empprof = document.getElementById("empprof").value;
                var userid = document.getElementById("userid").value;
                var empbranch = document.getElementById("empbranch").value;

                console.log('periodDate: ' + periodDate + ', empNumber: ' + empNumber + ', empprof: ' + empprof + ', userid: ' + userid + ', empbranch: ' + empbranch);
                
                const getReportButton = document.querySelector("#getReport");
                getReportButton.disabled = true;

                var phpUrl='api/getFutureVisitReportCurl.php';
                $.ajax({
                    url: phpUrl,
                    data:{ 
                        month: periodDate,
                        empnumber: empNumber,
                        empprof: empprof,
                        userid: userid,
                        empbranch: empbranch
                    },
                    method: "POST",
                    cache: false
                }).done(function(result) {
                    const linkSource = result;
                    window.open(linkSource, '_blank').focus();

                    //                    const downloadLink = document.createElement("a");
                    //                    const fileName = "VISIT_DOCUMENT.pdf";
                    //                    //console.log('res: ' + result)
                    //                    downloadLink.href = linkSource;
                    //                    downloadLink.download = fileName;
                    //                    downloadLink.click();
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
                var visitDoc = "<?php Print($visitDoc); ?>";

                console.log('pparam: ' + pparam + ', pprof: ' + pprof + ', empnum: ' + pparam2 + ', userid: ' + userid + ', empbranch: ' + empbranch + ', visitDoc: ' + visitDoc);

                const getReportButton = document.querySelector("#getReport");
                if (visitDoc===0){
                    getReportButton.disabled = true;
                }

                document.getElementById("empname").value = pparam;
                document.getElementById("empname").innerHTML = pparam;
                document.getElementById("empnum").value = pparam2;
                document.getElementById("empprof").value = pprof;
                document.getElementById("userid").value = userid;
                document.getElementById("empbranch").value = empbranch;


            });

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


        <script type="text/javascript" src="js/navbar.js"></script>

    </body>
</html>