<?php
function sendPayIr($api, $amount, $redirect, $mobile = null, $factorNumber = null, $description = null) {
    return curl_postPayIr('https://pay.ir/pg/send', [
        'api'          => $api,
        'amount'       => $amount,
        'redirect'     => $redirect,
        'mobile'       => $mobile,
        'factorNumber' => $factorNumber,
        'description'  => $description,
    ]);
}
function verifyPayIr($api, $token) {
    return curl_postPayIr('https://pay.ir/pg/verify', [
        'api' 	=> $api,
        'token' => $token,
    ]);
}
function curl_postPayIr($url, $params)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);
    $res = curl_exec($ch);
    curl_close($ch);
    return $res;
}