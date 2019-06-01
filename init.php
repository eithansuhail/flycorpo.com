<?php


function curl($url, $parameters, $content_type, $post = true, $headers =[])
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if ($post) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
    }
    curl_setopt($ch, CURLOPT_POST, $post);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    return $result;
}