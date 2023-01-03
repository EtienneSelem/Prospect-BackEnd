<?php
function serviceApi(){
    $url="http://127.0.0.1:8000/api/login";
    $crl = curl_init();

    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($crl);

    if(!$response){
        die('Error: "' . curl_error($crl) . '" - Code: ' . curl_errno($crl));
    }
    return $response;
    curl_close($crl);
}