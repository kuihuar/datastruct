<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/23
 * Time: 下午3:32
 */

abstract class Strategy{
    abstract function algorithm();
}
class ConcreteStrategyA extends Strategy{
    function algorithm()
    {
        echo "use ConcreteStrategy A \r\n";
        // TODO: Implement algorithm() method.
    }
}
class ConcreteStrategyB extends Strategy{
    function algorithm()
    {
        echo "use ConcreteStrategy B \r\n";
        // TODO: Implement algorithm() method.
    }
}
class Context{
    private $strategy;
    public function setStrategy(Strategy $strategy){
        $this->strategy = $strategy;
    }
    function algorithm(){
        $this->strategy->algorithm();
    }
}
$strategyA = new ConcreteStrategyA();
$strategyB = new ConcreteStrategyB();

$cxt = new Context();
$cxt->setStrategy($strategyA);
$cxt->algorithm();
$cxt->setStrategy($strategyB);
$cxt->algorithm();