<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/21
 * Time: 上午11:05
 */

abstract class Abstraction{
    abstract function operation();
}
interface Implementor{
    function operationImp();
}
class RefinedAbstraction extends Abstraction{
    protected $implementor;
    function operation()
    {
        echo "do somethind else, and then\r\n";
    }
    function __construct(Implementor $implementor)
    {
        $this->implementor = $implementor;
        $this->implementor->operationImp();
    }
}

class ConcreteImplementorA implements Implementor{
    function operationImp()
    {
        echo "imp in ConcreteImplementorA style\r\n";
    }
}
class ConcreteImplementorB implements Implementor{
    function operationImp()
    {
        echo "imp in ConcreteImplementorB style\r\n";
    }
}

$pImp = new ConcreteImplementorA();

$pa = new RefinedAbstraction($pImp);
$pa->operation();

$pb = new RefinedAbstraction(new ConcreteImplementorB());
$pb->operation();