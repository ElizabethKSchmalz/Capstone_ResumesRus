<?php

try {
    
    //$pdo = new PDO('mysql:host=sql106.infinityfree.com:3306;dbname=if0_36419575_resumesrus', 'if0_36419575', 'resumesrus');
    $pdo = new PDO('mysql:host=localhost:3306;dbname=resumesrus', 'itsd', 'mysql');
    //$pdo = new PDO('mysql:host=sql106.infinityfree.com:3306;dbname=if0_36419575_resumesrus', 'if0_36419575', 'resumesrus');
    
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