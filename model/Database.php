<?php
abstract class Database {

    const DB_HOST = 'mysql:host=localhost;dbname=forteroche;charset=utf8';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    private $connection;


    private function checkConnection() {
        if($this->connection === null) {
            return $this->dbConnection();
        }
        return $this->connection;
    }


    private function dbConnection() {
        $this->connection = new PDO(Database::DB_HOST, Database::DB_USER, Database::DB_PASSWORD);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $this->connection;
    }


    protected function query($query, $parameters = null) {
        if($parameters) {
            $req = $this->checkConnection()->prepare($query);
            $req->execute($parameters);
        } else {
            $req = $this->checkConnection()->query($query);
        }
        return $req;
    }
}