<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/23
 * Time: 下午2:45
 */

abstract class State{
    abstract function handle(Context $context);
}

class Context{
    private $state;
    function changeState(State $state){
        $this->state = $state;
    }
    function request(){
        $this->state->handle($this);
    }
    function __construct()
    {
        $this->state = ConcreteStateA::Instance();
    }
}
class ConcreteStateA extends State{
    protected static $state=null;
    public static function Instance(){
        if(null  == self::$state){
            self::$state = new self();
        }
        return self::$state;
    }
    function handle(Context $context)
    {
        echo "doning in State A\r\n change to B\r\n";
        $context->changeState(ConcreteStateB::Instance());
    }

}
class ConcreteStateB extends State
{
    protected static $state = null;

    public static function Instance()
    {
        if (null == self::$state) {
            self::$state = new self();
        }
        return self::$state;
    }
    function handle(Context $context)
    {
        echo "doing in State B \r\nchange  to A\r\n";
        $context->changeState(ConcreteStateA::Instance());
    }
}

$con = new Context();
$con->request();
$con->request();
$con->request();