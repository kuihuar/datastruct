<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/21
 * Time: 下午3:39
 */
abstract class Command{
    abstract function execute();
}
class ConcreteCommand extends Command{
    protected $receiver;
    function __construct(Receiver $receiver)
    {
        $this->receiver=$receiver;
    }

    function execute( )
    {
        echo "ConcreteCommand::execute\r\n";
        $this->receiver->action();
    }

}

class Receiver{
    function action(){
        echo "receiver action\r\n";
    }
}
class Invoker{
    protected $command;
    function __construct(Command $command)
    {
        $this->command = $command;
    }

    function call(){
        echo "invoker calling\r\n";
        $this->command->execute();
    }
}

$receiver = new Receiver();
$command = new ConcreteCommand($receiver);
$invoker = new Invoker($command);
$invoker->call();