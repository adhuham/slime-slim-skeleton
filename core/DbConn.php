<?php

namespace Core;

class DbConn
{
    public $pdo;

    private $pdoOpts = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ];

    public function __construct()
    {
        $this->connect();
    }

    private function connect(): void
    {
        $host = config('DB_HOST') ?? null;
        $user = config('DB_USER') ?? null;
        $pass = config('DB_PASS') ?? null;
        $dbname = config('DB_NAME') ?? null;

        if (!empty($host) && !empty($user) && !empty($pass) && !empty($dbname)) {
            $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
            try {
                $this->pdo = new \PDO($dsn, $user, $pass, $this->pdoOpts);
            } catch (\PDOException $e) {
                $msg = config('DISPLAY_ERRORS') ? ' ' . $e->getMessage() : null;
                die('Fail to establish database connection!' . $msg);
            }
        }
    }
}
