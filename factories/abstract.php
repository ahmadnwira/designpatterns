<?php
/**
 * Abstract Factory pattern is used when creating an family of related object
 * that might need to be determined at run time.
 * benefits: is decoupling code so it becomes easier to test and update.
*/

interface IPet
{
    public function getName() : string;
}

class Pet implements IPet
{
    private $name;
    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() :string {
        return $this->name;
    }
}

class Dog extends Pet {};
class Cat extends Pet {};

class PetFactory {
    public static function create($type, $name) : Pet {
        switch($type){
            case 'dog':
                return new Dog($name);
            case 'cat':
                return new Cat($name);
            default:
                throw new Exception('unrecognized pet');
        }
    }
}

$dog = PetFactory::create('dog', 'max');
echo $dog->getName() . "\n";

$cat = PetFactory::create('cat', 'oscar');
echo $cat->getName() . "\n";