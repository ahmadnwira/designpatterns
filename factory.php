<?php

interface IAnimal
{
    public function getName();
    public function getSpecies();
}

class Pet implements IAnimal
{
    private $name;
    private $species;
    public function __construct($name, $species)
    {
        $this->name = $name;
        $this->species = $species;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSpecies()
    {
        return $this->species;
    }
}

interface AnimalFactory
{
    public static function create($name, $species);
}

class SimplePetFactory implements AnimalFactory
{
    public static function create($name, $species)
    {
        return new Pet($name, $species);
    }
}

class RandomPetFactory implements AnimalFactory
{
    public static function create($name, $species=null){
        if($species==null){
            $avilabeSpecies = ['dog', 'cat', 'hamster'];
            $species = $avilabeSpecies[array_rand($avilabeSpecies)];
        }
        return new Pet($name, $species);
    }
}

$simplePet = SimplePetFactory::create('scooby', 'dog');
echo $simplePet->getName() . " - " . $simplePet->getSpecies() . "\n";


$randomPet = RandomPetFactory::create('doo', '');
echo $randomPet->getName() . " - " . $randomPet->getSpecies() . "\n";