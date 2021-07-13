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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <link href="main2.css" rel="stylesheet" type="text/css">



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
                <h4 class="text-center" style="color: aliceblue; position: sticky">כל הזכויות שמורות לנגה פתרונות לסיעוד ©</h4>
            </div>
        </div>

        <div class="container">
            <div class="row" id="logo">
                <img src="/webapps/logo.png" alt="logo">
            </div>
            <div class="row">
                <h1 class="col-xs-12 text-center">ביקורים ממתינים לחתימה</h1>
                <h2 class="text-center">
                    <strong>
                        <span id="empname"></span>
                    </strong>
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6-offset-6 text-center" style="direction: ltr">
                    <input type="text" name="project" id="suggestion" class="text-center input-borderless SearchBox" placeholder="הכנס מטופל" autocomplete="off">
                    <input type="text" name="slct" id="selectmet_id" class="selectmet"/>
                </div>
            </div>

            <!--div class="cinun text-center">
<a href="#" onclick="toggleFunction()" id="sinun" style="font-size: 20px;font-weight:bold;">לסינון לפי תאריך</a>
</div>

<div class='parent'>
<div class='child inline-block-child' id="datepickerF" data-date-format="yyyy-mm-dd"></div>
<div class='child inline-block-child' id="datepickerT" data-date-format="yyyy-mm-dd"></div>
</div-->
            <br>
            <div class="table-responsive">
                <table class="table1 table table-hover table-dark" id="table1Id" style="margin-bottom: 50px;"> 
                    <tr> 
                        <!--th class="text-right"> מס' סידורי
</th--> 
                        <th class="text-right">שם<br>המטופל
                        </th>             
                        <th class="text-right">תאריך הביקור<br>מטפל נוכח<br>ביקור בעת שיבוץ
                        </th>
                        <!--th class="text-right">מטפל נוכח
</th>
<th class="text-right">ביקור בעת שיבוץ
</th-->
                        <th class="text-right">לינק<br>לטופס
                        </th>
                        <th class="text-right">עדכון<br>ביקור
                        </th>
                    </tr>  
                </table> 

            </div>
            <div id="empnum" style="display: none;"></div>
            <div id="empprof" style="display: none;"></div>
            <div id="userid" style="display: none;"></div>
            <div id="empbranch" style="display: none;"></div>

        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/visits.js"></script>

        <script type="text/javascript">

            function build_tr_link(value,pparam,pparam2,rowNum,rsn) {

                //update visit
                var str1 = window.location.origin;
                var prefix = "";

                var empn = document.getElementById("empnum").value;
                var empnm = document.getElementById("empname").value;
                var proff = document.getElementById("empprof").value;
                var uid = document.getElementById("userid").value;
                var metn = value.metupalvisit_metupalnumber;
                var param2Val = value.visitid;

                var tr = $('<tr>');
                //$(tr).append("<td>" + (rowNum) + "</td>");
                $(tr).append("<td>" + value.metFname + " " + value.metLname + "</td>");

                var mpLink = "&#10008";
                if (value.metupalpresent ==="1" ){
                    mpLink="&#10004;";
                } 
                //$(tr).append("<td><a href=\"javascript:void(0);\" style=\"font-size: 20px;\">"+mpLink+"</a></td>");
                var osLink = "&#10008;";
                if (value.onschedualtime ==="1" ){
                    osLink="&#10004;";
                } 
                //$(tr).append("<td><a href=\"javascript:void(0);\" style=\"font-size: 20px;\">"+osLink+"</a></td>");

                $(tr).append("<td>" + value.visitdatestr + "<br>"+mpLink+"<br>"+osLink+"</td>");

                var fileLink="&#10070;";
                var gotoLink="&#9997;";

                var visitDoc = "<?php Print($visitDoc); ?>";

                if (!rsn && visitDoc){
                    $(tr).append("<td><a onclick=\"javascript:download_file('"+metn+"','"+param2Val+"');\" href=\"javascript:void(0);style=\"font-size: 20px;\">"+fileLink+"</a></td>");
                    $(tr).append("<td><form action=\"menu5.php\" method=\"post\"><input type=\"hidden\" name=\"vid\" value=\""+value.visitid+"\"><input type=\"hidden\" name=\"empnum\" value=\""+empn+"\"><input type=\"hidden\" name=\"empprof\" value=\""+proff+"\"><input type=\"hidden\" name=\"empname\" value=\""+empnm+"\"><input type=\"hidden\" name=\"userid\" value=\""+uid+"\"><button type=\"submit\" style=\"font-size: 20px;\">"+gotoLink+"</button></form></td>");
                } else {
                    fileLink = "&#10008";
                    gotoLink = "&#10008";
                    $(tr).append("<td><a href=\"javascript:void(0);style=\"font-size: 20px;\">"+fileLink+"</a></td>");
                    $(tr).append("<td><a href=\"javascript:void(0);style=\"font-size: 20px;\">"+gotoLink+"</a></td>");
                }

                $(tr).append("</tr>");
                $('.table1').append(tr);
            }

        </script>


        <script type="text/javascript">
            var pparam = "<?php Print($_SESSION['empname']); ?>";
            var pparam2 = "<?php Print($_SESSION['empnum']); ?>";
            var pprof = "<?php Print($_SESSION['empprof']); ?>";
            var userid = "<?php Print($_SESSION['userid']); ?>";
            var empbranch = "<?php Print($_SESSION['empbranch']); ?>";
            console.log('pparam: ' + pparam + ', pprof: ' + pprof + ', empnum: ' + pparam2 + ', userid: ' + userid + ', empbranch: ' + empbranch);
            document.getElementById("empnum").value = pparam2;
            document.getElementById("empprof").value = pprof;
            document.getElementById("empname").value = pparam;
            document.getElementById("empname").innerHTML = pparam;
            document.getElementById("userid").value = userid;
            document.getElementById("empbranch").value = empbranch;

            /*if (pprof === '3'){
                $("#suggestion").hide();
                $("#sinun").hide();
            } */

            $(document).ready(function() {


                var phpUrl='api/get_visitCurl.php';
                $.ajax({
                    url: phpUrl,
                    method:"POST",
                    cache: false,
                    data:{ 
                        profemp: pparam2,
                        isSigned: 1
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
                        var rowNum=0;

                        var table = document.getElementById("table1Id").createCaption();
                        table.innerHTML = "<b>"+"מספר תוצאות: "+data.length+"</b>";

                        if (data.resStatus != '-1'){
                            $.map(data, function(model, key) {
                                var rsn = model.reasonnotoccurred_reasonid;
                                build_tr_link(model,pparam,pparam2,++rowNum,rsn);
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });

            });

            /*var dateFrom = '';
            $("#datepickerF").datepicker({
                format: "dd-mm-yyyy",
                todayBtn:  1,
                autoclose: true,
            }).on('changeDate', function (selected) {
                $("#datepickerT").datepicker('update', selected.date);
                dateFrom = moment(selected.date).format('YYYY-MM-DD');
            });

            var dateTo = '';
            $("#datepickerT").datepicker({
                format: "dd-mm-yyyy",
                todayBtn:  1,
                autoclose: true,
            }).on('changeDate', function (selected) {
                dateTo = moment(selected.date).format('YYYY-MM-DD');
                var sugg2 = document.getElementById("suggestion").value;
                var bn = document.getElementById("empbranch").value;
                var empnum = pparam2;
                $(".table1 tr>td").remove();
                var phpUrl='api/get_visitCurl.php';
                $.ajax({
                    url: phpUrl,
                    method:"POST",
                    data:{ 
                        isSigned: 1
                    },
                    dataType:"JSON",
                    success:function(data)
                    {
                        console.log('success4 php ' + phpUrl);
                        var rowNum = 0;
                        $.each(data, function( index, value ) {
                            var metupalNumber = value.metupalvisit_metupalnumber;
                            var visitDate = value.visitdate.substring(0,10);
                            var rsn = value.reasonnotoccurred_reasonid;
                            var disFlag=false;
                            if (sugg2 && sugg2==metupalNumber) {
                                if (moment(visitDate).isBetween(dateFrom, dateTo)){
                                    disFlag=true;
                                }
                            } else if (!sugg2){
                                if (moment(visitDate).isBetween(dateFrom, dateTo)){
                                    disFlag=true;
                                }
                            }
                            if (disFlag){
                                build_tr_link(value,pparam,pparam2,++rowNum,rsn);
                            }
                        })
                    },
                    error: function(xhr, status, error) {

                        alert(xhr.responseText);
                    }
                });

            });
            */
            $("#datepickerF").hide();
            $("#datepickerT").hide();

            function download_file(metn,visitid) {
                var docurl = "api/getVisitDocCurl.php";
                $.ajax({
                    url: docurl,
                    data:{ 
                        metn: metn,
                        visitid: visitid
                    },
                    type: "POST"
                }).done(function(result) {
                    const linkSource = result;
                    window.open(linkSource, '_blank').focus();
                    //const downloadLink = document.createElement("a");
                    //const fileName = "VISIT_DOCUMENT.pdf";
                    //console.log('res: ' + result)
                    //downloadLink.href = linkSource;
                    //downloadLink.download = fileName;
                    //downloadLink.click();
                });
            }

        </script>


        <script>
            function toggleFunction() {
                var x = document.getElementById("datepickerF");
                var y = document.getElementById("datepickerT");
                if (x.style.display === "none") {
                    x.style.display = "inline-block";
                } else {
                    x.style.display = "none";
                }
                if (y.style.display === "none") {
                    y.style.display = "inline-block";
                } else {
                    y.style.display = "none";
                }
            }
        </script>

        <script>

            var urlMet = "api/get_metupalCurl.php";
            var empbranch = document.getElementById("empbranch").value;
            //var empnum = document.getElementById("empnum").value;
            $("#suggestion").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: urlMet,
                        dataType: "json",
                        method: "POST",
                        cache: false,
                        data: {
                            empbranch: empbranch 
                        },
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
                                    var itemn1 = item.FNAME + ' ' + item.LNAME;
                                    var itemn2 = item.LNAME + ' ' + item.FNAME;
                                    var metIdNum = item.MIDNUM;
                                    var metNumber = item.METUPALNUMBER;
                                    //console.log(itemn1+","+itemn2+","+metIdNum+","+metNumber+":"+request.term)
                                    if (itemn1.search(request.term) >= 0 || itemn2.search(request.term) >= 0 || metIdNum.search(request.term) === 0 || metNumber === request.term){
                                        return {
                                            label: item.FNAME + ' ' + item.LNAME + ',' +item.METUPALNUMBER 
                                            + ',' +  item.BRANCHNAME,
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
                        $("#selectmet_id").val("");
                        $("#empprof").val("");
                        $("#empbranch").val("");
                        $("#suggestion").val("");
                        $("#suggestion").focus();
                    }
                },

                minLength: 3,
                focus: function(event, ui) {
                    event.preventDefault();
                    // $("#subject_name").val(ui.item.label);
                    var metname = ui.item.value.FNAME + ' ' + ui.item.value.LNAME;
                    $("#selectmet_id").val(metname);
                },

                select: function(event, ui) {
                    if (ui.item.label == "Subject not found") {

                        $("#selectmet_id").val('');
                        $("#suggestion").val('');
                        event.preventDefault();
                        return false;
                    }
                    //console.log( "Selected: " + ui.item.label + " aka " + ui.item.value);

                    var metname = ui.item.value.FNAME + ' ' + ui.item.value.LNAME;
                    var metn = ui.item.value.METUPALNUMBER;
                    $("#selectmet_id").val(metname);
                    $("#suggestion").val(metn);

                    $(".table1 tr>td").remove();
                    document.getElementById("table1Id").deleteCaption();
                    var phpUrl='api/get_visitCurl.php';
                    $.ajax({
                        url: phpUrl,
                        method:"POST",
                        cache: false,
                        data:{ 
                            metn: metn,
                            isSigned: 1
                        },
                        dataType:"JSON",
                        success:function(data)
                        {   
                            if (!data.length) {
                                console.log('no data found'); 
                                return false;
                            }
                            var table = document.getElementById("table1Id").createCaption();
                            table.innerHTML = "<b>"+"מספר תוצאות: "+data.length+"</b>";
                            console.log('success4 php ' + phpUrl);
                            var rowNum = 0;
                            $.each(data, function( index, value ) {
                                var rsn = value.reasonnotoccurred_reasonid;
                                build_tr_link(value,pparam,pparam2,++rowNum,rsn);
                            })
                        },
                        error: function(xhr, status, error) {
                            alert(xhr.responseText);
                        }
                    });

                    return false;
                }
            });


        </script>
        <script type="text/javascript" src="js/navbar.js"></script>
    </body>
</html>