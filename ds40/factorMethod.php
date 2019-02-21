<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/21
 * Time: 上午11:55
 */

abstract class Product{
    abstract function use();
}

class ConcreteProduct extends Product{
    function use(){
        echo __CLASS__."is used\r\n";
    }
}

abstract class Factory{
    abstract function factoryMethod();
}

class ConcreteFactory extends Factory{
    function factoryMethod() : Product{
        return new ConcreteProduct();
    }
}

$factory = new ConcreteFactory();
$product = $factory->factoryMethod();
$product->use();