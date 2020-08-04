<?php

function generateToken($id_user, $username, $type = 0)
{
    if (0 == $type) {
        $type = 'accessToken';
    } else {
        $type = 'refreshToken';
    }
    $data = json_encode([
        'type'      => $type,
        'id'        => $id_user,
        'username'  => $username,
    ]);
    $ciphering = "AES-128-CTR";
    $encryption_iv = '1234567891011121';
    $encryption_key = "hsbm123456";
    $encrypt = openssl_encrypt($data, $ciphering, $encryption_key, 0, $encryption_iv);
    return base64_encode($encrypt);
}


function decodeToken($token)
{
    $ciphering = "AES-128-CTR";
    $encryption_iv = '1234567891011121';
    $encryption_key = "hsbm123456";
    $result = openssl_decrypt(base64_decode($token), $ciphering, $encryption_key, 0, $encryption_iv);
    try {
        $data = json_decode($result, 1);
    } catch(JsonException $e) {
        return false;
    }
    return $data;
}


function validateSession()
{
    $CI = &get_instance();
    if (null == $CI->session->tempdata('user')) {
        if (null != get_cookie('accessToken')) {
            $data = decodeToken(get_cookie('accessToken'));
            if (false != $data) {
                $CI->session->set_tempdata('user', $data['id'], 3600);
            }
        } else if (null != get_cookie('refreshToken')) {
            $data = decodeToken(get_cookie('refreshToken'));
            if (false != $data) {
                $CI->session->set_tempdata('user', $data['id'], 3600);
            }
        }
    }
}

function generateSecurityCode(string $action, int $lifetime)
{
    $data = json_encode([
        'type'      => $action,
        'lifetime'  => $lifetime,
    ]);
    $ciphering = "AES-256-CTR";
    $encryption_iv = '9876543210000123';
    $encryption_key = "hsbm123456";
    $encrypt = openssl_encrypt($data, $ciphering, $encryption_key, 0, $encryption_iv);
    return $encrypt;
}

function decryptSecurityCode(string $code)
{
    $ciphering = "AES-256-CTR";
    $encryption_iv = '9876543210000123';
    $encryption_key = "hsbm123456";
    $result = openssl_decrypt($code, $ciphering, $encryption_key, 0, $encryption_iv);
    try {
        $data = json_decode($result, 1);
    } catch(JsonException $e) {
        return false;
    }
    return $data;
}