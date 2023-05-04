<?php

class db{
    private $dbHost = 'localhost:8889';
    private $dbUser = 'test';
    private $dbPass = '';
    private $dbName = 'crystal';

    public function connectionDB(){
        $mysqlConnect = "mysql:host=$this->dbHost;dbName=$this->dbName";
        $dbConnection = new PDO($mysqlConnect, $this->dbUser, $this->dbPass);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }
}