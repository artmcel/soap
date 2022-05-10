<?php
session_start();      
require('utmCookies.php');
use UtmCookie\UtmCookie;
UtmCookie::init();
UtmCookie::setName('campanas');
UtmCookie::setOverwrite(false);
// set lifetime to 3 Days
UtmCookie::setLifetime(new DateInterval('P1Y'));
$utmCookieSource = UtmCookie::get('utm_source');
$utmCookieCampaign = UtmCookie::get('utm_campaign');
$utmCookieMedium = UtmCookie::get('utm_medium');
$utmCookieTerm = UtmCookie::get('utm_term');
$utmCookieId = UtmCookie::get('utm_id');

$campaign = $utmCookieCampaign;                        
$medium = $utmCookieMedium;
$source  = $utmCookieSource;
$term = $utmCookieTerm;
$cId = $utmCookieId;

echo $campaign;
echo $medium;
echo $source;
echo $term;
echo $utmCookieId;


/*

if ( !empty($source) || !empty($medium) || !empty($campaign) || !empty($term) ) {
    $_SESSION["source"]=$source;
    $_SESSION["medium"]=$medium;
    $_SESSION["campaign"]=$campaign;
    $_SESSION["term"]=$term;

    //echo "if: ".$source;
} else {
    $source ="organico";
    $medium= 0;
    $campaign= 0;
    $term=0;

    $_SESSION["source"]=$source;
    $_SESSION["medium"]=$medium;
    $_SESSION["campaign"]=$campaign;
    $_SESSION["term"]=$term;

    //echo "else: ".$source;
}

*/
?>