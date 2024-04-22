<?php

namespace App\Application\Services;

class DatabaseConnect
{
    private \PDO $connection;

    public function __construct()
    {
        try {
            $host = getenv('DB_HOST');
            $dbname = getenv('DB_DATABASE');
            $username = getenv('DB_USERNAME');
            $password = getenv('DB_PASSWORD');

            $this->connection = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getConnection(): \PDO
    {
        return $this->connection;
    }
}
