<?php
    $host = '100.15.171.64';
    $dbname = 'storeHub';
    $username = 'zev';
    $password = '12';

    try {
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();
    }
    ?>