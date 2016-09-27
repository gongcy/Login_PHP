function $(id) {
    return document.getElementById(id);
}

window.onload = function () {
    showval();
    $('lgname').focus();
    $('lgname').onekeydown = function () {
        if(event.keyCode=13){
            $('lgpwd').select();
        }
    }
    $('lgpwd').onkeydown = function () {
        if(event.keyCode == 13) {
            $('logchk').select();
        }
    }
    $('lgchk').onekeydown = function () {
        if(event.keyCode == 13) {
            chklg();
        }
    }
    $('lgbtn').onclick = chklg;
    function chklg() {

    }
}