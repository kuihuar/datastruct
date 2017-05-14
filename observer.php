<?php
class Subject{
	private $observers;
	private $state;
	public function __construct(){
		$this->observers = new SplDoublyLinkedList();
	}
	public function getState():int{
		return $this->state;
	}
	public function setState(int $state){
		$this->state=$state;
		$this->notifyObservers();
	}
	public function attach(Observer $observer){
		$this->observers->push($observer);
	}
	public function notifyObservers(){
		for($this->observers->rewind();$this->observers->valid();$this->observers->next()){
			$ob=$this->observers->current();
			$ob->update();
		}
	}
}
abstract class Observer{
	protected $subject;
	abstract protected function update();
}
class BinaryObserver extends Observer{
	public function __construct(Subject $subject){
		$this->subject=$subject;
		$this->subject->attach($this);
	}
	public function update(){
		echo "Binary String:".decbin($this->subject->getState())."\r\n";
	}
}
class OctalObserver extends Observer{
	public function __construct(Subject $subject){
		$this->subject=$subject;
		$this->subject->attach($this);
	}
	public function update(){

		echo "Binary String:".decoct($this->subject->getState())."\r\n";
	}
}
class HexObserver extends Observer{
	public function __construct(Subject $subject){
		$this->subject=$subject;
		$this->subject->attach($this);
	}
	public function update(){

		echo "Binary String:".dechex($this->subject->getState())."\r\n";
	}
}
class ObserverpatternDemo{
	public function __construct(){
		$suject = new Subject();
		new BinaryObserver($suject);
		new OctalObserver($suject);
		new HexObserver($suject);

		echo "First state change: 15\r\n";
		$suject->setState(15);
		echo "Second state changet: 10\r\n";
		$suject->setState(10);
	}
}
new ObserverpatternDemo();
