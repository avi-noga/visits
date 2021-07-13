var clockElement = document.getElementById('clock');

function clock() {
    const d = new Date();
    var options = { year: 'numeric', month: 'numeric', day: 'numeric' , hour: 'numeric', minute: '2-digit' };
    clockElement.textContent = d.toLocaleDateString("en-GB", options);
}

setInterval(clock, 1000);
