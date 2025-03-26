<?php

$host = "localhost";
$dbase = "sample";
$uname = "root";
$pw = '';
$dsn = "mysql:host={$host};dbname={$dbase}";
try {
    $con = new PDO($dsn, $uname, $pw);
    if ($con) {
        //  echo "successfully connected to database";
    }
} catch (PDOException $th) {
    echo $th->getMessage();
}
