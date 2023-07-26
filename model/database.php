<?php
    $dsn = 'mysql:host=localhost;dbname=develop_project';
    $username = 'root';
    $password = 'mysql';


    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error = "Database Erro: ";
        $error = $e->getMessage();
        include('view/error.php');
        exit();
    }