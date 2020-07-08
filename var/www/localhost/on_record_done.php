<?php

    include("common.php");

    $jsondata = json_encode($_POST);
    error_log('['.date("F j, Y, g:i a e O").']'.PHP_EOL.'on_record_done.php:'.PHP_EOL, 3, $errlog);
    error_log(print_r($jsondata, TRUE).PHP_EOL, 3, $errlog);

    $full_url = $url.'/plugin/Live/on_record_done.php';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $full_url);
    //curl_setopt($ch, CURLOPT_HEADER, true);
    //curl_setopt($ch, CURLOPT_NOBODY, true);
    //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    //$postdata = json_decode(jsondata, true);
    $query = http_build_query($_POST);
    error_log(print_r($query, TRUE).PHP_EOL, 3, $errlog);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
    $output = curl_exec($ch);
    $respcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    error_log('Response Code :'.$respcode.PHP_EOL, 3, $errlog);
    //error_log($output.PHP_EOL, 3, $errlog);

    http_response_code($respcode);
    die();
?>
