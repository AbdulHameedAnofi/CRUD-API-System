<?php

class Conn {}
    $servername = "localhost";
    $username = "root";
    $dbname = "apilogin";
    $password = "";

    try {
        $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname . ";", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $th) {
        echo "Connection Failed! " . $th->getMessage();
    }