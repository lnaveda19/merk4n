<?php
/**
###############################################
#    𝗚𝗢𝗕𝗕𝗢𝗧.𝗡𝗘𝗧 🏴‍☠️ https://t.me/fatgov      #
###############################################
**/
require "run.php"; 

$username = $_GET['username'] ?? '';

$acc = getUseracc($username);

header('Content-Type: application/json');
echo json_encode(['acc' => $acc]);
