<?php
interface Beverage{
	public function cost();
	public function getDescription();
}
abstract class CondimentDecorator implements Beverage{
	private $beverage;
	public function __construct($beverage){
		$this->beverage=$beverage;
	}

	function getDescription(){
		$this->beverage->getDescription();
	}
	function cost(){
		$this->beverage->cost();
	}
}

class Espresso implements Beverage{
	private $description;
	public function __construct(){
		$this->description = "Espresso";
	}
	public function getDescription(){
		return $this->description;
	}
	public function cost():float{
		return 1.99;
	}
}
class HouseBlend implements Beverage{
	private $description;
	public function __construct(){
		$this->description = "House Blend Coffee";
	}
	public function getDescription(){
		return $this->description;
	}
	public function cost():float{
		return 1.89;
	}
}
class Mocha extends CondimentDecorator{
	private $beverage;
	public function __construct(Beverage $beverage){
		$this->beverage = $beverage;
	}
	public function getDescription(){
		return $this->beverage->getDescription().", Mocha";
	}
	public function cost():float{
		return 0.20 + $this->beverage->cost();
	}
}
class Whip extends CondimentDecorator{
	private $beverage;
	public function __construct(Beverage $beverage){
		$this->beverage = $beverage;
	}
	public function getDescription(){
		return $this->beverage->getDescription().", Whip";
	}
	public function cost():float{
		return 0.40 + $this->beverage->cost();
	}
}
class StarBuzzCoffee{
	public function __construct(){

		$beverage = new Espresso();
		echo $beverage->getDescription()." $ ".$beverage->cost()."\r\n";

		$houseBlendBeverage = new HouseBlend();
		$houseBlendBeverage=new Mocha($houseBlendBeverage);
		$houseBlendBeverage=new Mocha($houseBlendBeverage);
		$houseBlendBeverage = new Whip($houseBlendBeverage);
		echo $houseBlendBeverage->getDescription()." $ ".$houseBlendBeverage->cost()."\r\n";

	}
}

new StarBuzzCoffee();