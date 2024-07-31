<?php

require_once 'Product.php';

class DVD extends Product {
    protected $size;

    public function __construct($sku, $name, $price, $size) {
        parent::__construct($sku, $name, $price, 'DVD');
        $this->setSize($size);
    }

    public function save(PDO $db) {
        $stmt = $db->prepare("INSERT INTO products (sku, name, price, type, size) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$this->getSku(), $this->getName(), $this->getPrice(), $this->getType(), $this->getSize()]);
    }

    public function display() {
        return "SKU: {$this->getSku()}, Name: {$this->getName()}, Price: {$this->getPrice()}, Size: {$this->getSize()} MB";
    }

    public function getSize() {
        return $this->size;
    }

    public function setSize($size) {
        $this->size = $size;
    }
}
?>