setInterval(showTime, 1000);
function showTime() {
    let time = new Date();
    let hour = time.getHours();
    let min = time.getMinutes();
    let sec = time.getSeconds();
  
    hour = hour < 10 ? "0" + hour : hour;
    min = min < 10 ? "0" + min : min;
    sec = sec < 10 ? "0" + sec : sec;
  
    let currentTime = hour + ":" 
            + min + ":" + sec;
  
    document.getElementById("clock")
            .innerHTML = currentTime;
}
showTime();
var pressed = document.getElementById('pressed');

function keyPressed(evt){
    evt = evt || window.event;
    var key = evt.keyCode || evt.which;
    return String.fromCharCode(key); 
}

document.onkeypress = function(evt) {
    var str = keyPressed(evt);
    //alert(str);
    document.getElementById('idFuncionario').focus();
}
function se0Iguala1(){
    var id0=document.getElementById('idFuncionario').value;
    var id1=document.getElementById('idFuncionario1').value;
    if (id0==id1){
        document.getElementById('form').action="/ponto/registrar";
    }else{
        document.getElementById('form').action="/ponto/ver";
    }
    document.getElementById('form').submit();
}