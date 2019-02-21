<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/21
 * Time: 上午11:43
 */

abstract class Product{
    abstract function use();
}
class ConcreteProductA extends Product{
    function use()
    {
        echo "ConcreteProductA is use\r\n";
    }
}
class ConcreteProductB extends Product{
    function use()
    {
        echo "ConcreteProductB is use\r\n";
    }
}

class Factory{
    function createProduct(String $productName){
        if($productName == 'A'){
            return new ConcreteProductA();
        }elseif($productName == 'B'){
            return new ConcreteProductB();
        }
        throw new Exception("productnanme error");
    }
}
$factory = new Factory();
$productA = $factory->createProduct('A');
$productA->use();
$productB = $factory->createProduct('B');
$productB->use();