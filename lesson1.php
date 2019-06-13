<?php 
//1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.
//2. Описать свойства класса из п.1 (состояние).
//3. Описать поведение класса из п.1 (методы).

class Good {
	public function __construct($name, $price){
		$this->name  = $name;
		$this->price = $price;
	}
	public getInfo(){
		return "$this->name - $this-price";
	}
	private $name;
	private $price;
}

//4. Придумать наследников класса из п.1. Чем они будут отличаться?

class Phone extends Good {
	public function __construct($name, $price, $size, $screenType){
		parent::__construct($name, $price);
		$this->size = $size;
		$this->screenType = $screenType;
	}
	public getInfo(){
		return "Phone $this->name with $this-screenType - $this-price";
	}
	private $size;
	private $screenType;
}

//5. Дан код:
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
//Что он выведет на каждом шаге? Почему?

//  Вывод 1234 потому как статические переменные принадлежат классу а не объекту. И оба класса обращаются к одной и тойже переменной. 

//Немного изменим п.5:
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
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo();
//6. Объясните результаты в этом случае.

// выведет 1122 т.к. переменная $x в классе А не является переменной $x класса B

7. *Дан код:
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
//Что он выведет на каждом шаге? Почему?

// 1122 тоже самое что и в п. 6
