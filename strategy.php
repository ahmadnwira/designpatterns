<?php

interface IQuackStrategy
{
    public function quack();
}

class SimpleQuackStrategy implements IQuackStrategy
{
    public function quack(){
        return 'quack simply';
    }
}

class NoQuackStrategy implements IQuackStrategy
{
    public function quack(){
        return 'i dont quack';
    }
}

class Duck
{
    public $quackStrategy;
    public function setQuackStrategy(IQuackStrategy $quackStrategy)
    {
        $this->quackStrategy = $quackStrategy;
    }

    public function quack()
    {
        return $this->quackStrategy->quack();
    }
}


$simpleDuck = new Duck();
$simpleDuck->setQuackStrategy(new SimpleQuackStrategy());
print($simpleDuck->quack());