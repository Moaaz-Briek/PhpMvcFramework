<?php

namespace app\Core;

class Session
{
    protected const FLASH_KEY = 'flash_messages';
    public function __construct()
    {
        session_start();
        $flashMessages = $_SESSION[self::FLASH_KEY];
        foreach ($flashMessages as $key => $message) {
            //Mark to be removed
        }
    }

    public function setFlash($key, $message)
    {
        $_SESSION[self::FLASH_KEY][$key] = $message;
    }

    public function getFlash($key)
    {

    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        //Iterate over marked to
    }

}