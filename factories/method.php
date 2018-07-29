<?php
/**
 * Factory method "pattern" is used to set interface to create an object,
 * BUT delegates the specs to it's implementors.
*/

class Canidae {
    private $name;
    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() :string {
        return $this->name;
    }
}
class Dog extends Canidae {}


class Felidae {
    private $name;
    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() :string {
        return $this->name;
    }
}
class Cat extends Felidae {}


interface IFactory {
    public static function create($name) ;
}

class DogFactory implements IFactory{
    public static function create($name) {
        return new Dog($name);
    }
}

class CatFactory implements IFactory{
    public static function create($name){
        return new Cat($name);
    }
}

$dog = DogFactory::create('max');
echo $dog->getName() . "\n";

$cat = CatFactory::create('oscar');
echo $cat->getName() . "\n";