<?php
include "../../../webapps/config.visits.php";

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Noga Visits</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="apple-touch-icon" sizes="128x128" href="images/donation.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- JQuery-ui -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


        <!--===============================================================================================-->

        <!--===============================================================================================-->

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="css/style.css">
        <style>
            html {
                direction: rtl;
            }

            .fontHeb {
                font-family: Arial, Helvetica, "Lucida Grande", "Lucida Sans Unicode", Tahoma, Verdana, sans-serif;
                font-size: 18px;
                line-height: 1.4;
                color: #222;
                font-weight: bold !important;
            }

            .ui-autocomplete { height: 150px; overflow-y: scroll; overflow-x: hidden;}

            .notvalid {
                background: rgba(220, 134, 134, 0.45) !important;
            }

        </style>
        <!-- PushAlert -->
        <script type="text/javascript">
            (function(d, t) {
                var g = d.createElement(t),
                    s = d.getElementsByTagName(t)[0];
                g.src = "https://cdn.pushalert.co/integrate_ea284f9597f8e03bec912a052ed36f86.js";
                s.parentNode.insertBefore(g, s);
            }(document, "script"));
        </script>
        <!-- PushAlert -->
    </head>
    <body>
        <section class="ftco-section" style="padding-top: 20px;padding-bottom: 20px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap py-5">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url(images/donation.png);"></div>
                            <h1 class="text-center mb-0" style="color: white;">נגה עד הבית</h1>
                            <p class="text-center fontHeb">התחבר באמצעות הזנת הפרטים הבאים</p>
                            <form class="login-form" id="LoginForm" onsubmit="return false" method="post">
                                <div class="form-group">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-user"></span>
                                    </div>
                                    <input type="text" class="form-control fontHeb" id="Username" placeholder="שם משתמש" required>
                                </div>
                                <div class="form-group">
                                    <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
                                    <input type="password" class="form-control fontHeb" id="Password" placeholder="סיסמא" required>
                                </div>

                                <div class="form-group">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-id-card"></span>
                                    </div>
                                    <input type="text" name="project" id="suggestion" class="form-control fontHeb" placeholder="הכנס ת.ז." autocomplete="off" required>
                                </div>


                                <!--div class="form-group d-md-flex">
<div class="w-100 text-md-right">
<a href="#">Forgot Password</a>
</div>
</div-->
                                <div class="form-group">
                                    <button class="btn form-control btn-primary rounded submit px-3 fontHeb" id="LoginButton" type="submit">
                                        התחבר
                                    </button>
                                </div>


                                <div id="empname" style="display: none;"></div>
                                <div id="empprof" style="display: none;"></div>
                                <div id="userid" style="display: none;"></div>
                                <div id="empbranch" style="display: none;"></div>
                                <div id="BadLogin" style="display: none;font-size: 1.6em;" class="text-center">
                                    <p>פרטי הזדהות שגויים</p>
                                </div>
                            </form>
                            <form id="forml" method="post" hidden></form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <script src="js/popper.js"></script>
        <script src="js/main.js"></script>

        <script type="text/javascript">
            function login(form) {

                var un = form.Username.value;

                if(!un){
                    $("#Username").addClass("notvalid");
                    document.getElementById("Username").focus();
                    return false;
                } else {
                    $("#Username").removeClass("notvalid");
                }

                var pw = form.Password.value;

                if(!pw){
                    $("#Password").addClass("notvalid");
                    document.getElementById("Password").focus();
                    return false;
                } else {
                    $("#Password").removeClass("notvalid");
                }

                var sg = form.suggestion.value;

                if(!sg){
                    $("#suggestion").addClass("notvalid");
                    document.getElementById("suggestion").focus();
                    return false;
                } else {
                    $("#suggestion").removeClass("notvalid");
                }


                var nm = document.getElementById("empname").value;
                var pf = document.getElementById("empprof").value;
                var bn = document.getElementById("empbranch").value;
                //var str1 = window.location.origin;
                var str1 = "<?php Print($apiUrl); ?>";
                //var urlToSendXML = str1.concat("checkUserCurl.php");

                //alert('urlToSendXML:'+urlToSendXML)
                //var urlToSendXMLenc = encodeURIComponent(urlToSendXML);
                var prefix="";
                //var params=prefix.concat("username=",un,"&password=",pw,"&empnum=",sg);
                //var paramsenc=encodeURIComponent(params);  
                var urlToSendXML='../../api/checkUserCurl.php';
                $.ajax({
                    url: urlToSendXML,
                    method:"POST",
                    data:{ 
                        username: un, 
                        password: pw, 
                        empnum: sg
                    },
                    dataType:"json",
                    cache: false,
                    success:function(data)
                    { 
                        console.log('success php ' + urlToSendXML);
                        xr=data.userId;
                        //console.log('data ' + data);
                        loginResults(sg,nm,pf,xr,bn);
                    },
                    error: function(xhr, status, error) {
                        alert('error' + xhr.responseText + '-' + status + '-' + error);
                    }
                });

                /*
                xmlhttp = new XMLHttpRequest();
                xmlhttp.open("POST", urlToSendXML, true);
                xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xmlhttp.send(params);
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                        var xr=xmlhttp.responseText;
                        alert('xr: ' + xr)
                        loginResults(sg,nm,pf,xr);
                    } else {
                        alert('xmlhttp.readyState: ' + xmlhttp.readyState + ', xmlhttp.status: ' + xmlhttp.status)
                    }
                }*/
            }

            document.querySelector("#LoginButton").addEventListener("click", function() {

                var loginForm = document.getElementById("LoginForm");
                login(loginForm);
            });


            function loginResults(sg,nm,pf,xr,bn) {

                if (xr != '0') {
                    var str1 = "<?php Print($appUrl); ?>";
                    //var str2 = window.location.host;

                    var urlHome = "";
                    urlHome = str1.concat("/menu1.php");
                    //alert('in loginResults: ' + 'xr: ' + xr + ',' + 'pf:' + pf + ',' + 'nm:'+nm + ',' + 'sg:' + sg + ',' + 'bn:' + bn)
                    var input1 = document.createElement("input");
                    input1.type = "hidden";
                    input1.name = "empnum";
                    input1.value = sg;
                    var input2 = document.createElement("input");
                    input2.type = "hidden";
                    input2.name = "empname";
                    input2.value = nm;
                    var input3 = document.createElement("input");
                    input3.type = "hidden";
                    input3.name = "empprof";
                    input3.value = pf;
                    var input4 = document.createElement("input");
                    input4.type = "hidden";
                    input4.name = "userid";
                    input4.value = xr;
                    var input5 = document.createElement("input");
                    input5.type = "hidden";
                    input5.name = "empbranch";
                    input5.value = bn;
                    //                    alert('xmlhttp.responseText: ' + xmlhttp.responseText + ', pf: ' + pf + ' ,nm: ' + nm + ' ,sg: ' + sg + ' , urlHome: ' + urlHome)
                    document.getElementById("forml").action = urlHome;
                    document.getElementById("forml").appendChild(input1);
                    document.getElementById("forml").appendChild(input2);
                    document.getElementById("forml").appendChild(input3);
                    document.getElementById("forml").appendChild(input4);
                    document.getElementById("forml").appendChild(input5);
                    document.getElementById("forml").submit();
                } else {
                    //var loginForm = document.getElementById("LoginForm");
                    var badLogin = document.getElementById("BadLogin");
                    badLogin.style.display = "block";
                    //loginForm.Username.select();
                    $("#Username").addClass("Highlighted");
                    setTimeout(function() {
                        badLogin.style.display = 'none';
                    }, 3000);
                }
            }

        </script>

        <script type="text/javascript">
            //var urlEmp = "../../resources/employee_prof.json";
            var urlEmp = "../../api/get_employee_profCurl.php";
            $("#suggestion").autocomplete({
                source: function(request, response) {

                    $.ajax({
                        url: urlEmp,
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
                                //alert('data.length: ' + data.length)
                                response($.map(data, function(item) {
                                    var itemn1 = item.EMP_FNAME + ' ' + item.EMP_LNAME;
                                    var itemn2 = item.EMP_LNAME + ' ' + item.EMP_FNAME;
                                    var empIdNum = item.EMP_IDNUM;
                                    var empnumber = item.EMP_NUMBER;
                                    if (empIdNum === request.term || empnumber === request.term){
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
                        $("#empprof").val("");
                        $("#suggestion").val("");
                        $("#suggestion").focus();
                    }
                },

                focus: function(event, ui) {
                    event.preventDefault();
                    // $("#subject_name").val(ui.item.label);
                    var empname = ui.item.value.EMP_FNAME + ' ' + ui.item.value.EMP_LNAME;
                    $("#empname").val(empname);
                },

                select: function(event, ui) {
                    if (ui.item.label == "Subject not found") {

                        $("#suggestion").val('');
                        $("#empname").val('');
                        $("#empprof").val('');
                        $("#empbranch").val('');
                        event.preventDefault();
                        return false;
                    }
                    //console.log( "Selected: " + ui.item.label + " aka " + ui.item.value);
                    var empname = ui.item.value.EMP_FNAME + ' ' + ui.item.value.EMP_LNAME;
                    var empn = ui.item.value.EMP_NUMBER;
                    var empprof = ui.item.value.EMP_PROFID;
                    var empbranch = ui.item.value.EMP_BRANCHID;
                    $("#suggestion").val(ui.item.value.EMP_NUMBER);
                    $("#empprof").val(empprof);
                    $("#empname").val(empname);
                    $("#empbranch").val(empbranch);
                    return false;
                }
            });

        </script>

        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="/__/firebase/8.7.1/firebase-app.js"></script>

        <!-- TODO: Add SDKs for Firebase products that you want to use
https://firebase.google.com/docs/web/setup#available-libraries -->

        <!-- Initialize Firebase -->
        <script src="/__/firebase/init.js"></script>
    </body>
</html>

