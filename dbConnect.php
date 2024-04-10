<?php

try {
    
    $pdo = new PDO('mysql:host=localhost:3306;dbname=resumesrus', 'itsd', 'mysql');
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
    
} catch (PDOException $ex) {

    $error = 'Unable to connect to the database server<br><br>' . $ex->getMessage();
    
    if ($closeSelect) {
        echo "</select>";
        $closeSelect = false;
    }
    
    include 'error.html.php';
    throw $ex;
    
}