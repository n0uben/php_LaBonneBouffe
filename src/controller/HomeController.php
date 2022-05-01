<?php

class HomeController
{
    /**
     * @return void
     */
    public static function index(): void
    {
        require_once './src/views/dashboard.php';
    }
}