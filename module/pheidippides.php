<?php

namespace pheidippides;


define('CURL_TIMEOUT', 30);
define('GET', "GET");
define('POST', "POST");
define('UA_SIGNATURE', "Pheidippides");


function get($targeturl, $referurl='') {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
    curl_setopt($ch, CURLOPT_TIMEOUT, CURL_TIMEOUT);
    curl_setopt($ch, CURLOPT_USERAGENT, UA_SIGNATURE);
    curl_setopt($ch, CURLOPT_URL, $targeturl);
    if ($referurl) {
        curl_setopt($ch, CURLOPT_REFERER, $referurl);
    }
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
    curl_setopt($ch, CURLOPT_VERBOSE, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $resultdict = array();
    $resultdict['FILE']   = curl_exec($ch); 
    $resultdict['STATUS'] = curl_getinfo($ch);
    $resultdict['ERROR']  = curl_error($ch);
    print_r($resultdict['STATUS']);
    curl_close($ch);
    return $resultdict;
}
