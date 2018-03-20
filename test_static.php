<?php

abstract class shopProduct{
    static public $var = 'ABC';
    public $v = '66';
    public function printName(){
        echo static::$var;
        echo self::$var;
        echo $this->v;
    }

    abstract function init();
}

class cdProduct extends shopProduct{
    static public $var = '123';
    public $v = '77';
    public function printName(){
        parent::printName();
        $this->init();
    }

    public function init(){
        var_dump($this);
    }
}


$a = new cdProduct();
$a->printName();