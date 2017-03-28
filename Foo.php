<?php
namespace MM;
class Foo{
	public static function bar(){
		echo 'bar';
		echo __NAMESPACE__;
		echo __CLASS__;
		echo 1111;
	}
}