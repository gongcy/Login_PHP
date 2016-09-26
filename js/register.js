// define a function to replace document.getElementById
function $(id) {
    return document.getElementById(id);
}
window.onload = function () {
    $('regname').focus();
    var cname1,cname2,cpwd1,cpwd2,cemail;
    // set active button
    function  chkreg(){
        if((cname1=='yes')&&(cname2=='yes')&&(cpwd1=='yes')&&(cpwd2=='yes')){
            $('regbtn').disabled = false;
        }else{
            $('regbtn').disabled = true;
        }
    }

    // verify username
    $('regname').onkeyup = function () {
        // get registered name
        name = $('regname').value;
        cname2 = '';
        if(name.match(/^[a-zA-Z_]*/) == ''){
            $('namediv').innerHTML = '<font color="red">Username must begin with letters or underline</font>';
            cname1 = '';
        }else if(name.length < 3){
            $('namediv').innerHTML = '<font color="red">Username must greater than 3 characters</font>';
            cname1 = '';
        }else{
            $('namediv').innerHTML = '<font color="green">Username is valid</font>';
        }
        chkreg();
    }
    // check if user exists
    $('regname').onblur = function () {
        name = $('regname').value;
        if (cname1 == 'yes'){
            xmlhttp.open('get','chkname.php?name='+name,true);
            xmlhttp.onreadystatechange = function () {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    var msg = xmlhttp.responseText;
                    if(msg == '1'){
                        $('namediv').innerHTML="<font color='green'>Congratulation,your username can be used!</font>"
                        cname2 = 'yes';
                    }else if(msg == '2'){
                        $('namediv').innerHTML="<font color='red'>Username have already registered!</font>"
                        cname2 = '';
                    }else{
                        $('namediv').innerHTML="<font color='red'>"+msg+"</font>";
                        cname2 = '';
                    }
                }
                chkreg();
            }
            xmlhttp.send(null);
        }
    }
    // verify password
    $('regpwd1').onkeyup = function () {
        pwd = $('regpwd1').value;
        pwd2 = $('regpwd2').value;
        if(pwd.length < 6) {
            $('pwddiv1').innerHTML = '<font color=red>password need at least 6 characters</font>';
            cpwd1 = '';
        }else if(pwd.length >= 6 && pwd.length < 12){
            $('pwddiv1').innerHTML = '<font color=green>password meet the requirement. Password Strength:weak</font>';
            cpwd1 = 'yes';
        }else if(pwd.match(/^[0-9]*$/ != null) || (pwd.match(/^[a-zA-Z]*$/)) != null){
            $('pwddiv1').innerHTML = '<font color=green>password meet the requirement. Password Strength:middle</font>';
            cpwd1 = 'yes';
        }else{
            $('pwddiv1').innerHTML = '<font color=green>password meet the requirement. Password Strength:strong</font>';
            cpwd1 = 'yes';
        }
        if (pwd != '' && pwd != pwd2){
            $('pwddiv2').innerHTML = '<font color=red>The two password doesn\'t match</font>';
            cpwd2 = '';
        }else if(pwd2 != '' && pwd == pwd2) {
            $('pwddiv2').innerHTML = '<font color=green>Password correct</font>';
        }
        chkreg();
    }

    // verify email
    $('email').onkeyup = function() {
        emailreg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        if($('email').value.match(emailreg) == null){
            $('emptydiv').innerHTML = '<font color="red">Wrong Email format</font>';
            cemail = '';
        }else{
            $('emaildiv').innerHTML = '<font color=green>valid email format</font>';
            cemail = 'yes';
        }
        chkreg();
    }
    // show/hidden more details
    $('morebtn').onclick = function () {
        if ($('morediv').style.display ==''){
            $('morediv').style.display = 'none';
        }else{
            $('morediv').style.display = '';
        }
    }

    // login button
    $('logbtn').onclick = function () {
        window.open('login.php', '_parent', '', false);
    }

    // register
    $('regbtn').onclick = function () {
        $('imgdiv').style.visibility = 'visible';
        url = 'register_chk.php?name='+$('regname');
    }



}


