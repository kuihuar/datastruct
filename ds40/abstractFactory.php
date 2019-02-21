<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/21
 * Time: 下午12:15
 */

abstract class AbstractFactory{
    abstract function createPhone();
    abstract function createRouter();
}
class ConcreteFactoryXiaomi extends AbstractFactory{
    function createPhone() :AbstractPhoneProduct
    {
        return new ProductXiaomiPhone();
    }
    function createRouter() :AbstractRouterProduct
    {
        return new ProductXiaomiRouter();
    }
}

class ConcreteFactoryHuawei extends AbstractFactory{
    function createPhone() :AbstractPhoneProduct
    {
        return new ProductHuaweiPhone();
    }
    function createRouter() :AbstractRouterProduct
    {
        return new ProductHuaweiRouter();
    }
}
abstract class AbstractPhoneProduct{
    abstract function use();
}
abstract class AbstractRouterProduct{
    abstract function link();
}

class ProductXiaomiPhone extends AbstractPhoneProduct{
    function use()
    {
        echo "call xiaomi phone\r\n";
    }
}
class ProductHuaweiPhone extends AbstractPhoneProduct{
    function use()
    {
        echo "call huawei phone\r\n";
    }
}
class ProductXiaomiRouter extends AbstractRouterProduct{
    function link()
    {
        echo "link xiaomi router\r\n";
    }
}
class ProductHuaweiRouter extends AbstractRouterProduct{
    function link()
    {
        echo "link huawei router\r\n";
    }
}

$xiaomiFactory = new ConcreteFactoryXiaomi();
$xiaomiPhone = $xiaomiFactory->createPhone();
$xiaomiRouter = $xiaomiFactory->createRouter();
$xiaomiPhone->use();
$xiaomiRouter->link();



$huaweiFactory = new ConcreteFactoryHuawei();
$huaweiPhone = $huaweiFactory->createPhone();
$huaweiRouter = $huaweiFactory->createRouter();
$huaweiPhone->use();
$huaweiRouter->link();