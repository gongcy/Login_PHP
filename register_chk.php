<?php
include_once 'conn/conn.php';
require_once 'Mail/';
require_once 'Main/Transport/Smtp.php';
$reback = '0';
$url = 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']).'/activation.php';
$url .= '?name='.trim($_GET['name']).'&pwd='.md5(trim($_GET['pwd']));
// Send active mail
$subject = "get active code";
$mailbody = 'register successful. your active code is: '.'<a href="'.$url.'"target="_blank">'.$url.'</a><br>';
// define email content
$envelope = "test@test.com";
// smtp test send email, use smtp as server
//$tr = new Zend_Mail_Tr

?>