<?php
    require_once "autoLoad.php";
    $database = new Database('localhost','state','root','root');
    $pdo=$database->connect();
    Connect::$pdo = $pdo;
?>