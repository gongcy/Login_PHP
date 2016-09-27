<?php
include_once 'conn/conn.php';
$reback = 0;
$sql = "insert into tb_member(name, password, question, answer, 
email, realname, birthday, telephone, qq, active) 
VALUES('".trim($_GET['name']).','.trim($_GET['pwd']).','.trim($_GET['question']).
",".trim($_GET['answer']).",".trim($_GET['email']).",".trim($_GET['realname']).",".
trim($_GET['birthday']).",".trim($_GET['telephone']).",".trim($_GET['qq']).",'1'";
$num = $conne->uidRst($sql);
if ($num == 1) {
    $reback = '1';
}
echo $reback;
?>