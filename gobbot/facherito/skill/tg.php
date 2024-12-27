<?php
/**
###############################################
#    𝗚𝗢𝗕𝗕𝗢𝗧.𝗡𝗘𝗧 🏴‍☠️ https://t.me/fatgov      #
###############################################
**/

function sendTg($msg, $key, $id) {
   $apiToken = $key;
   $data = [
        'chat_id' => $id,
       'text' => $msg
   ];
   $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data)."&parse_mode=html");
}
?>