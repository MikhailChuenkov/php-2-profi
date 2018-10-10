<?php
class Product
{
    public $title;
    public $image;
    public $price;
    public function sale(){
        //Добавить акцию на товар
    }
}

class Cart
{
    public $status;
    public $clean;
    public $checkout;
    public function delete(){
        //Удалить товар из корзины
    }
}

class Order
{
    public $new;
    public $approved;
    public $received;
    public $canceled;
    public function canseled(){
        // Отменить заказ
    }
}

class Clothes extends Product
{
public $size; //Размер одежды
}

class cartHeader extends cart
{
    public function openMenu(){
        //Открыть всплывающее меню с заказом в шапке сайта
    }
}
class orderHistory extends order
{
    public function showHistoryOrders(){
        //Показать историю заказов
    }
}
/*class A {
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
$a2->foo();*/
//Будет 1 2 3 4 так как тип переменной static, этот тип переменной общий для всех объектов.

/*
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); //1 так как мы просто запустили метод класса A
$b1->foo(); //1 так как мы обратились по ссылке к классу А, а там лежит 1
$a1->foo(); //2 так как мы второй раз запустили метод класса A
$b1->foo();*/ //2 так как мы обратились по ссылке к классу А, а там лежит 2
//Будет 1 1 2 2

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();
//Веыведет тоже самое, что и раньше, так как () не обязательно указывать, но всеже желательно.
$product = new Product();
var_dump($product);