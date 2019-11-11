gl=30;
tim=null
var playing=false;
var num_holes=6*10;
var fol_tuch=-1;
function false_ping() {
    for(var i=0;i<document.tuch.elements.length;i++)
        document.tuch.elements[i].checked=false;
}
function time_stop() {
    if(playing)
        clearTimeout(tim);
}
function relis_t(rt) {
    document.display.time.value=rt;
    if(playing) {
        if(rt==0) {
            stop();
            return;
        }
        else {
            t=rt-1;
            tim=setTimeout("relis_t(t)",1000);
        }
    }
}
function stop() {
    time_stop();
    playing=false;
    document.display.time.value=0;
    false_ping();
    status("Гра закінчена");

    parent.incomingValue(document.getElementById("scoree").value);

}
function play() {
    time_stop();
    if(playing) {
        stop();
        return;
    }
    playing=true;
    false_ping();
    score=0;
    document.display.score.value=score;
    status("Граєте...");
    connection();
    relis_t(gl);
}
function status(msg) {
    document.display.state.value=msg;
}
function connection() {
    var comand=false;
    while(!comand) {
        mynum=ran();
        if(mynum!=fol_tuch) {
            document.tuch.elements[mynum].checked=true;
            fol_tuch=mynum;
            comand=true;
        }
    }
}

function score_display(id) {
    if(playing==false) {

        status("Натисни старт");
        return;
    }
    if(fol_tuch!=id) {
        score+=-1;
        document.display.score.value=score;
        document.tuch.elements[id].checked=false;
    }
    else {
        score+=1;
        document.display.score.value=score;
        connection();
        document.tuch.elements[id].checked=false;
    }
}

function ran() {
    return(Math.floor(Math.random()*100%num_holes));
}