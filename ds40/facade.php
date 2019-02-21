<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/21
 * Time: 上午9:56
 */
interface A{}
interface B{}
class SystemA implements A{
    function operationA(){
        echo 'operationA'.PHP_EOL;
    }
}
class SystemB implements B{
    function operationB(){
        echo 'operationB'.PHP_EOL;
    }
}

class Facade{
    private $systemA;
    private $systemB;
    public function __construct(A $systemA, B $systemB){
        $this->systemA = $systemA;
        $this->systemB = $systemB;
    }
    public function wrapOperation(){
        $this->systemA->operationA();
        $this->systemB->operationB();
    }
}
$sysA = new SystemA;
$sysB = new SystemB;
$facade = new Facade($sysA, $sysB);
$facade->wrapOperation();
var_dump($facade);
