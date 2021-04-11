<?php
//Задания с 1 по 4
class Product {
    public $title;
    public $price;
    public $quantity;
    public $country;
    function __construct($title, $price, $quantity) {
            $this->title = $title;
            $this->price = $price;
            $this->quantity = $quantity;
    }
    function newgoods () {
            echo "$this->title - $this->price - $this->quantity<br>";
    }
}
//Добавляем дочерний класс, который дополняет информацию о продукте. Плодкласс Product_country наследует поля из родительского класса Product и в нем немного меняются функции.
class Product_country extends Product {
    function __construct($title, $price, $quantity, $country) {
        $this->title = $title;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->country = $country;
    }
    function newgoods () {
        echo "$this->title - $this->price - $this->quantity - $this->country<br>";
    }
}
$a = new Product(Xiaomi, 40000, 2);
$b = new Product_country(Iphone, 100000, 1, USA);
$a->newgoods();
$b->newgoods();

//Задание 5
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();
echo "<br>";
//В данном примере будет выведно 1234, так как переменная $x статическая, а значит, что при вызове функции происходит единственное присваивание ей значения и после окончания работы функции ее значение сохраняется, соотвественно при последующих вызовах функции переменная получает сохраненное ранее значение.

//Задание 6
class B {
    public function fooo() {
        static $z = 0;
        echo ++$z;
    }
}
class C extends B {
}
$a1 = new B();
$b1 = new C();
$a1->fooo();
$b1->fooo();
$a1->fooo();
$b1->fooo();
echo "<br>";
//В этом примере выведется 1122, потому что наследование класса (класс C наследуется от класса B) приводит к тому, что создается новая функция.

//Задание 7
class D {
    public function fooo() {
        static $y = 0;
        echo ++$y;
    }
}
class E extends D {
}
$a1 = new D;
$b1 = new E;
$a1->fooo();
$b1->fooo();
$a1->fooo();
$b1->fooo();
//В этом примере будет вывеведено также 1122, так как работа кода идентичена предыдущему заданию, разница лишь в том, что при создании нового объекта классов, можно опустить круглые скобки, потому что никакие значения в объект мы не передаем.