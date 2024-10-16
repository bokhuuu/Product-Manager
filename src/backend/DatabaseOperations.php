<?php
require_once 'db_connection.php';
require_once 'Product.php';

class DatabaseOperations
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function addProduct(Product $product)
    {
        $product->save($this->db);
    }

    public function getProducts()
    {
        $stmt = $this->db->query("SELECT * FROM products ORDER BY id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteProducts(array $productIds)
    {
        $placeholders = rtrim(str_repeat('?, ', count($productIds)), ', ');
        $stmt = $this->db->prepare("DELETE FROM products WHERE id IN ($placeholders)");
        $stmt->execute($productIds);
    }

    public function updateProduct(Product $product)
    {
        $stmt = $this->db->prepare("UPDATE products SET name = ?, price = ?, type = ? WHERE sku = ?");
        $stmt->execute([$product->getName(), $product->getPrice(), $product->getType(), $product->getSku()]);
    }
}

$databaseOperations = new DatabaseOperations($db);
