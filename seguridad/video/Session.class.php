<?php
    
class Session
{
    private function __construct()
    {
    }
        
    public static function start()
    {
        session_name('SESSION');
        session_cache_limiter('nocache');
        session_start();
    }

    public static function isValidSession()
    {
        return isset($_SESSION['dni']) && $_SERVER['REMOTE_ADDR'] == self::getValue('ip');
    }

    public static function destroy()
    {
        $_SESSION = [];
        session_destroy();
        setcookie('SESSION', '', 1, '/');
    }
    public static function getValue($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function setValues($valores)
    {
        foreach ($valores as $key=>$valor) {
            $_SESSION[$key]=$valor;
        }
    }
}
