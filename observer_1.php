<?php
interface Subject{
	public function registerObserver(Observer $observer);
	public function removeObserver(Observer $observer);
	public function notifyObservers();
}

interface Observer{
	public function update($temperature, $humidity, $pressure);
}
interface DisplayElement{
	public function display();
}

class WeatherData implements Subject{
	private $observers;
	private $temperature;
	private $humidity;
	private $pressure;
	public function __construct(){
		$this->observers=array();
	}
	public function registerObserver(Observer $observer){
		$this->observers[]=$observer;
	}
	public function removeObserver(Observer $observer){
		$index = array_search($observer, $this->observers);
		if(false !== $index){
			array_splice($this->observers, $index, 1);
		}
	}
	public function notifyObservers(){
		foreach ($this->observers as $key => $observer) {
			$observer->update($this->temperature, $this->humidity, $this->pressure);
		}
	}
	public function measurementsChange(){
		$this->notifyObservers();
	}
	public function setMeasurements(float $temperature, float $humidity, float $pressure){
		$this->temperature=$temperature;
		$this->humidity=$humidity;
		$this->pressure=$pressure;
		$this->measurementsChange();
	}
}
class CurrentConditionsDisplay implements Observer{
	private $weatherData;
	private $temperature;
	private $humidity;
	private $pressure;
	public function __construct(Subject $weatherData){
		$this->weatherData=$weatherData;
		$this->weatherData->registerObserver($this);
	}
	public function update($temperature, $humidity, $pressure){
		$this->temperature=$temperature;
		$this->humidity=$humidity;
		$this->pressure=$pressure;
		$this->display();

	}
	public function display(){
		echo "Current conditions:".$this->temperature."F degrees and ".$this->humidity."% humidity";
	}
}
class ForecastDisplay implements Observer{
	private $lastPressure;
	private $currentPressure;
	private $weatherData;
	public function __construct(Subject $weatherData){
		$this->weatherData=$weatherData;
		$this->weatherData->registerObserver($this);
	}
	public function update(){

	}
}
class WeatherStation{
	public function __construct(){
		$weatherData = new WeatherData();

		new CurrentConditionsDisplay($weatherData);
		$weatherData->setMeasurements(80,65, 30.4);
	}
}

new WeatherStation();
/*
class NewsPaper implements \SplSubject{
	private $name;
	private $observers=array();
	private $content;

	public function __construct($name){
		$this->name=$name;
	}
	public function attach(\SplObserver $observer){
		$this->observers[]=$observer;
	}
	public function detach(\SplObserver $observer){
		$index=array_search($observer, $this->observers, true);
		//var_dump($this->observers);
		//var_dump($index);
		if(false !==$index)
			unset($this->observers[$index]);
	}
	public function breakOutNews($content){
		$this->content=$content;
		$this->notify();
	}
	public function getContent(){
		return $this->content."({$this->name})";
	}
	public function notify(){
		foreach ($this->observers as $key => $observer) {
			$observer->update($this);
		}
	}

}
class Reader implements \SplObserver{
	private $name;
	public function __construct($name){
		$this->name=$name;
	}
	public function update(\SplSubject $subject){
		echo $this->name." is reading breakout news:".$subject->getContent()."\r\n";
	}
}

$newsPaper=new NewsPaper('NewYork Times');
$newsPaper->attach(new Reader('Allen'));
$newsPaper->attach(new Reader('Jim'));
$linda=new Reader('Linda');
$newsPaper->attach($linda);

$newsPaper->detach($linda);


$newsPaper->breakOutNews('USA break down!');
*/

















