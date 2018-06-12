<?php

interface IBike
{
    public function getCost();
}

class Bike implements IBike
{
    public function getCost(){
        return 1000;
    }
}

/* decorator class wraps behavior around base class */
class SpecialTires implements IBike
{
    private $bike;

    public function __construct(Bike $bike){
        $this->bike = $bike;
    }

    public function getCost()
    {
        return $this->bike->getCost() + 50;
    }
}

class ColoredTires implements IBike
{
    private $bike;

    public function __construct(IBike $bike){
        $this->bike = $bike;
    }

    public function getCost()
    {
        return $this->bike->getCost() + 30;
    }
}


echo(new Bike())->getCost() . "\n";

$bike = new Bike();
echo(new SpecialTires($bike))->getCost(). "\n"; // SpecialTires[Bike]


$SpecialTires = new SpecialTires($bike);
echo(new ColoredTires($SpecialTires))->getCost(). "\n"; // ColoredTires[SpeicalEngine[Car]]
