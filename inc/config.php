<?php

define('DBNAME', 'testdb');
define('DRIVER', 'mysql');
define('USER', 'root');
define('PASSWORD', '');
define('HOST', 'localhost');

try{
    $conn = new PDO(DRIVER . ':host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);
    $conn->exec('SET NAMES utf8;');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
