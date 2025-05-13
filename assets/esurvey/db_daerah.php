<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'lpmdd_staging';
$db_dsn = "mysql:dbname=$dbname;host=$dbhost";
try {
    $db = new PDO($db_dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
