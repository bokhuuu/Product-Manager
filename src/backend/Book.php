<?php

require_once 'Product.php';

class Book extends Product {
    protected $weight;

    public function __construct($sku, $name, $price, $weight) {
        parent::__construct($sku, $name, $price, 'Book');
        $this->setWeight($weight);
    }

    public function save(PDO $db) {
        $stmt = $db->prepare("INSERT INTO products (sku, name, price, type, weight) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$this->getSku(), $this->getName(), $this->getPrice(), $this->getType(), $this->getWeight()]);
    }

    public function display() {
        return "SKU: {$this->getSku()}, Name: {$this->getName()}, Price: {$this->getPrice()}, Weight: {$this->getWeight()} Kg";
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }
}
?>