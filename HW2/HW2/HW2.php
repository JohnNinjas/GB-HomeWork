<?php
abstract class Goods {
    protected $name;
    protected $price = 100;
    public function __construct($name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }
    abstract public function getPrice();
}
class Regular extends Goods {
    public function getPrice() {
        return $this->price;
    }
}
class Digital extends Goods
{
    public function getPrice() {
        return $this->price / 2;
    }
}
class Weight extends Goods {
    protected $weight;
    public function __construct($name, $weight) {
        parent::__construct($name);
        $this->name = $name;
        $this->weight = $weight;
    }
    public function getPrice() {
        return $this->weight * $this->price;
    }
}

$regular = new Regular('Обычный товар');
$digital = new Digital('Цифровой товар');
$weight = new Weight('Весовой товар', 10);

echo 'Наименование: ' . $regular->getName() . PHP_EOL;
echo 'Цена: ' . $regular->getPrice() . PHP_EOL . "<br>";
echo 'Наименование: ' . $digital->getName() . PHP_EOL;
echo 'Цена: ' . $digital->getPrice() . PHP_EOL . "<br>";
echo 'Наименование: ' . $weight->getName() . PHP_EOL;
echo 'Цена: ' . $weight->getPrice() . PHP_EOL . "<br>";