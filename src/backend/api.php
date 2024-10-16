<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

require_once 'db_connection.php';
require_once 'DatabaseOperations.php';
require_once 'Product.php';
require_once 'Book.php';
require_once 'DVD.php';
require_once 'Furniture.php';

$databaseOperations = new DatabaseOperations($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    switch ($data['type']) {
        case 'DVD':
            $product = new DVD($data['sku'], $data['name'], $data['price'], $data['size']);
            break;
        case 'Book':
            $product = new Book($data['sku'], $data['name'], $data['price'], $data['weight']);
            break;
        case 'Furniture':
            $product = new Furniture($data['sku'], $data['name'], $data['price'], $data['height'], $data['width'], $data['length']);
            break;
        default:
            http_response_code(400);
            echo json_encode(array('error' => 'Invalid product type'));
            exit;
    }

    $databaseOperations->addProduct($product);
    http_response_code(201);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $products = $databaseOperations->getProducts();
    echo json_encode($products);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);
    $productIds = $data['productIds'];
    $databaseOperations->deleteProducts($productIds);
    http_response_code(204);
    exit;
}

http_response_code(405);
exit;
