<?php

class DB
{
    const HOST = "localhost";
    const DATA_BASE = "kpi";
    const USER = "root";
    const PASS = "";

    public function connection()
    {
        $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DATA_BASE;
        return new PDO($dsn, self::USER, self::PASS);
    }
}