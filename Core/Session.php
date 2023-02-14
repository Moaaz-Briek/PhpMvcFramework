<?php

namespace app\Core;

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function sotFlash($key, $message)
    {

    }

    public function getFlash($key)
    {

    }

}