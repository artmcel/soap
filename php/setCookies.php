<?php
session_start();      
require('utmCookies.php');
use UtmCookie\UtmCookie;
UtmCookie::init();
UtmCookie::setName('st');
UtmCookie::setOverwrite(false);
// set lifetime to 3 Days
UtmCookie::setLifetime(new DateInterval('P1Y'));
$utmCookieSource   = UtmCookie::get('utm_source');
$utmCookieCampaign = UtmCookie::get('utm_campaign');
$utmCookieId       = UtmCookie::get('utm_id');
$utmContent        = UtmCookie::get('utm_content');
//$utmCookieMedium   = UtmCookie::get('utm_medium');
$utmCookieTerm     = UtmCookie::get('utm_term');

$source   = $utmCookieSource;
$campaign = $utmCookieCampaign;                        
$cId      = $utmCookieId;
$content  = $utmContent; 
//$medium  = $utmCookieMedium;
$term    = $utmCookieTerm;

/*
$_SESSION["source"]   = $source;
$_SESSION["campana"]  = $campaign;
$_SESSION["idcookie"] = $cId;
$_SESSION["content"]  = $content;
//$_SESSION["medium"]   = $medium;
$_SESSION["term"]     = $term;
*/


if ( !empty($source) || !empty($campaign) || !empty($cId) || !empty($content) || !empty($term) ) {
    $_SESSION["source"]   = $source;
    $_SESSION["campana"]  = $campaign;
    $_SESSION["idcookie"] = $cId;
    $_SESSION["content"]  = $content;
    //$_SESSION["medium"]   = $medium;
    $_SESSION["term"]     = $term;

    //echo "if: ".$source;
} else {
    //seteamos si las variables vienen vacias
    $source = 'organico';
    $campaign = '0';
    $cId = '0';
    $content = '0';
    $term = '0';

    // volemos a generar las variables de sesion
    $_SESSION["source"]   = $source;
    $_SESSION["campana"]  = $campaign;
    $_SESSION["idcookie"] = $cId;
    $_SESSION["content"]  = $content;
    //$_SESSION["medium"]   = $medium;
    $_SESSION["term"]     = $term;

    //echo "else: ".$source;
}

?>