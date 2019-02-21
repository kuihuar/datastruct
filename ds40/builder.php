<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/21
 * Time: 下午12:40
 */

abstract class Builder{
    abstract function buildPartA();
    abstract function buildPartB();
    abstract function buildPartC();
    abstract function getResult();
}

class ConcreteBuilder extends Builder{
    protected $product;
    function __construct()
    {
        $this->product = new Product();
    }

    function buildPartA()
    {
        $this->product->setA('A Style');
    }
    function buildPartB()
    {
        $this->product->setA('B Style');

    }
    function buildPartC()
    {
        $this->product->setA('C Style');

    }
    function getResult()
    {
        return $this->product;
    }
}
class Product{
    protected $attr=[];
    function setA($style){
        echo $style.PHP_EOL;
        $this->attr[$style] = $style;
    }
    function setB($style){
        echo $style.PHP_EOL;
        $this->attr[$style] = $style;
    }
    function setC($style){
        echo $style.PHP_EOL;
        $this->attr[$style] = $style;
    }
    function show(){
        print_r($this->attr);
    }
}
class Director{
    private $builder;
    function setBuilder(Builder $builder){
        $this->builder = $builder;
    }
    function constuct() : Product{
        $this->builder->buildPartA();
        $this->builder->buildPartB();
        $this->builder->buildPartC();
        return $this->builder->getResult();
    }
}

$builder = new ConcreteBuilder();

$director = new Director();
$director->setBuilder($builder);
$product = $director->constuct();
$product->show();