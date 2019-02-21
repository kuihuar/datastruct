<?php
abstract class Mediator{
    abstract function operation($intWho, $str);
    abstract function register($intWho, Colleague $colleague);
}
class ConcreteMediator extends Mediator{
    protected $colleagueMap;
    function operation($intWho, $str){
        $colleague = $this->colleagueMap[$intWho];
        $colleague->receivemsg($str);
    }
    function register($intWho, Colleague $colleague){
        if(!isset($this->colleagueMap[$intWho])){
            $this->colleagueMap[$intWho] = $colleague;
            $colleague->setMediator($this);
        }
    }
}
abstract class Colleague{
    abstract function sendmsg($towho, $str);
    abstract function receivemsg($str);
    abstract function setMediator(Mediator $mediator);
}
class ConcreteColleagueA extends Colleague{
    protected $mediator;
    function setMediator(Mediator $mediator){
        $this->mediator = $mediator;
    }
    function sendmsg($intToWho, $str){
        echo "send msg from ColleagueA, to: ".$intToWho.PHP_EOL;
        $this->mediator->operation($intToWho,$str);
    }
    function receivemsg($str){
        echo "colleagueA receivemsg: ".$str.PHP_EOL;
    }
}
class ConcreteColleagueB extends Colleague{
    protected $mediator;
    function setMediator(Mediator $mediator){
        $this->mediator = $mediator;
    }
    function sendmsg($intToWho, $str){
        echo "send msg from ColleagueB, to: ".$intToWho.PHP_EOL;
        $this->mediator->operation($intToWho,$str);
    }
    function receivemsg($str){
        echo "colleagueB receivemsg: ".$str.PHP_EOL;
    }
}
$colleagueA = new ConcreteColleagueA();
$colleagueB = new ConcreteColleagueB();
$concreteMediator = new ConcreteMediator();
$concreteMediator->register(1, $colleagueA);
$concreteMediator->register(2, $colleagueB);
$colleagueA->sendmsg(2, 'hello, i am A');
$colleagueB->sendmsg(1, 'hello, i am B');