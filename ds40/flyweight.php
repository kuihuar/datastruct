<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/21
 * Time: 上午12:08
 */

Interface Flyweight{
    function operation();
}
class ConcreteFlyweight implements Flyweight{
    protected $name;
    function __construct($name)
    {
        $this->name = $name;
    }

    function operation()
    {
        // TODO: Implement operation() method.
        echo $this->name.PHP_EOL;
    }
}

class FlyweightFactory implements Countable{
    protected $flyweightPool=[];

    function getFlyweight($flyweightName) : Flyweight{
        if(!isset($this->flyweightPool[$flyweightName])){
            $this->flyweightPool[$flyweightName] = new ConcreteFlyweight($flyweightName);
        }
        return $this->flyweightPool[$flyweightName];
    }
    function count()
    {
        // TODO: Implement count() method.
        return count($this->flyweightPool);
    }
}

$flyweithtFactory = new FlyweightFactory();
$flyweightA = $flyweithtFactory->getFlyweight("A_flyweight");
$flyweightA->operation();

$flyweightB = $flyweithtFactory->getFlyweight("B_flyweight");
$flyweightB->operation();

$flyweightA = $flyweithtFactory->getFlyweight("A_flyweight");
$flyweightA->operation();

echo $flyweithtFactory->count();