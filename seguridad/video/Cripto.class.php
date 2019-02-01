<?php

class Cripto
{
    private static $SECRET_KEY='PATATA';
    private static $SECRET_IV='TOMATO';
    private static $METHOD = 'AES-256-CBC';
    
    private function __construct()
    {
    }

    public static function encrypt($string)
    {
        $key = hash('sha256', self::$SECRET_KEY);
        $iv = substr(hash('sha256', self::$SECRET_IV), 0, 16);

        $output = openssl_encrypt($string, self::$METHOD, $key, 0, $iv);
        return base64_encode($output);
    }

    public static function decrypt($string)
    {
        $key = hash('sha256', self::$SECRET_KEY);
        $iv = substr(hash('sha256', self::$SECRET_IV), 0, 16);

        $string = base64_decode($string);
        $output = openssl_decrypt($string, self::$METHOD, $key, 0, $iv);

        return $output;
    }
}
