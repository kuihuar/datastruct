<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/20
 * Time: 下午8:43
 *
 * 装饰器模式的代码
 */

/**
 * Class Component
 * 抽象构件
 */
abstract class Component{
    abstract function operation();
}

/**
 * Class ConcreteComponent
 * 具体构件
 */
class ConcreteComponent extends Component{
    function operation()
    {
        // TODO: Implement operation() method.
        echo 'concreteComponent \'s operaton'.PHP_EOL;
    }
}

/**
 * Class Decorator
 * 抽象装饰类
 */
abstract class Decorator extends Component{
    protected $component;
    function __construct(Component $component)
    {
        $this->component = $component;
    }
    function operation()
    {
        $this->component->operation();
    }
}

/**
 * Class ConcreteDecoratorA
 * 具体装饰类
 */
class ConcreteDecoratorA extends Decorator{
    function addBehavior(){
        echo 'add AAA'.PHP_EOL;
    }
    function operation()
    {
        Decorator::operation();
        $this->addBehavior();
    }
}

/**
 * Class ConcreteDecortorB
 * 具体装饰类
 */
class ConcreteDecortorB extends Decorator{
    function addBehavior(){
        echo 'add BBB'.PHP_EOL;
    }
    function operation()
    {
        parent::operation();
        $this->addBehavior();
    }
}

$client = new ConcreteComponent();
$a_client = new ConcreteDecoratorA($client);
$a_client->operation();
$b_client = new ConcreteDecortorB($a_client);
$b_client ->operation();