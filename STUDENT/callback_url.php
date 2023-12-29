<?php
$callbackResponse = file_get_contents('PHP://input');

$logfile="CallbackResponse.txt";
$log=fopen( $logfile,"a");
fwrite($log,$callbackResponse);
fclose($log);
?>