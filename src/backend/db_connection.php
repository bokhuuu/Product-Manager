<?php
$host = "sql109.infinityfree.com";
$dbname = "if0_36997338_product_db";
$username = "if0_36997338";
$password = "uYGYxaQDKO8K8R";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    die('Database connection failed: ' . $e->getMessage());
}
?>