<?php
/*1. Создать структуру классов ведения товарной номенклатуры.
а) Есть абстрактный товар.
б) Есть цифровой товар, штучный физический товар и товар на вес.
в) У каждого есть метод подсчета финальной стоимости.
г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза.
 У штучного товара обычная стоимость, у весового – в зависимости от продаваемого
 количества в килограммах. У всех формируется в конечном итоге доход с продаж.
д) Что можно вынести в абстрактный класс, наследование? */

abstract class Good{
	public function setPrice($price){
		$this->price = $price;
	}
	public function getPrice(){
		return $this->price;
	}
	public function __construct($price){
		$this->setPrice($price);
	}
	abstract public function getFinalPrice();
	
	private $price;
}

class DigitalGood extends Good{
	public function getFinalPrice(){
		return	$this->getPrice() / 2;
	}
}

class PartialGood extends Good{
	public function getFinalPrice(){
		return	$this->getPrice();
	}
	
}

class WeightGood extends Good{
	public function getWeight(){
		return $this->weight;
	}
	public function setWeight($weight){
		$this->weight = $weight;
	}
	public function getFinalPrice(){
		return $this->getPrice() * $this->getWeight();
	}
	private $weight;
}

$digital = new DigitalGood(200);
$partial = new PartialGood(200);
$weight = new WeightGood(200);
$weight->setWeight(4);

echo "Price digital good is " . $digital->getFinalPrice() . " <br>";
echo "Price partial goog is " . $partial->getFinalPrice() . " <br>";
echo "Price weight good is " . $weight->getFinalPrice() . " <br>";

/*2. *Реализовать паттерн Singleton при помощи traits.*/
trait trtSayHello{
	public function sayHello($name){
		echo "Hello $name";
	}
}

class Single{
	use trtSayHello;
	private function __construct(){
		
	}
	public static function getInstance(){
		if (is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}
	private static $instance;
}

Single::getInstance()->sayHello("Ivan");
