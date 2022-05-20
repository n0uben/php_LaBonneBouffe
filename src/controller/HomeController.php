<?php

class HomeController
{
    /**
     * @return void
     */
    public function index(): void
    {
        require_once './src/view/dashboard.php';
    }
}