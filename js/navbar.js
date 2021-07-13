$(document).ready(function buildnav() {

    var pprof = document.getElementById('empprof').value;

    console.log('in buildnav: ' + pprof)

    var ul = document.getElementById("navulist");
    var li1 = document.createElement("li");
    var a1 = document.createElement("a");
    a1.href = "menu2.php";
    var span1 = document.createElement("span");
    span1.innerHTML = "הוספת ביקור חדש";
    a1.appendChild(span1);
    li1.appendChild(a1);
    var li8 = document.createElement("li");
    var a8 = document.createElement("a");
    a8.href = "menu8.php";
    var span8 = document.createElement("span");
    span8.innerHTML = "הפקת דוח ביקורי בית לביצוע";
    a8.appendChild(span8);
    li8.appendChild(a8);
    var li7 = document.createElement("li");
    var a7 = document.createElement("a");
    a7.href = "menu7.php";
    var span7 = document.createElement("span");
    span7.innerHTML = "הוספת ביקור שלא בוצע";
    a7.appendChild(span7);
    li7.appendChild(a7);
    var li2 = document.createElement("li");
    var a2 = document.createElement("a");
    a2.href = "menu4.php";
    var span2 = document.createElement("span");
    span2.innerHTML = "עדכון ביקור קיים";
    a2.appendChild(span2);
    li2.appendChild(a2);
    var li6 = document.createElement("li");
    var a6 = document.createElement("a");
    a6.href = "menu6.php";
    var span6 = document.createElement("span");
    span6.innerHTML = "ביקורים ממתינים לחתימה";
    a6.appendChild(span6);
    li6.appendChild(a6);

    var li3 = document.createElement("li");
    var a3 = document.createElement("a");
    a3.href = "menu3.php";
    var span3 = document.createElement("span");
    span3.innerHTML = "היסטורית ביקורים";
    a3.appendChild(span3);
    li3.appendChild(a3);

    var li4 = document.createElement("li");
    var a4 = document.createElement("a");
    a4.href = "start/login-form-19/logout.php";
    var span4 = document.createElement("span");
    span4.innerHTML = "יציאה";
    a4.appendChild(span4);
    li4.appendChild(a4);

    
    ul.appendChild(li1);
    ul.appendChild(li7);
    if (pprof!='3'){
        ul.appendChild(li6);
    } 
    ul.appendChild(li2);
    ul.appendChild(li3);
    ul.appendChild(li8);
    ul.appendChild(li4);
    

    $("button.navbar-toggle").click(function (e) {
        $("#main-navbar").collapse('hide');
        $("#main-navbar").removeClass("in"); 
    });

});