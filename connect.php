<?php
    $server = "localhost:1201";
    $dbname = "bd_nobels";
    $user="root";
    $pass = "";
    try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass );
    } catch (PDOException $e) {
    echo $e->getMessage();
    }
?>