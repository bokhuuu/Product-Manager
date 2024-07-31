<?php
require_once 'Product.php';

class Furniture extends Product {
    protected $height;
    protected $width;
    protected $length;

    public function __construct($sku, $name, $price, $height, $width, $length) {
        parent::__construct($sku, $name, $price, 'Furniture');
        $this->setHeight($height);
        $this->setWidth($width);
        $this->setLength($length);
    }

    public function save(PDO $db) {
        $stmt = $db->prepare("INSERT INTO products (sku, name, price, type, height, width, length) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$this->getSku(), $this->getName(), $this->getPrice(), $this->getType(), $this->getHeight(), $this->getWidth(), $this->getLength()]);
    }

    public function display() {
        return "SKU: {$this->getSku()}, Name: {$this->getName()}, Price: {$this->getPrice()}, Dimensions: {$this->getHeight()}x{$this->getWidth()}x{$this->getLength()} cm";
    }

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getWidth() {
        return $this->width;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function getLength() {
        return $this->length;
    }

    public function setLength($length) {
        $this->length = $length;
    }
}
?>