<?php

include "../webapps/config.visits.php";
include "../webapps/session.visits.php";


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="cache-control" content="no-cache" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Noga-visits</title>
        <link href="main.css" rel="stylesheet" type="text/css">
		<script src="//code.jquery.com/jquery-1.12.4.js"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <link href="main2.css" rel="stylesheet" type="text/css">

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
        <div class="container">
            <div class="row" id="logo">
                <img src="/webapps/logo.png" alt="logo">
            </div>
            <div class="row">
                <!--div class="col-md-6-offset-6 text-center" style="direction: ltr">
<input type="text" name="idNum" id="idNum" class="text-center input-borderless SearchBox" placeholder="ת.ז. עובד" autocomplete="off">
<input type="text" name="slct" id="selectemp_id" class="selectemp"/>
</div-->
                <h2 class="col-xs-12" id="empN"></h2>
            </div>

            <div class="row">

                <form id="postActions" method="post">
                    <input type="submit" id="actions" name="actions" class="btn btn-primary btn-lg col-xs-8 input-button">
                </form>

                <form action="menu6.php" method="post">
                    <input type="submit" id="reports" name="reports" value="ביקורים ממתינים לחתימה" class="btn btn-primary btn-lg col-xs-8 input-button">
                </form>
                <p id="err"></p>
            </div>
            <div id="empname" style="display: none;"></div>
            <div id="empnum" style="display: none;"></div>
            <div id="empprof" style="display: none;"></div>
            <div id="userid" style="display: none;"></div>
            <div id="empbranch" style="display: none;"></div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
        
        <script type="text/javascript" src="js/visits.js"></script>

        <script>
            $(document).ready(function(){
                try {

                    var pparam = "<?php Print($_SESSION['empname']); ?>";
                    var pparam2 = "<?php Print($_SESSION['empnum']); ?>";
                    var pprof = "<?php Print($_SESSION['empprof']); ?>";
                    var userid = "<?php Print($_SESSION['userid']); ?>";
                    var branchid = "<?php Print($_SESSION['empbranch']); ?>";
                    
                }
                catch(err) {
                    document.getElementById("err").innerHTML = 'אירעה שגויה לא צפויה' + err.message;
                }

                console.log('pparam: ' + pparam + ', pprof: ' + pprof + ', empnum: ' + pparam2 + ', userid: ' + userid + ', empbranch: ' + branchid)


                document.getElementById('empN').innerHTML = 'שלום ' + pparam;
                $("#empname").val(pparam)
                $("#empnum").val(pparam2)
                $("#empprof").val(pprof)
                $("#userid").val(userid)
                $("#empbranch").val(branchid)

                var pa = document.getElementById("postActions");
                var actele = document.getElementById("actions");
                if (pprof==='3'){
                    actele.value = "הוסף ביקור חדש";
                } else {
                    actele.value = "פעולות";
                }
                var input1 = document.createElement("input");
                input1.type = "hidden";
                input1.name = "empname";
                input1.value = pparam;
                var input2 = document.createElement("input");
                input2.type = "hidden";
                input2.name = "empnum";
                input2.value = pparam2;
                var input3 = document.createElement("input");
                input3.type = "hidden";
                input3.name = "empprof";
                input3.value = pprof;
                var input4 = document.createElement("input");
                input4.type = "hidden";
                input4.name = "userid";
                input4.value = userid;
                var input5 = document.createElement("input");
                input5.type = "hidden";
                input5.name = "branchid";
                input5.value = branchid;
                document.getElementById("postActions").appendChild(input1);
                document.getElementById("postActions").appendChild(input2);
                document.getElementById("postActions").appendChild(input3);
                document.getElementById("postActions").appendChild(input4);

                if (pprof==='3'){
                    pa.action = "menu2.php";
                } else {
                    pa.action = "menu1.php";
                }

                $('.navbar-nav > li > a').on('click', function() {
                    $('.navbar-toggle').trigger('click');
                });

            });
        </script>
        <script type="text/javascript" src="js/navbar.js"></script>
        
    </body>
</html>