<?php
function session_chk(){
    $period_time = 120;
    session_start();
    if(!empty($_SESSION['last_access'])){
        if((mktime() - $_SESSION['last_access']) > $period_time){
            echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'?mode=timeout">';
            logout_s();
            exit;
        }else{
            $_SESSION['last_access']=mktime();
        }
    }else{
        echo '<meta http-equiv="refresh" content="0;URL='.REDIRECT.'">';
        exit;
    }
}

function kakikomi($name,$honbun){
$fp = fopen('sousakadai9.txt', 'a');
fwrite($fp, '名前'.$name.'<br>'.'本文'.$honbun.'<br>');
fclose($fp);
$file_txt = file_get_contents('sousakadai9.txt');



}
$file_txt = file_get_contents('sousakadai9.txt');
