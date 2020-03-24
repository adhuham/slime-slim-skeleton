<?php

namespace Core;

use Core\Twig;

class Bootstrap
{
    public static $appInstance;
    public static $dbInstance;
    public static $twigInstance;

    public function __construct()
    {
        $this->loadConfig();
        $this->loadUtils();
        $this->setErrorReporting();
        $this->setBasePath();
        $this->initDbConn();
        $this->initTwig();
    }

    private function setBasePath(): void
    {
        if (!empty(config('APP_BASE'))) {
            app()->setBasePath(config('APP_BASE'));
        }
    }

    private function loadConfig(): void
    {
        try {
            $dotenv = \Dotenv\Dotenv::createImmutable(_CONFIG_);
            $dotenv->load();
        } catch (\Exception $e) {
            die('Could not load the config file');
        }
    }

    private function setErrorReporting(): void
    {
        if (\config('DISPLAY_ERRORS') == false || \app_env() == 'production') {
            error_reporting(0);
            ini_set('display_errors', 0);
        }
    }

    private function loadUtils(): void
    {
        require_once _CORE_ . '/utils.php';
    }

    private function initDbConn(): void
    {
        $dbConn = new DbConn();
        self::$dbInstance = $dbConn->pdo;
    }

    private function initTwig(): void
    {
        $twig = new Twig();
        self::$twigInstance = $twig->twig;
    }
}
