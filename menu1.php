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
                <h4 class="text-center" style="color: aliceblue; position: sticky">כל הזכויות שמורות לנגה פתרונות לסיעוד©</h4>
            </div>
        </div>
        <div class="container">
            <div class="row" id="logo">
                <img src="/webapps/logo.png" alt="logo">
            </div>
            <div class="row">
                <h2 class="col-xs-12" id="empN"></h2>
            </div>
            
            <div id="options" style="display: none;"></div> <!-- waiting visits -->
            
            <form action="menu2.php" method="post">
                <input type="submit" id="newVisit" name="newVisit" value="הוספת ביקור חדש" class="btn btn-primary btn-lg col-xs-8 input-button">
            </form>

            <form action="menu7.php" method="post">
                <input type="submit" id="newVisitNotOcc" name="newVisitNotOcc" value="הוספת ביקור שלא בוצע" class="btn btn-primary btn-lg col-xs-8 input-button">
            </form>

            <form action="menu4.php" method="post">
                <input type="submit" id="updateVisit" name="updateVisit" value="עדכון ביקור קיים" class="btn btn-primary btn-lg col-xs-8 input-button">
            </form>

            <form action="menu3.php" method="post">
                <input type="submit" id="reports" name="reports" value="היסטורית ביקורים" class="btn btn-primary btn-lg col-xs-8 input-button">
            </form>
            
            <form action="menu8.php" method="post">
                <input type="submit" id="future" name="future" value="הפקת דוח ביקורי בית לביצוע" class="btn btn-primary btn-lg col-xs-8 input-button">
            </form>
            
            <div id="empnum" style="display: none;"></div>
            <div id="empprof" style="display: none;"></div>
            <div id="empname" style="display: none;"></div>
            <div id="userid" style="display: none;"></div>
            <div id="empbranch" style="display: none;"></div>
        </div>
        <br>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>

        <script type="text/javascript" src="js/visits.js"></script>

        <script>
            var pparam = "<?php Print($_SESSION['empname']); ?>";
            var pparam2 = "<?php Print($_SESSION['empnum']); ?>";
            var pprof = "<?php Print($_SESSION['empprof']); ?>";
            var userid = "<?php Print($_SESSION['userid']); ?>";
            var empbranch = "<?php Print($_SESSION['empbranch']); ?>";
            console.log('pparam: ' + pparam + ', pprof: ' + pprof + ', empnum: ' + pparam2 + ', userid: ' + userid + ', empbranch' + empbranch)

            $("#empname").val(pparam);
            $("#empnum").val(pparam2);
            $("#empprof").val(pprof);
            $("#userid").val(userid);
            $("#empbranch").val(empbranch);

            if (pprof!="3"){
                //<!-- waiting visits -->
                var options = document.getElementById('options');
                var f1 = document.createElement("form");
                f1.action = "menu6.php";
                f1.method = "post";
                var i1 = document.createElement("input");
                i1.type = "submit";
                i1.id="reports";
                i1.name="reports";
                i1.value="ביקורים ממתינים לחתימה";
                i1.classList.add("btn");
                i1.classList.add("btn-primary");
                i1.classList.add("btn-lg");
                i1.classList.add("col-xs-8");
                i1.classList.add("input-button");
                f1.appendChild(i1);
                options.appendChild(f1);
                options.style.display = "block";
            }

            document.getElementById('empN').innerHTML = 'שלום ' + pparam;

        </script>
        <script type="text/javascript" src="js/navbar.js"></script>
    </body>
</html>