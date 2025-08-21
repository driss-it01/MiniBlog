<?php



$dsn = "mysql:host=localhost;dbname=miniblog;charset=utf8mb4";
$user = "root";
$password = "";

try{
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $ex){
    die("Connection failed : " . $ex->getMessage());
}



?>