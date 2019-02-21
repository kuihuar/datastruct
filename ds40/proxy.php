<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/21
 * Time: 上午12:36
 */

interface Subject{
    function request();
}

class RealSubject implements Subject{
    function request()
    {
        // TODO: Implement request() method.
        echo 'Im real subject'.PHP_EOL;
    }
}

class Proxy implements Subject{
    protected $subject;

    function request()
    {
        // TODO: Implement request() method.
        $this->preRequest();
        $this->subject = new RealSubject();
        $this->subject->request();
        $this->postRequest();
    }
    protected  function postRequest(){
        print('post request'.PHP_EOL);
    }
    protected function preRequest(){
        print('pre request'.PHP_EOL);
    }
}

$client = new Proxy();
$client->request();